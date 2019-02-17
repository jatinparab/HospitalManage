
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
    
    $opd=$this->opd_management->get_opd_details();
    
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
                            
                            <h4 class="panel-title">OPD - Patients</h4>
                        </div>
                        <div class="pa nel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                               
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Receipt Number</th>
                                        <th>Patient Name</th>
                                        <th>Contact Number</th>
                                        <th> Address</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Diagnosis</th>
                                        <th>Checked By</th>
                                        <th>Remarks</th>
                                        <th class="noExport">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($opd as $entry){ ?>
                                    <tr>
                                    <?php foreach($entry as $field => $value){
                                        if($field == 'done' || $field == 'date'){
                                            continue;
                                        }
                                        ?>
                                        <td><?=$value?></td>
                                    <?php } ?>
                                    <?php  ?>
                                    <td><a href="<?=base_url()?>opd/edit/<?=$entry['id']?>" class="btn btn-info" style="font-size:13px;color:#fff000000 !important;" >Manage</a></td>
                                    </tr>
                                <? }?>
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
	

