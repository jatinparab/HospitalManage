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
    
        if (e.shiftKey || e.ctrlKey || e.altKey) {
        
          e.preventDefault();
          
        } else {
        
          var key = e.keyCode;
          
          if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
          
            e.preventDefault();
            
          }
    
        }
        
      });
    
});

function printDiv(divName){
    $('#hidethis').hide();
    var printContents = document.getElementById('print1').innerHTML;
  //  var printContents = printContents + document.getElementById('print2').innerHTML;
    var printContents = printContents + document.getElementById('jatin').innerHTML;

    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    window.location = "";
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



    
    
