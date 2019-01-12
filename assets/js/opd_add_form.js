$(document).ready(function() {
    $('.check').on('click',function(){
        let id = this.id;
        if(this.checked){
            $('#'+id+'_amount').removeAttr('disabled');
            $('#'+id+'_number').removeAttr('disabled');
            $('#'+id+'_total').removeAttr('disabled');
        }else{
            $('#'+id+'_total').prop('disabled',true);
            $('#'+id+'_number').prop('disabled',true);
            $('#'+id+'_amount').prop('disabled',true);

        }
    });

$('.onlytext').keydown(function (e) {
    
    
    
      var key = e.keyCode;
      
      if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
      
        e.preventDefault();
        
      }

    
    
  });
  
  $(".onlynumber").keypress(function (e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       //display error message
       
              return false;
   }
  });
});

function printDiv(divName){
    $('.hideit').hide();
    $('body').printThis({
        importCSS: true,                // import parent page css
       importStyle: false,             // import style tags
       printContainer: true, 
       afterPrint: reload  
    });
    
  //  var printContents = printContents + document.getElementById('print2').innerHTML;
    
}

function savepdf(){
    
}




function partialsubmitopd(receipt_number,total){
    total = parseInt(total);
    if($('#amount_paid').val()>0 && $('#amount_paid').val() <=total){
    amount = $('#amount_paid').val();
    $.ajax({
        url: "../partialsubmitopd",
        type: "post",
        data: {
            'receipt_number':receipt_number,
            'amount':amount
        },
        success: function (response) {

            if(response == 'success'){
                alert('bill partially submitted');
               reload();
            }
        }
    });
}else{
    alert("Please enter a valid value");
}

}


function partialsubmitipd(ipd_number,total){
    total = parseInt(total);
    if($('#amount_paid').val()>0 && $('#amount_paid').val() <=total){
    amount = $('#amount_paid').val();
    $.ajax({
        url: "../partialsubmitipd",
        type: "post",
        data: {
            'ipd_number':ipd_number,
            'amount':amount
        },
        success: function (response) {

            if(response == 'success'){
                alert('bill partially submitted');
               reload();
            }
        }
    });
}else{
    alert("Please enter a valid value");
}

}


function finalsubmitipd(ipd_number,total,paid){
    total = parseInt(total);
    paid = parseInt(paid);
    amount = total+paid;
    console.log(total);
    if($('#amount_paid').val() == total){
        $.ajax({
            url: "../finalsubmitipd",
            type: "post",
            data: {
                'ipd_number':ipd_number,
                'amount':amount,
                'total':total
            },
            success: function (response) {
                if(response == 'success'){
                    alert('bill submitted');
                   reload();
                }
            }
        });

    }else{
        if($('#amount_paid').val() < total){
            alert("Please use partial submit");
        }else{
            alert("Please enter a valid value");
        }
    }

}

function buttonactive(value){
    if($('#ward').val() == value){
        $("#shiftbtn").attr("disabled", true);
    }else{
        $("#shiftbtn").attr("disabled", false);
    }
}


function finalsubmit(receipt_number,total,paid){
    total = parseInt(total);
    paid = parseInt(paid);
    amount = total+paid;
    console.log(total);
    if($('#amount_paid').val() == total){
        $.ajax({
            url: "../finalsubmitopd",
            type: "post",
            data: {
                'receipt_number':receipt_number,
                'amount':amount,
                'total':total
            },
            success: function (response) {
                if(response == 'success'){
                    alert('bill submitted');
                   reload();
                }
            }
        });

    }else{
        if($('#amount_paid').val() < total){
            alert("Please use partial submit");
        }else{
            alert("Please enter a valid value");
        }
    }

}


function givediscountipd(total,ipd_number){
    if($('#discounttype').val()=='1'){
        if($('#discountamt').val()>0 && $('#discountamt').val()<=100){
            amt = $('#discountamt').val();
            discount = Math.ceil(percentage(total,amt));
         
        }else{
            alert("Please enter a valid percent value");
            return false;
        }
    }
    if($('#discounttype').val()=='2'){
        total = parseInt(total);
        if($('#discountamt').val()>0 && $('#discountamt').val()<=total){
            amt = $('#discountamt').val();
            discount = Math.ceil(amt);
        }else{
            alert("Please enter a valid value");
            return false;
        }
    }
    
    $.ajax({
        url: "../discountipd",
        type: "post",
        data: {
            'ipd_number':ipd_number,
            'amount':discount
        },
        success: function (response) {

            if(response == 'success'){
                alert('discount given');
                reload();
            }
        }
    });
   // console.log(total);
}


function calculate(ele){
    id = ele.id;
    x = id.split('_',1)[0];
    number = $('#'+x+'_number').val();
    val=ele.value*number;
    $('#'+x+'_total').val(val);
}
function ncalculate(ele){
    id = ele.id;
    x = id.split('_',1)[0];
    number = $('#'+x+'_amount').val();
    val=ele.value*number;
    $('#'+x+'_total').val(val);
}

function hidebar(){
    $('#sidebar').hide();
    $('.sidebar-bg').hide();
    $('#content').removeClass('content');
    $('#content').addClass('container-fluid');
}

function showbar(){
    console.log("1");
    $('#sidebar').show();
    $('.sidebar-bg').show();
    $('#content').removeClass('container-fluid');
    $('#content').addClass('content');
}


function returnToPreviousPage() {
    window.history.back();
}

function deposubmit(){
    if($('#amount').val() == '' || $('#amount2').val() == ''){
        alert('Please fill all mandatory fields');
        return false;
    }else{
        alert('Patient Successfully Added');
        return true;
    }
}

function ipdformsubmit(){
    if($('#id').val() == ''){
        alert("Please fill all the mandatory fields!");
        return false;
    }
    if($('#ipd_number').val() == ''){
        alert("Please fill all the mandatory fields!");
        return false;
    }
    if($('#patient_name').val() == ''){
        alert("Please fill all the mandatory fields!");
        return false;
    }
    if($('#mobile_number').val() == ''){

        alert("Please fill all the mandatory fields!");
        return false;
    }
    if($('#age').val() == ''){
        alert("Please fill all the mandatory fields!");
        return false;
    }
    if($('#sex').val() == '-1'){
        alert("Please select a gender!");
        return false;
    }
    if($('#ward').val() == '-1'){
        alert("Please select a valid ward");
        return false;
    }
    if($('#prefered_doctor').val() == ''){
        alert("Please fill all the mandatory fields!");
        return false;
    }
    return true;
        
    
}

function opdsubmit(){
    if($('#patient_name').val() == '' || $('#contact_number').val() == '' || $('#age').val() == '' || $('#sex').val() == '' ||$('#diagnosis').val() == '' || $('#checked_by').val() == '' ){
        alert("Please fill all mandatory fields!");
        return false;
    }
    if($('#sex').val() == '-1'){
        alert("Please select a valid gender");
        return false;
    }
    return true;
}

function movetoipd(id){
    window.location = '../../ipd_form?id='+id;
    //console.log(id);
}

function shiftpatient(ipd_number){
    ward = $('#ward').val();
    $.ajax({
        url: "../shift",
        type: "post",
        data: {
            'ipd_number':ipd_number,
            'ward':ward
        },
        success: function (response) {
            if(response == 'success'){
                alert('ward successfully changed');
                window.location = '';
            }
            
           // you will get response from your php page (what you echo or print)                 

        }
        


    });
}
    function radioclick(){
       // console.log($('input[name=optradio]:checked').val());
        if($('input[name=optradio]:checked').val() == '1'){
           
            $('.discountdiv').show();
        }else{
           
            $('.discountdiv').hide();
        }
    }

    function givediscount(total,receipt_number){
        if($('#discounttype').val()=='1'){
            if($('#discountamt').val()>0 && $('#discountamt').val()<=100){
                amt = $('#discountamt').val();
                discount = Math.ceil(percentage(total,amt));
             
            }else{
                alert("Please enter a valid percent value");
                return false;
            }
        }
        if($('#discounttype').val()=='2'){
            total = parseInt(total);
            if($('#discountamt').val()>0 && $('#discountamt').val()<=total){
                amt = $('#discountamt').val();
                discount = Math.ceil(amt);
            }else{
                alert("Please enter a valid value");
                return false;
            }
        }
        $.ajax({
            url: "../discount",
            type: "post",
            data: {
                'amount':discount,
                'receipt_number':receipt_number
            },
            success: function (response) {
                if(response == 'success'){
                    alert('discount added');
                    reload();
                }
            }
        });
        
    }


function percentage(num, per)
    {
    return (num/100)*per;
    }

    function reload(){
        url = window.location.href;
        $('body').load(url);
    }
    
