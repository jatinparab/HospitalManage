
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
    $ipd_entries = $this->ipd_management->get_ipd_details();
  // print_r($ipd_entries);
  //  $srno = $this->ipd_management->getlatestipd();
    
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
			<!-- begin page-header -->			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="pan el panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="pan el-heading">
                            
                            <h4 class="panel-title">Visiting Faculty Form</h4>
                        </div>
                        <div class="pan el-body">
                            <form action="<?=base_url()?>Ipd/visitingSubmit" method="post" class="form-horizontal col-sm-8 col-sm-offset-2">
                                
                            <div class="form-group">
									<label class="control-label col-md-3">IPD Number</label>
									<div class="col-md-9">
									    <select name="ipd_number" class="default-select2 form-control">
                                            
                                            <?php foreach($ipd_entries as $entry){ ?>
                                           <option value="<?=$entry['ipd_number']?>"><?=$entry['ipd_number']?></option>
                                            <?php } ?>
                                        </select>
									</div>
								</div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Doctor Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="doctor_name" class="form-control onlytext" placeholder="Dr. 	" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Charges Of Doctor</label>
                                    <div class="col-md-9">
                                        <div class="col-sm-5">
                                        <input  type="number" name="amount" class="form-control" placeholder="Amount" />

                                        </div>
                                        
                                        <div class="col-sm-1 text-center" style="font-size:16px;margin-top:4px"> X </div>
                                        
                                        <div class="col-sm-5">
                                        <input type="number" name="days" class="form-control col-sm-6" placeholder="Days" />

                                        </div>

                                    </div>
                                </div>
                                
                            
                                
                               
                                
                                
                                
                                
                                
                                
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Submit</label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-sm btn-success">Submit Button</button>
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
	

