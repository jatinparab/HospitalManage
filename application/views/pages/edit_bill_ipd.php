<?php
                
                  
                
                $entries = $this->ipd_management->get_bill_entries($patient_data['ipd_number']);
                $visiting = $this->ipd_management->get_visiting_entries($patient_data['ipd_number']);                $general = 0;
                $icu = 0;
                $sicu = 0;
                $special = 0;
                $other =0;
                $already_paid = 0;
                $dpo = 0;
                $admin = ($this->session->userdata['logged_in']['admin']);
                

?>

<?php  $this->load->view('templates/head'); ?>
<style>
body{
  background:#fff !important;
}
</style>

<div  class="container" id="bill-bg" style="margin-top:100px;padding:25px;margin-bottom:100px;">
<div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="<?=base_url()?>assets/img/LOGO.jpg" style="height:150px" class="img-responsive "  /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6 text-right" style="font-size:17px;">
            
               <strong style="font-size:30px;">   Sukham  Hospital (Karanjade)</strong>
              <br />
               <br> Plot No. 271, Behind Ganesh Temple,<br> Karanjade Panvel,<br> Maharashtra 410206
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span>
                 <strong>Email : </strong>  sukhamhospital@gmail.com 
             </span>
             <span>
                 <strong>Call : </strong>  +(9136049988, 7400187988)
             </span>
              <span>
                 <strong>Website: </strong>  www.sukhamhospital.com
             </span>
             <hr />
         </div>
     </div>
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Estimate/Bill</h2><h3 class="pull-right">Bill #<?=$patient_data['ipd_number']?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address style="font-size:13px;">
    				<h4>Patient Details:</h4>
              <strong>Name:</strong> <?=$patient_data['patient_name']?>
    					<br><strong>Address:</strong>
    					<?=$patient_data['address']?><br>
              <strong>Phone Number:</strong>
    					<?=$patient_data['contact_number']?><br>
              <input type="text"  id="ipdnum" name="ipdnum" value="<?=$patient_data['ipd_number']?>" class="form-control" readonly="true" placeholder="Amount" /></td>
    				
    				</address>
    			</div>
    			
    		</div>
    		
    	</div>
    </div>
    <form action="<?=base_url()?>Ipd/editbill"  method="post" class="form-horizontal" >
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default tr-bg" id="panel-bill">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Billing summary</strong></h3>
    			</div>
    			<div class="panel-body tr-bg">
    				<div class="table-responsive">
    					<table  class="table table-condensed tr-bg">
    						<thead>
                                <tr>
                                <td><strong>Sr No.</strong></td>
        							<td><strong>Procedure/Test</strong></td>
        							<td class="text-center"><strong>Amount</strong></td>
        							<td class="text-center"><strong>Number of Test</strong></td>
        							
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    						
                  <?php 
                  $i=1; $sum=0;$visit_charge=0;
                  foreach($visiting as $visit){ ?>
                    <tr>
                                 <td><?=$i?></td>
                         <td>Visiting - <input type="text"  id="vdoctor_name" name="vdoctor_name" value="<?=$visit['doctor_name']?>" class="form-control onlytext" placeholder="Visiting docotr name Name" /> </td>
                     <td class="text-center">Rs. <input type="text"  id="amount" name="amount" value="<?=$visit['amount']?>" class="form-control onlynumber" placeholder="Amount" /></td>
                     <td class="text-center"><input type="text"  id="visit_days" name="visit_days" value="<?=$visit['days']?>" class="form-control onlynumber" placeholder="Visit days" /></td>
                     
                   </tr>
                  
                 <?php $i++; } 
                  
                  foreach($entries as $entry){ 
                    
                      if($entry['type'] == 0 && $general == 0){
                        $general = 1;
                        ?>
                        <tr><td colspan="5"><input type="text"  id="ward" name="ward" value="General Ward Charges" class="form-control onlytext" placeholder="Ward" /></td></tr>
                        <?php
                      }
                      if($entry['type'] == 1 && $icu == 0){
                        $icu = 1;
                        ?>
                        <tr><td colspan="5"><input type="text"  id="ward" name="ward" value="ICU Ward Charges" class="form-control onlytext" placeholder="Ward" /></td></tr>
                        <?php
                      }
                      if($entry['type'] == 2 && $sicu == 0){
                        $sicu = 1;
                        ?>
                        <tr><td colspan="5"><input type="text"  id="ward" name="ward" value="SICU Ward Charges" class="form-control onlytext" placeholder="Ward" /></td></tr>
                        <?php
                      }
                      if($entry['type'] == 3 && $special == 0){
                        $special = 1;
                        ?>
                        <tr><td colspan="5"><input type="text"  id="ward" name="ward" value="Special Ward Charges" class="form-control onlytext" placeholder="Ward" /></td></tr>
                        <?php
                      }
                      if($entry['type'] == 4 && $other == 0){
                        $other = 1;
                        ?>
                        <tr><td colspan="5"><input type="text"  id="ward" name="ward" value="Other Charges" class="form-control onlytext" placeholder="Ward" /></td></tr>
                        <?php
                      }
                      
                     // $sum += $entry['total'];
                    
                    if($entry['name'] == 'Discount'){
                      $discount = $entry;
                      continue;
                    }
                    if(strstr($entry['name'],'Deposit Charge')){
                      $deposit = $entry;
                      $dpo += $entry['total'];
                      //print_r($deposit);
                      continue;
                    }
          
           if(strstr($entry['name'],'Amount Already Paid')){
            $already_paid += -$entry['total'];
           ?>
              <tr>
                                
            						<td><?=$entry['name']?> </td>
                        <td></td>
    								<td class="text-center"></td>
    								<td class="text-center"></td>
    								
    							</tr>
            <?php }else{
              $sum += $entry['total'];
          ?>
                                <tr>
                                <td><?=$i?></td>
            						<td><input type="text"  id="entry_name" name="entry_name" value="<?=$entry['name']?>" class="form-control onlytext" placeholder="entry_name" /> </td>
    								<td class="text-center">Rs. <input type="text"  id="entry_amount" name="entry_amount" value="<?=$entry['amount']?>" class="form-control onlynumber" placeholder="entry_amount" /></td>
    								<td class="text-center"><input type="text"  id="number" name="number" value="<?php if($entry['number'] == -1 ){ echo '1/2'; }else{ echo $entry['number'];}?>" class="form-control onlynumber" placeholder="number" /></td>
    								
    							</tr>
                  <?php $i++; }
                
                
                }?>
               
                  <?php if(isset($visit_charge)){
                    $subtotal=$sum+$visit_charge;}
                    else {$subtotal=$sum;} ?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
                    <td class="thick-line"></td>
    								<td class="thick-line text-center"></td>
    								
    							</tr>
                  <?php if(isset($deposit)){
                    $subtotal = $subtotal + $deposit['total']; ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    								<td class="no-line text-center"></td>
    								<td class="no-line text-right"></td>
    							</tr>
                  <?php } ?>
                  <?php if(isset($discount)){
                    $subtotal = $subtotal - $discount['total']; ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    								
    							</tr>
                  <?php }if(!$patient_data['done']){ ?>
                  
                  <?php if($already_paid > 0){
                    $subtotal = $subtotal - $already_paid; ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    							
    							
    							</tr>
                  <?php } ?>
                  
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    						
    								
    							</tr>
                  <?php }else{ ?>
                    <tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    							
    							</tr>
                  
                  <?php } ?>
    						</tbody>
    					</table>
              
    				</div>
         
            </div>
            
            
    			</div>
          
    		
        <div>
        <?php if($patient_data['done']){ ?>
              <h3 class="text-center"> Bill paid</h3>
              <br>
              <div class="row text-center">
              <button type="submit" class="btn btn-sm btn-success">Edit Bill</button>
              </div>
              
              <?php } ?>
              
        </div>
        




