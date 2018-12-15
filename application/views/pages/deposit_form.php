
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
		
		<!-- end #header -->
        

		
		<!-- begin #sidebar -->
        <?php  $this->load->view('templates/head') ?>
		<!-- begin #sidebar -->
		<?php  $this->load->view('templates/sidebar') ?>
       
		
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
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            
                            <h4 class="panel-title">Deposit Form</h4>
                        </div>
                        <div class="panel-body">
                            <form  action="<?=base_url()?>Ipd/ipdAddDepo" onsubmit="return deposubmit()" method="post" class="form-horizontal col-sm-8 col-sm-offset-2">
                                <input class="hidden" value="<?=$patient_data['ipd_number'];?>" name="ipd_number">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">IPD Number</label>
                                    <div class="col-md-9">
                                        <input name="receipt_number" type="text" class="form-control" value="<?=$patient_data['ipd_number'];?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient Name</label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" value="<?=$patient_data['patient_name'];?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Date of Admission </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" value="<?=$patient_data['date_of_addmission'];?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ward  </label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" value="<?=$patient_data['ward'];?>" disabled />
                                    </div>
                                </div>
                                
                                <br>
                                <h4 class="text-center">Deposit </h4>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deposit Amount (In Numbers) <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-6">
                                        <input id="amount" name="amount" type="number" class="form-control" />
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deposit Amount (In Words) <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-6">
                                        <input id="amount2" type="text" class="form-control onlytext" />
                                    </div>
                                </div>   


                            
                                </div>
                               
                               
                                
                                
                                
                                <div  class="form-group text-center">
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success">Add Deposit</button>
                                    </div>
                                </div>
                                <br><br>
                               
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
	

