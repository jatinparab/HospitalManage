<?php 
    $data = $this->ipd_management->search_ipd($_GET['type'],$_GET['value']);
    if(count($data)>0){
        ?>
 <thead>
                               
                               <tr>
                                   <th>Sr. No</th>
                                   <th>IPD Number</th>
                                   <th>Patient Name</th>
                                   <th>Contact Number</th>
                                   <th>Add Charge</th>
                                   
                                   
                                   
                                   
                               </tr>
                           </thead>
                           <tbody >
                           <?php foreach($data as $entry){ ?>
                               <tr>
                               <?php foreach($entry as $field => $value){
                                  // print_r($entry);
                                   if($field=='id' || $field=='ipd_number' || $field == 'patient_name' || $field == 'contact_number' ){

                                   
                                   ?>
                                   <td><?=$value?></td>
                               <?php }if($field=='receipt_number'){
                               $total = $this->opd_management->gettotal($value);
                              // print_r($total);
                               }
                               ?> 
                               
                               <?php
                           
                           } ?>
                               
                               <td><a href="<?=base_url()?>visiting?ipd_number=<?=$entry['ipd_number']?>" class="btn btn-info" >Add Charge</a></td>
                               </tr>
                           <? }?>

                           
                           </tbody>
        <?php
    }else{
        echo 'No entries found';
    }
?>