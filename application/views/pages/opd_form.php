
<?php
$contact_number=array(
    'name'=>'contact_number',
    'class' => 'form-control onlynumber limit10',
    'type' => 'text',
    'id' => 'contact_number',
    'placeholder' => 'Mobile Number',
    'value'=> set_value('contact_number'),
);
	//$this -> load -> session();
	//session_start();
//print_r($this->session->userdata['logged_in']);
if (isset($this->session->userdata['logged_in'])) {
	$name = ($this->session->userdata['logged_in']['name']);
	$username = ($this->session->userdata['logged_in']['username']);
	} else {
	header("location: login");
    }
    $latest_entry = $this->opd_management->getlatestopd();
?>

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		
		<!-- end #header -->
        
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
			    <div class="col-md-12 col-sm-offset-0">
			        <!-- begin panel -->
                    <div class="pan el panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="pan el-heading">
                        <?php
                            if($this->session->flashdata('Incorrectcontact')){
                        ?>

                        <div class="alert alert-dismissible alert-danger">
                            <div class="flash-data">
                                <button type="button" class="close" data-dismiss="alert">X</button>
                                <?= $this->session->flashdata('Incorrectcontact');?>
                            </div>
                        <div class="clearfix"></div>
                        </div>
                        <?php
                        }
                        ?>
                            
                            <h4 class="panel-title">OPD Form</h4>
                        </div>
                        <div class="pa nel-body">
                            <form action="<?=base_url()?>Opd/formSubmit" onsubmit="return opdsubmit()" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Sr No.</label>
                                    <div class="col-md-1">
                                        <input  type="text" class="form-control" value="<?=$latest_entry?>" readonly="readonly"  />
                                    </div>
                                    <label class="col-md-2 control-label">Receipt Number</label>
                                    <div class="col-md-2">
                                        <input name="receipt_number" type="text" class="form-control" value="SUKPL<?=$latest_entry?>" readonly="readonly" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Patient Name <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-2">
                                        <input type="text" id="patient_name" oninput="this.value = this.value.toUpperCase()"  name="patient_name" class="form-control onlytext" placeholder="Patient Name" />
                                    </div>
                                    <label class="col-md-1 control-label" >Mobile No. <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-2">
                                    <?=form_input($contact_number);?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Address</label>
                                    <div class="col-md-5">
                                        <textarea style="height:40px;" id="address" class="form-control" name="address" placeholder="Textarea" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Age <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-1">
                                        <input type="text" style="width:130px;" maxlength="3" id="age"  class="form-control onlynumber" name="age" placeholder="Default input" />
                                    </div>
                                    <label  class="col-md-2 control-label">Sex <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-2">
                                        <select id="sex" name="sex" class="form-control">
                                            <option value='-1'>Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Diagnosis </label>
                                    <div  class="col-md-5">
                                        <input id="diagnosis" name="diagnosis" type="text" class="form-control" placeholder="Default input" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Checked By <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-2">
                                        <input id="checked_by"  oninput="this.value = this.value.toUpperCase()"  value="Dr. Santosh Sudam Jadhav "  name="checked_by" type="text" class="form-control onlytext focusend" placeholder="Dr." />
                                    </div>
                                    <label class="col-md-1 control-label">Remarks</label>
                                    <div class="col-md-2">
                                        <input id="remarks" name="remarks" type="text" class="form-control" placeholder="Default input" />
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label"> </label>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-sm btn-success">Add Patient Details</button>
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
	

