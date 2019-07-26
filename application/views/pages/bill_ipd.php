

<?php
                
                  
                
                $entries = $this->ipd_management->get_bill_entries($patient_data['ipd_number']);
                $visiting = $this->ipd_management->get_visiting_entries($patient_data['ipd_number']);  
                $ot_charges = $this->ipd_management->get_ot_entries($patient_data['ipd_number']);
                $is_ot_paid = $this->ipd_management->is_ot_paid($patient_data['ipd_number']); 
                $general = 0;
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
    				
    				</address>
    			</div>
    			
    		</div>
    		
    	</div>
    </div>
    
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
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    						
                  <?php 
                  $i=1; $sum=0;$visit_charge=0;$ot_charge=0;
                  foreach($visiting as $visit){ ?>
                    <tr>
                                 <td><?=$i?></td>
                         <td>Visiting - <?=$visit['doctor_name']?> </td>
                     <td class="text-center">Rs. <?=$visit['amount']?></td>
                     <td class="text-center"><?=$visit['days']?></td>
                     <td class="text-right">Rs. <?=$visit['amount']*$visit['days']?></td>
                   </tr>
                   <?php $visit_charge+=$visit['amount']*$visit['days'];?>
                 <?php $i++; } 
                  
                  foreach($entries as $entry){ 
                    
                      if($entry['type'] == 0 && $general == 0){
                        $general = 1;
                        ?>
                        <tr><td colspan="5">General Ward Charges</td></tr>
                        <?php
                      }
                      if($entry['type'] == 1 && $icu == 0){
                        $icu = 1;
                        ?>
                        <tr><td colspan="5">ICU Ward Charges</td></tr>
                        <?php
                      }
                      if($entry['type'] == 2 && $sicu == 0){
                        $sicu = 1;
                        ?>
                        <tr><td colspan="5">SICU Ward Charges</td></tr>
                        <?php
                      }
                      if($entry['type'] == 3 && $special == 0){
                        $special = 1;
                        ?>
                        <tr><td colspan="5">Special Ward Charges</td></tr>
                        <?php
                      }
                      if($entry['type'] == 4 && $other == 0){
                        $other = 1;
                        ?>
                        <tr><td colspan="5">Other Charges</td></tr>
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
    								<td class="text-right">Rs. <?=-$entry['total']?></td>
    							</tr>
            <?php }else{
              $sum += $entry['total'];
          ?>
                                <tr>
                                <td><?=$i?></td>
            						<td><?=$entry['name']?> </td>
    								<td class="text-center">Rs. <?=$entry['amount']?></td>
    								<td class="text-center"><?php if($entry['number'] == -1 ){ echo '1/2'; }else{ echo $entry['number'];}?></td>
    								<td class="text-right">Rs. <?=$entry['total']?></td>
    							</tr>
                  <?php $i++; }
                
                
                }

                if(count($ot_charges)>0){
?>

                  <tr><td colspan="5">Operation Theater Charges</td></tr>
<?php
                foreach($ot_charges as $charge){ ?>
                  <tr>
                               <td><?=$i?></td>
                       <td><?=$charge['name']?> </td>
                   <td class="text-center">Rs. <?=$charge['total']?></td>
                   <td class="text-center">1</td>
                   <?php if($is_ot_paid){ ?>
                   <td class="text-right">Rs. <?=$charge['total']?></td>
                   <?php }else{ ?>
                    <td class="text-right">Rs. <?=$charge['total']?></td>
                   <?php } ?>
                 </tr>
                 <?php $ot_charge+=$charge['total'];?>
               <?php $i++; }
                } $subtotal = $sum;
                
                if(isset($visit_charge)){
                  $subtotal+=$ot_charge;
                }
                
                ?>
                  <?php 
                  
                  if(isset($visit_charge)){
                    $subtotal+=$visit_charge;
                  }
                  else {$subtotal=$sum;} ?>


    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
                    <td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">Rs. <?=$subtotal?></td>
    							</tr>
                  <?php if(isset($deposit)){
                    $subtotal = $subtotal + $deposit['total']; ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Deposit</strong></td>
    								<td class="no-line text-right">Rs. <?=-$dpo?></td>
    							</tr>
                  <?php } ?>
                  <?php if(isset($discount)){
                    $subtotal = $subtotal - $discount['total']; ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Discount</strong></td>
    								<td class="no-line text-right">Rs. <?=$discount['total']?></td>
    							</tr>
                  <?php }if(!$patient_data['done']){ ?>
                  
                  <?php if($already_paid > 0){
                    $subtotal = $subtotal - $already_paid; ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Paid</strong></td>
    								<td class="no-line text-right">Rs. <?=$already_paid?></td>
    							</tr>
                  <?php } ?>
                  
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Pending</strong></td>
    								<td class="no-line text-right">Rs. <?=$subtotal?></td>
    							</tr>
                  <?php }else{ ?>
                    <tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Paid</strong></td>
    								<td class="no-line text-right">Rs. <?=$subtotal?></td>
    							</tr>
                  
                  <?php } ?>
    						</tbody>
    					</table>
              
    				</div>
            <?php if(!$patient_data['done']  ){ ?>
            <div class="row hideit">
            <?php if($admin) {?>
            <div class="col-sm-2">
            <strong>
                    Discount?
            </strong>
            <div class="radio">
  <label><input onchange="radioclick()" value="1" type="radio" name="optradio" >Yes</label>
</div>
<div class="radio">
  <label><input type="radio" onchange="radioclick()" value="0" name="optradio" checked>No</label>
</div>
            </div>
            <div class="col-sm-2 discountdiv" style="display:none">
            <label for="amountpaid" class="text-right">Discount Amount</label>
            <input type="text" id="discountamt" class="form-control pull-right" >
            </div>
            <div class="col-sm-2 discountdiv" style="display:none">
            <label for="amountpaid" class="text-right">Discount Type</label>

           <select class="form-control" name="" id="discounttype">
                    <option value="1">Percent</option>
                    <option value="2">Flat Off</option>
          </select>
            </div>
            <?php } ?>
            <div class="col-sm-2 discountdiv" style="display:none">
            <button class="btn btn-primary m-t-20" onclick="givediscountipd('<?=$subtotal?>','<?=$patient_data['ipd_number']?>')" >Give Discount</button>
            </div>
            <div class="col-sm-2 pull-right">
            <label for="amount_paid" class="text-right">Amount Paid</label>
            <input type="text" id="amount_paid" class="form-control pull-right onlynumber" >
            </div>
            </div>
            <br>
        <div class="row hideit" style="margin:5px;">
        <button onclick="finalsubmitipd('<?=$patient_data['ipd_number']?>','<?=$subtotal?>','<?=$already_paid?>')" class="btn btn-warning pull-right m-l-5 ">Submit</button>
            <button onclick="partialsubmitipd('<?=$patient_data['ipd_number']?>','<?=$subtotal?>')" class="btn btn-primary pull-right m-l-5 ">Partial Submit</button>
            <button onclick="printIt()" class="btn btn-danger pull-right m-l-5 ">Print</button>
        </div>
         
            </div>
            <?php } ?>
            
    			</div>
          
    		
        <div>
        <?php if($patient_data['done']){ ?>
              <h3 class="text-center"> Bill paid</h3>
              <br>
              <div class="row text-center">
              <button type="button" onclick="printIt()" style="font-size:18px;" class="btn btn-success text-center m-l-10">Print</button>
              <button type="button" onclick="save2pdf('<?=$patient_data['ipd_number']?>','<?=date('Y-m-d')?>')" style="font-size:18px;" class="btn btn-warning text-center m-l-10">Save To PDF</button>

              </div>
              
              <?php } ?>
        </div>
        




