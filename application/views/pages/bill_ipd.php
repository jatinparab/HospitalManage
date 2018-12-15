<?php
                $entries = $this->ipd_management->get_bill_entries($patient_data['ipd_number']);
                $visiting = $this->ipd_management->get_visiting_entries($patient_data['ipd_number']);
//print_r($visiting)
?>

 <div id="print1">
    <div id="print3" class="section-to-print" style="width:800px;margin:0 auto">
    
      <table border='1' cellspacing='0' width='100%'>
        <tr>
          <td align="center" style="font-size:30px;">
            <strong>SUKHAM HOSPITAL (KARANJADE)</strong>
          </td>
        </tr>
        <tr>
          <td align="center">
            <u>
              <b>
                <i>WITH YOU FOR LIFE.....</i>
              </b>
            </u>
          </td>
        </tr>
        <tr>
          <td align="center">PLOT NO 271, BEHIND GANESH TEMPLE, KARANJADE PANVEL</td>
        </tr>
      </table>
    </div>
    <div id="print2" class="section-to-print" style="width:300px;margin:0 auto">
      <p>Tel:9876543210 &emsp; &emsp; Reg no. 346</p>
    </div>
    <div id="print3" class="section-to-print" style="width:200px;margin:0 auto;border:1px solid;">
      <p style="text-align:center">
        <b> ESTIMATE / BILL
          <b>
      </p>
    </div>
    <br>
    <div id="print4" class="text-center section-to-print">
      <p>
        <b>NAME OF PATIENT:&emsp; &emsp;
          <?=$patient_data['patient_name']?>
        </b>
      </p>
    </div>
</div>
   <div id="jatin">
   <table class="table table-bordered section-to-print">
        <thead>
          <tr>
            <th>Sr. No</th>
            <th>Name</th>
            <th>Amount</th>
            <th >Number</th>
            <th>Total Amount </th>
            
          </tr>
        </thead>
        <tbody>
        <?php $i=1; $sum=0; foreach($entries as $entry){ 
          $sum += $entry['total'];?>
        <tr>
        <td><?=$i?></td>
        <td><?=$entry['name']?></td>
        <?php if(strstr($entry['name'],'Amount Already Paid')){ ?>
        
        <td></td>
        <td></td>
        <td><?=-$entry['total']?></td>

        <?php }else{ ?>
          <td><?=$entry['amount']?></td>
          <td><?=$entry['number']?></td>
        <td><?=$entry['total']?></td>
        <?php } ?>
        </tr>
        <?php $i++; }
        if(count($visiting)>0){
          foreach($visiting as $entry){
            $sum += $entry['amount']*$entry['days'];
          ?>
<tr>
        <td><?=$i?></td>
        <td>Visiting Dr.<?=$entry['doctor_name']?></td>
        <td><?=$entry['amount']?></td>
        <td><?=$entry['days']?>  Days</td>
        <td><?=$entry['amount']*$entry['days']?></td>
        </tr>

<?php
       $i++; } }


        
        
        ?>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align:right">Amount Due</td>
        <td id="finalamount"><?=$sum;?></td>
        </tbody>
      </table>
  </div>
          

    
      <div id="discount" class="row text-center">
      <h5>Discount</h5>
      <input placeholder="discount" id="amount"  type="text">
      <select  id="type">
      <option value="0">Percent</option>
      <option value="1">Flat Off</option>
      </select><br><br>
      <button onclick="givediscount()" class="btn btn-default btn-sm">Give Discount</button>
      </div>

      <div class="row text-center">
      <br>
            <input id="amountpaid" placeholder="Amount Paid" type="text" style="width:13%;height:30px;" class="col-sm-offset-">
      </div>
      

     
      <br>
      <a  href="<?=base_url()?>ipd_details" class="btn btn-danger col-sm-offset-5">Submit</a>
      <a class="btn btn-info " onclick="partialsubmitipd('<?=$patient_data['ipd_number']?>')">Partial Submit </a>
      <button class="btn btn-success " onclick="printDiv('bill')">Print</button>
      <br>
      <br>
      <br>

   
          </body>
  