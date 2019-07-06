
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
                                    <label class="col-md-2 control-label">IPD Number</label>
                                    <div class="col-md-2">
                                        <input name="receipt_number" type="text" class="form-control" value="<?=$patient_data['ipd_number'];?>" disabled />
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-2 control-label">Patient Name</label>
                                    <div class="col-md-3">
                                        <input  type="text" class="form-control" value="<?=$patient_data['patient_name'];?>" disabled />
                                    </div>
                                    <label   class="col-md-2 control-label">Ward <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-2">
                                        <select id="ward" onchange="buttonactive('<?=$patient_data['ward'];?>')" name="ward" class="form-control">
                                            <option <?php if($patient_data['ward'] == 'General'){ echo 'selected'; } ?> >General</option>
                                            <option <?php if($patient_data['ward'] == 'ICU'){ echo 'selected'; } ?> >ICU</option>
                                            <option <?php if($patient_data['ward'] == 'SICU'){ echo 'selected'; } ?> >SICU</option>
                                            <option <?php if($patient_data['ward'] == 'Special'){ echo 'selected'; } ?> >Special</option>
                                            <?php  $ward_name=$patient_data['ward']; ?>
                                        </select>
                                        <div id="radiobuttons" class="hidden">
                                        <div class="radio" onclick="buttonRadio()">
                                            <label><input type="radio" value='full' name="type">Full Day</label>
                                            </div>
                                            <div class="radio" onclick="buttonRadio()">
                                            <label><input type="radio" value='half' name="type">Half Day</label>
                                            </div>
                                            <div class="radio" onclick="buttonRadio()">
                                            <label><input type="radio" value='any' name="type">Any One Ward</label>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                    <a class="btn btn-danger" id="shiftbtn" disabled  onclick="shiftpatient('<?=$patient_data['ipd_number']?>')">Shift</a>
                                    <br><br>
                                    <select name="" id="anyselect" onchange="anysellect()" class="form-control hidden">
                                        <option value="-1">Select</option>
                                        <option value="current">
                                           Current Ward 
                                        </option>
                                        <option value="shifted">
                                           Shifted Ward 
                                        </option>
                                    </select>
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
                                           
                                                <tr>
                                                <td>
                                                    <input name="xray" type="checkbox" class="check" id="xray">
                                                </td>
                                                <td>
                                                  X-Ray
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="xray_amount"  oninput="calculate(this)" name="xray_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="xray_number"  oninput="ncalculate(this)" name="xray_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="xray_total" name="xray_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="RBS" type="checkbox" class="check" id="RBS">
                                                </td>
                                                <td>
                                                  RBS
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="RBS_amount"  oninput="calculate(this)" name="RBS_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="RBS_number"  oninput="ncalculate(this)" name="RBS_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="RBS_total" name="RBS_total" readonly='readonly' disabled />
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
                                                    <input type="number" class="form-control" id="EEG_amount"  oninput="calculate(this)" name="EEG_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="EEG_number"  oninput="ncalculate(this)" name="EEG_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="EEG_total" name="EEG_total" readonly='readonly' disabled />
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
                                                    <input type="number" class="form-control" id="Foliys-Catheter_amount"  oninput="calculate(this)" name="Foliys-Catheter_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Foliys-Catheter_number"  oninput="ncalculate(this)" name="Foliys-Catheter_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Foliys-Catheter_total" name="Foliys-Catheter_total" readonly='readonly' disabled />
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
                                                    <input type="number" class="form-control" id="Dressing_amount"  oninput="calculate(this)" name="Dressing_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Dressing_number"  oninput="ncalculate(this)" name="Dressing_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Dressing_total" name="Dressing_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="Plaster" type="checkbox" class="check" id="Plaster">
                                                </td>
                                                <td>
                                                  Plaster
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Plaster_amount"  oninput="calculate(this)" name="Plaster_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Plaster_number"  oninput="ncalculate(this)" name="Plaster_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Plaster_total" name="Plaster_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="2D-ECHO" type="checkbox" class="check" id="2D-ECHO">
                                                </td>
                                                <td>
                                                  2D ECHO
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="2D-ECHO_amount"  oninput="calculate(this)" name="2D-ECHO_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="2D-ECHO_number"  oninput="ncalculate(this)" name="2D-ECHO_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="2D-ECHO_total" name="2D-ECHO_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="2D-ECHO-Screening" type="checkbox" class="check" id="2D-ECHO-Screening">
                                                </td>
                                                <td>
                                                  2D ECHO Screening
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="2D-ECHO-Screening_amount"  oninput="calculate(this)" name="2D-ECHO-Screening_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="2D-ECHO-Screening_number"  oninput="ncalculate(this)" name="2D-ECHO-Screening_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="2D-ECHO-Screening_total" name="2D-ECHO-Screening_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="BT" type="checkbox" class="check" id="BT">
                                                </td>
                                                <td>
                                                  BT
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="BT_amount"  oninput="calculate(this)" name="BT_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="BT_number"  oninput="ncalculate(this)" name="BT_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="BT_total" name="BT_total" readonly='readonly' disabled />
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="NOSAL-O2" type="checkbox" class="check" id="NOSAL-O2">
                                                </td>
                                                <td>
                                                  NOSAL O2
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="NOSAL-O2_amount"  oninput="calculate(this)" name="NOSAL-O2_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="NOSAL-O2_number"  oninput="ncalculate(this)" name="NOSAL-O2_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="NOSAL-O2_total" name="NOSAL-O2_total" readonly='readonly' disabled />
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
                                                    <input type="number" class="form-control" id="Nebulization_amount"  oninput="calculate(this)" name="Nebulization_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Nebulization_number"  oninput="ncalculate(this)" name="Nebulization_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Nebulization_total" name="Nebulization_total" readonly='readonly' disabled />
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
                                                    <input type="number" class="form-control" id="USG_amount"  oninput="calculate(this)" name="USG_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="USG_number"  oninput="ncalculate(this)" name="USG_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="USG_total" name="USG_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="RT" type="checkbox" class="check" id="RT">
                                                </td>
                                                <td>
                                                  RT
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="RT_amount"  oninput="calculate(this)" name="RT_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="RT_number"  oninput="ncalculate(this)" name="RT_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="RT_total" name="RT_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="DIYLASIS" type="checkbox" class="check" id="DIYLASIS">
                                                </td>
                                                <td>
                                                  DIYLASIS
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="DIYLASIS_amount"  oninput="calculate(this)" name="DIYLASIS_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="DIYLASIS_number"  oninput="ncalculate(this)" name="DIYLASIS_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="DIYLASIS_total" name="DIYLASIS_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Doppler" type="checkbox" class="check" id="Doppler">
                                                </td>
                                                <td>
                                                  Doppler
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Doppler_amount"  oninput="calculate(this)" name="Doppler_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Doppler_number"  oninput="ncalculate(this)" name="Doppler_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Doppler_total" name="Doppler_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <?php if($ward_name=='Special'){?>
                                                <tr>
                                            <td>
                                                    <input name="Suction" type="checkbox" class="check" id="Suction">
                                                </td>
                                                <td>
                                                  Suction
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Suction_amount"  oninput="calculate(this)" name="Suction_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Suction_number"  oninput="ncalculate(this)" name="Suction_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Suction_total" name="Suction_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Infusion-Set" type="checkbox" class="check" id="Infusion-Set">
                                                </td>
                                                <td>
                                                  Infusion Set
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Infusion-Set_amount"  oninput="calculate(this)" name="Infusion-Set_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Infusion-Set_number"  oninput="ncalculate(this)" name="Infusion-Set_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Infusion-Set_total" name="Infusion-Set_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Air-Bag" type="checkbox" class="check" id="Air-Bag">
                                                </td>
                                                <td>
                                                  Air Bag
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Air-Bag_amount"  oninput="calculate(this)" name="Air-Bag_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Air-Bag_number"  oninput="ncalculate(this)" name="Air-Bag_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Air-Bag_total" name="Air-Bag_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="PCV" type="checkbox" class="check" id="PCV">
                                                </td>
                                                <td>
                                                  PCV
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="PCV_amount"  oninput="calculate(this)" name="PCV_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="PCV_number"  oninput="ncalculate(this)" name="PCV_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="PCV_total" name="PCV_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="SDP" type="checkbox" class="check" id="SDP">
                                                </td>
                                                <td>
                                                  SDP
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="SDP_amount"  oninput="calculate(this)" name="SDP_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="SDP_number"  oninput="ncalculate(this)" name="SDP_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="SDP_total" name="SDP_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <?php } ?>
                                            <?php if($ward_name=='ICU' || $ward_name=='SICU'){ ?>
                                                <tr>
                                            <td>
                                                    <input name="Suction" type="checkbox" class="check" id="Suction">
                                                </td>
                                                <td>
                                                  Suction
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Suction_amount"  oninput="calculate(this)" name="Suction_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Suction_number"  oninput="ncalculate(this)" name="Suction_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Suction_total" name="Suction_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Ventilator-Charges" type="checkbox" class="check" id="Ventilator-Charges">
                                                </td>
                                                <td>
                                                  Ventilator Charges
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Ventilator-Charges_amount"  oninput="calculate(this)" name="Ventilator-Charges_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Ventilator-Charges_number"  oninput="ncalculate(this)" name="Ventilator-Charges_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Ventilator-Charges_total" name="Ventilator-Charges_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Ventilator-O2" type="checkbox" class="check" id="Ventilator-O2">
                                                </td>
                                                <td>
                                                  Ventilator O2
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Ventilator-O2_amount"  oninput="calculate(this)" name="Ventilator-O2_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Ventilator-O2_number"  oninput="ncalculate(this)" name="Ventilator-O2_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Ventilator-O2_total" name="Ventilator-O2_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Venti-Tube" type="checkbox" class="check" id="Venti-Tube">
                                                </td>
                                                <td>
                                                  Venti Tube
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Venti-Tube_amount"  oninput="calculate(this)" name="Venti-Tube_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Venti-Tube_number"  oninput="ncalculate(this)" name="Venti-Tube_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Venti-Tube_total" name="Venti-Tube_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Venti-Mask" type="checkbox" class="check" id="Venti-Mask">
                                                </td>
                                                <td>
                                                  Venti Mask
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Venti-Mask_amount"  oninput="calculate(this)" name="Venti-Mask_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Venti-Mask_number"  oninput="ncalculate(this)" name="Venti-Mask_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Venti-Mask_total" name="Venti-Mask_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Infusion-Set" type="checkbox" class="check" id="Infusion-Set">
                                                </td>
                                                <td>
                                                  Infusion Set
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Infusion-Set_amount"  oninput="calculate(this)" name="Infusion-Set_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Infusion-Set_number"  oninput="ncalculate(this)" name="Infusion-Set_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Infusion-Set_total" name="Infusion-Set_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Air-Bag" type="checkbox" class="check" id="Air-Bag">
                                                </td>
                                                <td>
                                                  Air Bag
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Air-Bag_amount"  oninput="calculate(this)" name="Air-Bag_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Air-Bag_number"  oninput="ncalculate(this)" name="Air-Bag_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Air-Bag_total" name="Air-Bag_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="DC-Shock" type="checkbox" class="check" id="DC-Shock">
                                                </td>
                                                <td>
                                                  DC Shock
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="DC-Shock_amount"  oninput="calculate(this)" name="DC-Shock_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="DC-Shock_number"  oninput="ncalculate(this)" name="DC-Shock_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="DC-Shock_total" name="DC-Shock_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Intibution" type="checkbox" class="check" id="Intibution">
                                                </td>
                                                <td>
                                                  Intibution
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Intibution_amount"  oninput="calculate(this)" name="Intibution_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Intibution_number"  oninput="ncalculate(this)" name="Intibution_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Intibution_total" name="Intibution_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Centerline" type="checkbox" class="check" id="Centerline">
                                                </td>
                                                <td>
                                                  Centerline
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Centerline_amount"  oninput="calculate(this)" name="Centerline_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Centerline_number"  oninput="ncalculate(this)" name="Centerline_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Centerline_total" name="Centerline_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="HD-Catheter" type="checkbox" class="check" id="HD-Catheter">
                                                </td>
                                                <td>
                                                  HD Catheter
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="HD-Catheter_amount"  oninput="calculate(this)" name="HD-Catheter_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="HD-Catheter_number"  oninput="ncalculate(this)" name="HD-Catheter_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="HD-Catheter_total" name="HD-Catheter_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Endescopy" type="checkbox" class="check" id="Endescopy">
                                                </td>
                                                <td>
                                                  Endescopy
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Endescopy_amount"  oninput="calculate(this)" name="Endescopy_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Endescopy_number"  oninput="ncalculate(this)" name="Endescopy_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Endescopy_total" name="Endescopy_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Tricostromy" type="checkbox" class="check" id="Tricostromy">
                                                </td>
                                                <td>
                                                  Tricostromy
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Tricostromy_amount"  oninput="calculate(this)" name="Tricostromy_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Tricostromy_number"  oninput="ncalculate(this)" name="Tricostromy_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Tricostromy_total" name="Tricostromy_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="USG-Guide-Tapping" type="checkbox" class="check" id="USG-Guide-Tapping">
                                                </td>
                                                <td>
                                                  USG Guide Tapping
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="USG-Guide-Tapping_amount"  oninput="calculate(this)" name="USG-Guide-Tapping_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="USG-Guide-Tapping_number"  oninput="ncalculate(this)" name="USG-Guide-Tapping_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="USG-Guide-Tapping_total" name="USG-Guide-Tapping_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="PCV" type="checkbox" class="check" id="PCV">
                                                </td>
                                                <td>
                                                  PCV
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="PCV_amount"  oninput="calculate(this)" name="PCV_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="PCV_number"  oninput="ncalculate(this)" name="PCV_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="PCV_total" name="PCV_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="SDP" type="checkbox" class="check" id="SDP">
                                                </td>
                                                <td>
                                                  SDP
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="SDP_amount"  oninput="calculate(this)" name="SDP_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="SDP_number"  oninput="ncalculate(this)" name="SDP_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="SDP_total" name="SDP_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Thermoblyse" type="checkbox" class="check" id="Thermoblyse">
                                                </td>
                                                <td>
                                                  Thermoblyse
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Thermoblyse_amount"  oninput="calculate(this)" name="Thermoblyse_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Thermoblyse_number"  oninput="ncalculate(this)" name="Thermoblyse_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Thermoblyse_total" name="Thermoblyse_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="Gastric-Lavage" type="checkbox" class="check" id="Gastric-Lavage">
                                                </td>
                                                <td>
                                                  Gastric Lavage
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Gastric-Lavage_amount"  oninput="calculate(this)" name="Gastric-Lavage_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="Gastric-Lavage_number"  oninput="ncalculate(this)" name="Gastric-Lavage_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="Gastric-Lavage_total" name="Gastric-Lavage_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <tr>
                                            <td>
                                                    <input name="ICD" type="checkbox" class="check" id="ICD">
                                                </td>
                                                <td>
                                                  ICD
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="ICD_amount"  oninput="calculate(this)" name="ICD_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="ICD_number"  oninput="ncalculate(this)" name="ICD_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="ICD_total" name="ICD_total" readonly='readonly' disabled />
                                                </td>                           
                                            </tr>
                                            <?php } ?>
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
	

