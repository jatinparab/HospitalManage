
<?php
	//$this -> load -> session();
	//session_start();
//print_r($this->session->userdata['logged_in']);
// phpinfo(); 
if (isset($this->session->userdata['logged_in'])) {
	$name = ($this->session->userdata['logged_in']['name']);
	$username = ($this->session->userdata['logged_in']['username']);
	} else {
	header("location: login");
    }
    
    $ipd=$this->ipd_management->get_ipd_details();
    //print_r($ipd);

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
                    <div class="pan el panel-inverse">
                        <div class="pan el-heading">
                            
                            <h4 class="panel-title">IPD - Patients</h4>
                        </div>
                        <div class="pane l-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th>Sr Number</th>
                                        <th>IPD Number</th>
                                        <th>Patient Name</th>
                                        <th>Contact Number</th>
                                        

                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Date of admission</th>
                                        <th>Date of discharge</th>
                                        <th>Prefered Doctor</th>
                                        <th>Ward</th>
                                        <th class="noExport">Manange</th>

                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                
                                foreach($ipd as $entry){ ?>
                                    <tr>
                                    <?php foreach($entry as $field => $value){
                                       if($field == 'done'){
                                           continue;
                                       }
                                        if($field != 'address'){
                                        ?>
                                        <td><?=$value?></td>
                                    <?php } } ?>
                                    <?php  ?>
                                    <td><a href="<?=base_url()?>ipd/edit/<?=$entry['ipd_number']?>" class="btn btn-info" >Manage</a><br></td>
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
	
