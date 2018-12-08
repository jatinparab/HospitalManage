

<?php
                $entries = $this->opd_management->get_bill_entries($patient_data['receipt_number']);

?>
<body>

<div id="print1">
    <div class="section-to-print" style="width:800px;margin:0 auto">
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
    <div style=" width:300px;margin:0 auto" class="section-to-print">
      <p>Tel:9876543210 &emsp; &emsp; Reg no. 346</p>
    </div>
    <div style="width:200px;margin:0 auto;border:1px solid;" class="section-to-print">
      <p style="text-align:center">
        <b> ESTIMATE / BILL
          <b>
      </p>
    </div>
    <br>
    <div class="text-center section-to-print">
      <p>
        <b>NAME OF PATIENT:&emsp; &emsp;
          <?=$patient_data['patient_name']?>
        </b>
      </p>
    </div>
</div>

    <div id="jatin" class="col-sm-8 col-sm-offset-2">
      <table  class="table table-bordered">
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
        <td><?=$entry['amount']?></td>
        <td><?=$entry['number']?></td>
        <td><?=$entry['total']?></td>
        </tr>
        <?php $i++; } ?>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align:right">Total</td>
        <td><?=$sum;?></td>
        </tbody>
      </table>
      <div id="hidethis">
      <a  href="<?=base_url()?>opd_details"  class="btn btn-success col-sm-offset-5">Submit</a>
      <button  onclick="printDiv('bill')" class="btn btn-success col-sm-offset-5">Submit</button>
      </div>
     

    </div>

</body>
  