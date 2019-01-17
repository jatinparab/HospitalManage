
<?php
	//$this -> load -> session();
	//session_start();
//print_r($this->session->userdata['logged_in']);
if (isset($this->session->userdata['logged_in'])) {
	$name = ($this->session->userdata['logged_in']['name']);
	$username = ($this->session->userdata['logged_in']['username']);
	} else {
	header("location: login");
    }
//print_r($patient_data);
?>

	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<?php  $this->load->view('templates/head') ?>
		<!-- begin #sidebar -->
		<?php  $this->load->view('templates/sidebar') ?>
		<!-- end #sidebar -->
        <div id="content" class="content">
			<!-- begin breadcrumb -->
			
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-12">
			        <!-- begin pane l -->
                    <div class="pan el panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="pane l-heading">
                            
                            <h4 class="panel-title">IPD Form</h4>
                        </div> 
                        <div class="pan el-body">
                            <form  action="<?=base_url()?>Ipd/ipdAdd" method="post" class="form-horizontal col-sm-8 col-sm-offset-2">
                                <input class="hidden" value="<?=$patient_data['ipd_number'];?>" name="ipd_number">
                                <div class="form-group">
                                    <label class="col-md-1 control-label">IPD Number</label>
                                    <div class="col-md-2">
                                        <input name="receipt_number" type="text" class="form-control" value="<?=$patient_data['ipd_number'];?>" disabled />
                                    </div>
                                    <label class="col-md-2 control-label">Patient Name</label>
                                    <div class="col-md-2">
                                        <input  type="text" class="form-control" value="<?=$patient_data['patient_name'];?>" disabled />
                                    </div>
                                    <label   class="col-md-2 control-label">Ward <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-2">
                                        <select id="ward" onchange="buttonactive('<?=$patient_data['ward'];?>')" name="ward" class="form-control">
                                            <option <?php if($patient_data['ward'] == 'General'){ echo 'selected'; } ?> >General</option>
                                            <option <?php if($patient_data['ward'] == 'ICU'){ echo 'selected'; } ?> >ICU</option>
                                            <option <?php if($patient_data['ward'] == 'SICU'){ echo 'selected'; } ?> >SICU</option>
                                            <option <?php if($patient_data['ward'] == 'Special'){ echo 'selected'; } ?> >Special</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-danger" id="shiftbtn" disabled  onclick="shiftpatient('<?=$patient_data['ipd_number']?>')">Shift</button>
                                </div>
                                
                                <br>
                                <h4 class="text-center">Charges </h4>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                        <div class="table-responsive">
                                    <table class="table table-default">
                                        <thead>
                                            <tr>
                                                <th>Add</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th style="width:30px;">Number</th>
                                                <th>Total Amount </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input name="ecg" type="checkbox" class="check" id="ecg">
                                                </td>
                                                <td>
                                                    ECG
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="calculate(this)" id="ecg_amount" name="ecg_amount" disabled/>

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="ecg_number" name="ecg_number" value="1" disabled/>

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="ecg_total" name="ecg_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="syringes" type="checkbox" class="check" id="syringes">
                                                </td>
                                                <td>
                                                Syringes
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="calculate(this)" id="syringes_amount" name="syringes_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="syringes_number" name="syringes_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="syringes_total"  name="syringes_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="saline" type="checkbox" class="check" id="saline">
                                                </td>
                                                <td>
                                                  Saline
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="saline_amount"  oninput="calculate(this)" name="saline_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="saline_number"  oninput="ncalculate(this)" name="saline_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="saline_total" name="saline_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>                                    
                            </div>
                                </div>
                               
                               
                                
                                
                                
                                <div  class="form-group text-center">
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success">Submit Charges</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
                <!-- begin col-6 -->
              
            </div>
            <!-- end row -->
           
            <!-- end row -->
            <!-- begin row -->
            
            <!-- end row -->
		</div>

        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
    
	<!-- end page container -->
	

