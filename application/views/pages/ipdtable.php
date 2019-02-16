<?php 
    $data = $this->ipd_management->ipdreports($_GET['start'],$_GET['end'],$_GET['type']);
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
                                   <th>Date of admission</th>
                                   <th>Date of discharge</th>
                                   <th><?php if($_GET['type']=='unpaid'){ echo 'Pending '; } ?>Amount</th>
                                   
                                   
                                   
                                   
                               </tr>
                           </thead>
                           <tbody>
                           <?php foreach($data as $entry){ 
                                    if($_GET['type'] == 'paid'){
                                        $entry = $this->ipd_management->get_ipd_details_from_id($entry['ipd_number']);
                                    }
                               ?>
                               <tr>
                               <?php foreach($entry as $field => $value){
                                   
                                  // print_r($entry);
                                   if($field=='id' || $field=='ipd_number' || $field == 'patient_name' || $field == 'contact_number'  || $field == 'date_of_addmission'  || $field == 'date_of_discharge'  ){

                                   
                                   ?>
                                   <td><?php 
                                   if($value == ''){
                                       echo 'N/A';
                                   }else{
                                   echo $value;
                                   }
                                   ?></td>
                               <?php }if($field=='ipd_number'){
                               $total = $this->ipd_management->gettotal($value);
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
                            <a onclick="printipdreports()" class="btn btn-warning hideit">Print</a>
                           </div>
        <?php
    }else{
        echo 'No entries found';
    }
?>