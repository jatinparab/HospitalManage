
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
    
    $ipd=$this->ipd_management->get_ipd_details();
    
    
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
                            
                            <h4 class="panel-title">Fill Operation Form</h4>
                        </div>
                        <div class="pane l-body">
                        <div class="row" style="padding-top:30px;padding-bottom:30px;">
                        <div class="col-sm-3 text-center">
                        <label for=""><h4>Search By</h4> </label>
                        </div>
                        <div class="col-sm-3">
                        <select class="form-control" onchange="selectchange()" name="" id="query-select">
                            <option value="-1">Select</option>
                            <option value="patient_name">Name</option>
                            <option value="ipd_number">IPD Number</option>
                            <option value="contact_number">Mobile Number</option>
                        </select>
                        </div>  
                        <div class="col-sm-3">

                        <input id="searchbox" placeholder="Search" class="form-control col-sm-6">

                        </div>
                        <div class="col-sm-3">
                            <button onclick="searchby()" class="btn btn-danger">Search</button>
                        </div>
                        

                        
                        </div>


                            <table id="visittable"  class="table table-striped table-bordered">
                                <thead>
                               
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>IPD Number</th>
                                        <th>Patient Name</th>
                                        <th>Contact Number</th>
                                        <th>Operation Form</th>
                                        
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($ipd as $entry){ ?>
                                    <tr>
                                    <?php foreach($entry as $field => $value){
                                       // print_r($entry);
                                        if($field=='id' || $field=='ipd_number' || $field == 'patient_name' || $field == 'contact_number' ){

                                        
                                        ?>
                                        <td><?=$value?></td>
                                    <?php }if($field=='receipt_number'){
                                    //$total = $this->opd_management->gettotal($value);
                                   // print_r($total);
                                    }
                                    ?> 
                                    
                                    <?php
                                
                                } ?>
                                    
                                    <td><a href="<?=base_url()?>operation?ipd_number=<?=$entry['ipd_number']?>" class="btn btn-info" >Fill</a></td>
                                    </tr>
                                <?php }?>

                                
                                </tbody>
                            </table>
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
	

