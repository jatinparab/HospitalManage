
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
			        <!-- begin panel -->
                    <div class="pan el panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="pan el-heading">
                            
                            <h4 class="panel-title">OPD Form</h4>
                        </div>
                        <br>
                        <div class="pa nel-body text-center">
                        <button class="btn  btn-danger"onclick="movetoipd('<?=$patient_data['id']?>')">Move to IPD</button><br><br><br>
                            <form  action="<?=base_url()?>Opd/opdAdd" method="post" class="form-horizontal col-sm-8 col-sm-offset-2">
                                <input class="hidden" value="SUKPL<?=$patient_data['id']?>" name="receipt_number">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Receipt Number</label>
                                    <div class="col-md-9">
                                        <input name="receipt_number" type="text" class="form-control" value="SUKPL<?=$patient_data['id'];?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient Name</label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" value="<?=$patient_data['patient_name'];?>" disabled />
                                    </div>
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
                                                    <input name="rbs" type="checkbox" class="check" id="rbs">
                                                </td>
                                                <td>
                                                    RBS
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="calculate(this)" id="rbs_amount" name="rbs_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="rbs_number" name="rbs_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="rbs_total"  name="rbs_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ecg" type="checkbox" class="check" id="ecg">
                                                </td>
                                                <td>
                                                    ECG
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="ecg_amount"  oninput="calculate(this)" name="ecg_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="ecg_number"  oninput="ncalculate(this)" name="ecg_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="ecg_total" name="ecg_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="xray" type="checkbox" class="check" id="xray">
                                                </td>
                                                <td>
                                                    X-RAY
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="xray_amount" name="xray_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="xray_number"  name="xray_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="xray_total" name="xray_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Echo" type="checkbox" class="check" id="Echo">
                                                </td>
                                                <td>
                                                    2D Echo
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="Echo_amount" name="Echo_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="Echo_number"  name="Echo_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Echo_total" name="Echo_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="EEG" type="checkbox" class="check" id="EEG">
                                                </td>
                                                <td>
                                                    EEG
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="EEG_amount" name="EEG_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="EEG_number"  name="EEG_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="EEG_total" name="EEG_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Suture" type="checkbox" class="check" id="Suture">
                                                </td>
                                                <td>
                                                    Suture
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="Suture_amount" name="Suture_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="Suture_number"  name="Suture_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Suture_total" name="Suture_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="USG" type="checkbox" class="check" id="USG">
                                                </td>
                                                <td>
                                                    USG
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="USG_amount" name="USG_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="USG_number"  name="USG_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="USG_total" name="USG_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Dressing" type="checkbox" class="check" id="Dressing">
                                                </td>
                                                <td>
                                                    Dressing
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="Dressing_amount" name="Dressing_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="Dressing_number"  name="Dressing_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Dressing_total" name="Dressing_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Stress-Test" type="checkbox" class="check" id="Stress-Test">
                                                </td>
                                                <td>
                                                    Stress Test
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="Stress-Test_amount" name="Stress-Test_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="Stress-Test_number"  name="Stress-Test_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Stress-Test_total" name="Stress-Test_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Diylasis" type="checkbox" class="check" id="Diylasis">
                                                </td>
                                                <td>
                                                    Diylasis
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="Diylasis_amount" name="Diylasis_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="Diylasis_number"  name="Diylasis_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Diylasis_total" name="Diylasis_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ABG" type="checkbox" class="check" id="ABG">
                                                </td>
                                                <td>
                                                    ABG
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="ABG_amount" name="ABG_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="ABG_number"  name="ABG_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="ABG_total" name="ABG_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Foliys-Catheter" type="checkbox" class="check" id="Foliys-Catheter">
                                                </td>
                                                <td>
                                                    Foliys Catheter
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="Foliys-Catheter_amount" name="Foliys-Catheter_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="Foliys-Catheter_number"  name="Foliys-Catheter_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Foliys-Catheter_total" name="Foliys-Catheter_total" readonly="readonly" disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Nebulization" type="checkbox" class="check" id="Nebulization">
                                                </td>
                                                <td>
                                                    Nebulization
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="Nebulization_amount" name="Nebulization_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="Nebulization_number"  name="Nebulization_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Nebulization_total" name="Nebulization_total" readonly="readonly" disabled />
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
	

