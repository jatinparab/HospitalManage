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
      
      if (!((key == 8) ||(key==9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
      
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

function printopdreports(){
    $('.hideit').hide();
    $('.showit').removeClass('hidden');
    $('#opdreports').printThis({
        importCSS: true,                // import parent page css
       importStyle: false,             // import style tags
       printContainer: true, 
       afterPrint: reload  
    });
}

function printipdreports(){
    $('.hideit').hide();
    $('.showit').removeClass('hidden');
    $('#ipdreports').printThis({
        importCSS: true,                // import parent page css
       importStyle: false,             // import style tags
       printContainer: true, 
       afterPrint: reload  
    });
}

function printotreports(){
    $('.hideit').hide();
    $('.showit').removeClass('hidden');
    $('#otreports').printThis({
        importCSS: true,                // import parent page css
       importStyle: false,             // import style tags
       printContainer: true, 
       afterPrint: reload  
    });
}
function savepdf(){
    
}
function addScript(url) {
    var script = document.createElement('script');
    script.type = 'application/javascript';
    script.src = url;
    document.head.appendChild(script);
}
addScript('https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js');

function printIt(){

  $('.hideit').hide();
    $('.btn').addClass('hidden');
    html2canvas(document.getElementById('bill-bg')).then(function(canvas) {
        var myWindow=window.open('','','width=1200,height=1200');
        myWindow.document.body.appendChild(canvas);
       
            myWindow.focus();
        myWindow.print();
        myWindow.close();
        $('.btn').removeClass('hidden');
        $('.container').removeClass("pbill");   
        $('.hideit').show();
        
    });
   

  
}

function save2pdf(id,date){
    //$('.hideit').hide();
    $('.btn').addClass('hidden');
    $('.container').addClass("pbill");
    var opt = {
        margin:       0,
        filename:     id+'-'+date+'.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 1 },
        jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
      };
      
    html2pdf(document.getElementById('bill-bg'),opt).then(function(){
        $('.btn').removeClass('hidden');
    $('.container').removeClass("pbill");
    });
    

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

function partialsubmitot(ipd_number,total){
    total = parseInt(total);
    if($('#amount_paid').val()>0 && $('#amount_paid').val() <=total){
    amount = $('#amount_paid').val();
    $.ajax({
        url: "../partialsubmitot",
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

$('.focusend').focus(function(){
    var that = this;
    setTimeout(function(){ that.selectionStart = that.selectionEnd = 10000; }, 0);
  });


function finalsubmitipd(ipd_number,total,paid){
    total = parseInt(total);
    paid = parseInt(paid);
    amount = total+paid;
    date = new Date();
    date = formatDate((date));
    console.log(total);
    if($('#amount_paid').val() == total){
        $.ajax({
            url: "../finalsubmitipd",
            type: "post",
            data: {
                'ipd_number':ipd_number,
                'amount':amount,
                'total':total,
                'date':date
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

function finalsubmitot(ipd_number,total,paid){
    total = parseInt(total);
    paid = parseInt(paid);
    amount = total+paid;
    date = new Date();
    date = formatDate((date));
    console.log(total);
    if($('#amount_paid').val() == total){
        $.ajax({
            url: "../finalsubmitot",
            type: "post",
            data: {
                'ipd_number':ipd_number,
                'amount':amount,
                'total':total,
                'date':date
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

function selectchange(){
    $('#searchbox').val(''); 
}

function search_opd(){
    start =$('#start').val();
    end =$('#end').val();
    type = $('#type').val();
    if(type == -1){
        alert("Select a status type");
        return false
    }
    x = new Date(start);
    y = new Date(end);
    console.log(x);
    console.log(y);
    console.log(x<y);
    if(x>y){
        alert("Start date cannot be greater than end date");
        return false
    }
    $('#opdreports').load('opdtable?start='+start+'&end='+end+'&type='+type);
    
}

function search_ot(){
    start =$('#start').val();
    end =$('#end').val();
    type = $('#type').val();
    if(type == -1){
        alert("Select a status type");
        return false
    }
    x = new Date(start);
    y = new Date(end);
    console.log(x);
    console.log(y);
    console.log(x<y);
    if(x>y){
        alert("Start date cannot be greater than end date");
        return false
    }
    $('#otreports').load('ottablereport?start='+start+'&end='+end+'&type='+type);
    
}

function search_ipd(){
    start =$('#start').val();
    end =$('#end').val();
    type = $('#type').val();
    if(type == -1){
        alert("Select a status type");
        return false
    }
    x = new Date(start);
    y = new Date(end);
    console.log(x);
    console.log(y);
    console.log(x<y);
    if(x>y){
        alert("Start date cannot be greater than end date");
        return false
    }
    $('#ipdreports').load('ipdtable?start='+start+'&end='+end+'&type='+type);
    
}


function calc_tot(){
    total =$('#days').val()*$('#amount').val()
    $('#total').val(total);
}

function searchby(){
    type =$('#query-select').val();
    if(type == -1){
        alert("Select a search type");
        return false
    }
    value = $('#searchbox').val();
    //$('#visittable').html('');
    $('#visittable').load('visittable?type='+type+'&value='+value);
    
}

function buttonactive(value){
    if($('#ward').val() == value){
        $("#shiftbtn").attr("disabled", true);
    }else{
        $("#shiftbtn").attr("disabled", false);
    }
    if($('#ward').val() == value){
        $('#radiobuttons').addClass('hidden');
    }else{
        $('#radiobuttons').removeClass('hidden');
    }
} 

function ot_total(){
    a = 0;
    b=0;
    c=0;
    a = (parseInt($('#ot_charge').val()))?parseInt($('#ot_charge').val()):0;
    b = (parseInt($('#a_charge').val()))?parseInt($('#a_charge').val()):0;
    c = (parseInt($('#s_charge').val()))?parseInt($('#s_charge').val()):0;
    $('#total').val( a + b + c );
}

function ot_charge(ipd_number){
    ot_value = $('#ot_charge').val();
    a_value = $('#a_charge').val();
    s_value = $('#s_charge').val();
    a_name = $('#a_name').val();
    s_name = $('#s_name').val();
    if((a_value != '' && a_name == '') || (a_value == '' && a_name != '') ||(s_value != '' && s_name == '') || (s_value == '' && s_name != '')){
        alert("Please fill corresponsing values ");
        return false;
    }
    $.ajax({
        url: "../addCharges",
        type: "post",
        data: {
            ipd_number,
            ot_value,
            a_value,
            s_value,
            a_name,
            s_name
        },
        success: function (response) {
            console.log(response);
            if(response == 'success'){
                alert('Charges added');
               window.location = '../../ot_details';
            }
        }
    });

}

function fnExcelReport(id)
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(id); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}


function anysellect(){
    if($('#anyselect').val() == -1){
        $("#shiftbtn").attr("disabled", true);
    }else{
        $("#shiftbtn").attr("disabled", false);
    }
    
}

function buttonRadio(){
    var type = $("input[name='type']:checked").val();
    if(type == 'full' || type == 'half'){
        $('#anyselect').addClass('hidden');
        $("#shiftbtn").attr("disabled", false);
    }else{
        $("#shiftbtn").attr("disabled", true);
    }
    if(type=='any'){
        $('#anyselect').removeClass('hidden');
    }
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}


function finalsubmit(receipt_number,total,paid){
    total = parseInt(total);
    paid = parseInt(paid);
    amount = total+paid;
    date = new Date();
    date = formatDate((date));
    if($('#amount_paid').val() == total){
        $.ajax({
            url: "../finalsubmitopd",
            type: "post",
            data: {
                'receipt_number':receipt_number,
                'amount':amount,
                'total':total,
                'date':date
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

function givediscountot(total,ipd_number){
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
        url: "../discountot",
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
    if($('#patient_name').val() == '' || $('#contact_number').val() == '' || $('#age').val() == '' || $('#sex').val() == '' || $('#checked_by').val() == '' ){
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
    var type = $("input[name='type']:checked").val();
    any = null;
    if(type=='any'){
        any = $('#anyselect').val();
    }
    ward = $('#ward').val();
    $.ajax({
        url: "../shift",
        type: "post",
        data: {
            'ipd_number':ipd_number,
            'ward':ward,
            'type':type,
            'any':any
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

    var max_chars = 10;

    $('.limit10').keydown( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });
    
    $('.limit10').keyup( function(e){
        if ($(this).val().length >= max_chars) { 
            $(this).val($(this).val().substr(0, max_chars));
        }
    });
    
