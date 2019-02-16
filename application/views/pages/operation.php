
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
    $ipd_number = $this->ipd_management->getlatestipdnumber();
   
    $srno = $this->ipd_management->getlatestipd();
    if(isset($_GET['ipd_number'])){
        $ipd = $_GET['ipd_number'];
        $data = $this->ipd_management->get_ipd_details_from_id($ipd);
        //print_r($data);

    }
    
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
			    <div class="col-md-12 col-sm-offset-0">
			        <!-- begin panel -->
                    <div class="pan el panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="pan el-heading">
                           
                            <h4 class="panel-title">OT Form</h4>
                        </div>
                        <div class="pan el-body">
                            <form action="<?=base_url()?>Ot/formSubmit" onsubmit="return ipdformsubmit();" method="post" class="form-horizontal" >
                                <div class="form-group">
                                    <label class="col-md-1 col-md-offset-2 control-label">Sr No.</label>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" value="<?php if(isset($data)){ echo $data['id']; } ?>" readonly="readonly" />
                                    </div>
                                    <label class="col-md-2 col-md-offset-1 control-label">IPD Number</label>
                                    <div class="col-md-2">
                                        <input type="text" id="ipd_number" name="ipd_number" value="<?php if(isset($data)){ echo $data['ipd_number']; } ?> " class="form-control" placeholder="KOJF34" readonly="readonly"  />
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient Name</label>
                                    <div class="col-md-2">
                                        <input type="text" oninput="this.value = this.value.toUpperCase()"  id="name" name="name" value="<?php if(isset($data)){ echo $data['patient_name']; }?>" class="form-control onlytext"  readonly="readonly"  placeholder="Patient Name" />
                                    </div>
                                    <label class="col-md-2 control-label">Mobile Number</label>
                                    <div class="col-md-2">
                                        <input type="text" pattern="\d*" minlength="10" maxlength="10" value="<?php if(isset($data)){ echo $data['contact_number']; }?>" id="contact_number" name="number" class="form-control onlynumber"  readonly="readonly"  placeholder="Mobile Number" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Operation Details<span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-6">
                                        <input style="height:40px;" id="details"  class="form-control" name="type" placeholder="Operation Name, Type">
                                    </div>
                                </div>
                                <div class="form-group">
                                  
                                   
                                    <label class="col-md-3 control-label">Date <span style="color:red;font-size:15px;">*</span></label>
                                    <div class="col-md-2">
                                        <input  name="date" type="date" max="<?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" class="form-control" placeholder="dd/mm/yyyy" />
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-md-5 control-label"></label>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-sm btn-success">Submit Form</button>
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
	

