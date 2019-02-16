<?php 
    $data = $this->ot_management->otreports($_GET['start'],$_GET['end'],$_GET['type']);
    //print_r($data);
  $sum = 0;
    if(count($data)>0){
        ?>
        <div class="showit hidden">
        <h4>IPD Reports</h4>
        <h5>From: <?=$_GET['start']?></h5>
        <h5>To: <?=$_GET['end']?></h5>
        <h5>Type: <?=ucfirst($_GET['type'])?></h5>
        </div>
        <table   class="table table-striped table-bordered">
 <thead>
                               
                               <tr>
                                   <th>Sr. No</th>
                                   <th>IPD Number</th>
                                   <th>Patient Name</th>
                                   <th>Contact Number</th>
                                   <th>Type of operation</th>
                                   <th>Date</th>
                                   <th><?php if($_GET['type']=='unpaid'){ echo 'Pending '; } ?>Amount</th>
                                   
                                   
                                   
                                   
                               </tr>
                           </thead>
                           <tbody>
                           <?php foreach($data as $entry){ 
                                    if($_GET['type'] == 'paid'){
                                        $entry = $this->ot_management->get_ot_details_from_id($entry['ipd_number']);
                                    }
                               ?>
                               <tr>
                               <?php foreach($entry as $field => $value){
                                   
                                  // print_r($entry);
                                   if($field=='id' || $field=='ipd_number' || $field == 'name' || $field == 'number'  || $field == 'date'  || $field == 'type'  ){

                                   
                                   ?>
                                   <td><?php 
                                   if($value == ''){
                                       echo 'N/A';
                                   }else{
                                   echo $value;
                                   }
                                   ?></td>
                               <?php }if($field=='ipd_number'){
                               $total = $this->ot_management->gettotal($value);
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
                            <a onclick="printotreports()" class="btn btn-warning hideit">Print</a>
                           </div>
        <?php
    }else{
        echo 'No entries found';
    }
?>