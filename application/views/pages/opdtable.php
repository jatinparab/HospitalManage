<?php 
    $data = $this->opd_management->opdreports($_GET['start'],$_GET['end'],$_GET['type']);
  //  print_r($data);
  $sum = 0;
    if(count($data)>0){
        ?>
        <div class="showit hidden">
        <h4>OPD Reports</h4>
        <h5>From: <?=$_GET['start']?></h5>
        <h5>To: <?=$_GET['end']?></h5>
        <h5>Type: <?=ucfirst($_GET['type'])?></h5>
        </div>
        <table id="tabul"   class="table table-striped table-bordered">
 <thead>
                               
                               <tr>
                                   <th>Sr. No</th>
                                   <th>Receipt Number</th>
                                   <th>Patient Name</th>
                                   <th>Contact Number</th>
                                   <th>Date</th>
                                   <th><?php if($_GET['type']=='unpaid'){ echo 'Pending '; } ?>Amount</th>
                                   
                                   
                                   
                                   
                               </tr>
                           </thead>
                           <tbody>
                           <?php foreach($data as $entry2){ 
                                       $entry = $this->opd_management->get_opd_details_from_receipt_number($entry2['receipt_number'])
                                    
                               ?>
                               <tr>
                               <?php foreach($entry as $field => $value){
                                  // print_r($entry);
                                   if($field=='id' || $field=='receipt_number' || $field == 'patient_name' || $field == 'contact_number'  || $field == 'date' ){

                                   
                                   ?>
                                   <td><?=$value?></td>
                               <?php }if($field=='receipt_number'){
                               $total = $this->opd_management->gettotal($value);
                               $sum += $total['amount'];
                              // print_r($total);
                               }
                               ?> 
                               
                               <?php
                           
                           } ?>
                               
                               <td>Rs. <?=$total['amount']?></td>
                               </tr>
                           <? }?>

                           
                           </tbody>
                           </table>
                           <div class="text-center">
                            <h5 >Total Patients: <?=count($data)?></h5>
                            <h5>Total Amount: Rs. <?=$sum?></h5>
                            <a onclick="printopdreports()" class="btn btn-warning hideit">Print</a>
                            <a onclick="fnExcelReport('tabul')" class="btn btn-warning hideit">Excel</a>
                           </div>
        <?php
    }else{
        echo 'No entries found';
    }
?>