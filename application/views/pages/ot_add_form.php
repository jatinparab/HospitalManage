
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
                            
                            <h4 class="panel-title">OT Form</h4>
                        </div> 
                        <div class="pan el-body">
                            <form  class="form-horizontal col-sm-8 col-sm-offset-2">
                                <input class="hidden" value="<?=$patient_data['ipd_number'];?>" id="ipd_number">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">IPD Number</label>
                                    <div class="col-md-2">
                                        <input  type="text" class="form-control" value="<?=$patient_data['ipd_number'];?>" disabled />
                                    </div>
                                    
                                    
                                    <label class="col-md-2 control-label">Patient Name</label>
                                    <div class="col-md-3">
                                        <input  type="text" class="form-control" value="<?=$patient_data['patient_name'];?>" disabled />
                                    </div>
                                    
                                    
                                </div>
                                
                                <br>
                                <h4 class="text-center">Charges </h4>
                                <div class="" style="background:#fff;padding:30px;">
                                    <div class="form-group">
                                    <label class="col-md-3 control-label">OT Charges </label>
                                    <div class="col-md-2">
                                        <input id="ot_charge" oninput="ot_total()"  type="text" class="form-control onlynumber"  />
                                    </div>    
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label">Anaesthesia Charges </label>
                                    <div class="col-md-2">
                                        <input  id="a_charge" oninput="ot_total()" type="text" class="form-control onlynumber"  />
                                    </div>    
                                    <label class="col-md-3 control-label">Anesthesiologist Name </label>
                                    <div class="col-md-3">
                                        <input id="a_name"  type="text" class="form-control onlytext"  />
                                    </div> 
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label">Surgeon Charges </label>
                                    <div class="col-md-2">
                                        <input id="s_charge" oninput="ot_total()"  type="text" class="form-control onlynumber"  />
                                    </div>    
                                    <label class="col-md-3 control-label">Surgeon Name</label>
                                    <div class="col-md-4">
                                        <input id="s_name"  type="text" class="form-control onlytext"  />
                                    </div> 
                                    </div>
                                    <br>
                                    <div class="form-group">
                                   
                                    <label class="col-md-5 control-label"> Total </label>

                                    
                                    <div class="col-md-3">
                                    <input id="total"  type="text" class="form-control onlynumber" readonly="readonly" />

                                    </div>

                                    </div>
                                    </div>
                               
                               
                                
                                
                                
                                <div  class="form-group text-center">
                                    
                                    <div class="col-md-12">
                                        <a onclick="ot_charge('<?=$patient_data['ipd_number']?>')" class="btn btn-sm btn-success">Submit Charges</a>
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
	

