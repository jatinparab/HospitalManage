
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
    
    $ipd=$this->ot_management->get_ot_paid();
    print_r($ipd);
    
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
                        <div class="pane l-heading">
                            
                            <h4 class="panel-title">Patient Details</h4>
                        </div>
                        <div class="pa nel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                               
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>IPD Number</th>
                                        <th>Patient Name</th>
                                        <th>Contact Number</th>
                                        <th>Date Of Operation</th>
                                     
                                        <th>Bill Amount</th>
                                        
                                        
                                        
                                        <th class="noExport">View Bill</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($ipd as $entry){ ?>
                                    <tr>
                                    <?php foreach($entry as $field => $value){
                                       // print_r($entry);
                                        if($field=='id' || $field=='ipd_number' || $field == 'name' || $field == 'number' || $field == 'date'   ){

                                        
                                        ?>
                                        <td><?=$value?></td>
                                    <?php }if($field=='ipd_number'){
                                    $total = $this->ot_management->gettotal($value);
                                   // print_r($total);
                                    }
                                    ?> 
                                    
                                    <?php
                                
                                } ?>
                                    <td>Rs. <?=$total['amount']?></td>
                                    <td><a href="<?=base_url()?>ot/billing/<?=$entry['ipd_number']?>" class="btn btn-info"  >View Bill</a></td>
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
	

