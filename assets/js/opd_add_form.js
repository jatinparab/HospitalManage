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
    $('#hidethis').hide();
    $('#discount').hide();
    var printContents = document.getElementById('print1').innerHTML;
  //  var printContents = printContents + document.getElementById('print2').innerHTML;
    var printContents = printContents + document.getElementById('jatin').innerHTML;

    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    window.location = "";
}

function partialsubmitipd(ipd_number){
    amount = $('#amountpaid').val();
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
                window.location = '../../ipd_details';
            }
            
           // you will get response from your php page (what you echo or print)                 

        }
        


    });

}


function partialsubmitopd(receipt_number){
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
                window.location = '../../opd_details';
            }
        }
    });

}


function givediscount(){
    var type = $('#type').val();
    var amount = $('#amount').val();
    var total = $('#finalamount').html();
    console.log(amount,(amount/100));
    if(type==0){
        $('#finalamount').html(Math.floor(total - total*(amount/100)));
        $('#discount').hide();
    }else{
        $('#finalamount').html(total-amount);
        $('#discount').hide();
    }
    console.log(total);
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
    if($('#prefered_doctor').val() == ''){
        alert("Please fill all the mandatory fields!");
        return false;
    }
    return true;
        
    
}

function opdsubmit(){
    if($('#patient_name').val() == '' || $('#contact_number').val() == '' || $('#age').val() == '' || $('#sex').val() == '' ||$('#diagnosis').val() == '' || $('#checked_by').val() == '' || $('#remarks').val() == '' ){
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
    
    
