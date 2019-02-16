
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
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="pa nel panel-inverse">
                        <div class="pan el-heading">
                            
                            <h4 class="panel-title">IPD Patient Reports</h4>
                        </div>
                        <div class="pane l-body">
                        <div class="row" style="padding-top:30px;padding-bottom:30px;">
                        <div class="col-sm-1 text-center">
                        <label for=""><h4>Status</h4> </label>
                        </div>
                        <div class="col-sm-2">
                        <select class="form-control" onchange="selectchange()" name="" id="type">
                            <option value="-1">Select</option>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="all">All</option>
                        </select>
                        </div>  
                        
<div class="col-sm-1"><label for="">Start Date</label></div>
<div class="col-md-2">
                                        <input  id="start" type="date" max="<?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" class="form-control" placeholder="dd/mm/yyyy" />
                                    </div>
                                    <div class="col-sm-1"><label for="">End Date</label></div>
<div class="col-md-2">
                                        <input  id="end" type="date" max="<?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d') ?>" class="form-control" placeholder="dd/mm/yyyy" />
                                    </div>
                        
                        <div class="col-sm-3">
                            <button onclick="search_ipd()" class="btn btn-danger">Search</button>
                        </div>
                        

                        
                        </div>
<div id="ipdreports" >

                            
                            
                                </div>
    
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
            
		</div>
       
			        <!-- begin panel -->
                    
                    <!-- end panel -->
                

        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>

	<!-- end page container -->
	

