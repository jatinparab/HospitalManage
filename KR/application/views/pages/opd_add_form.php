
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
print_r($patient_data);
?>

	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"><i class="ion-ios-cloud"></i></span> <b>Sukham</b> Hospital</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<button type="button" class="navbar-toggle p-0 m-r-5" data-toggle="collapse" data-target="#top-navbar">
					    <span class="fa-stack fa-lg text-inverse">
                            <i class="fa fa-square-o fa-stack-2x m-t-2"></i>
                            <i class="ion-ios-gear fa-stack-1x"></i>
                        </span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse pull-left" id="top-navbar">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-lg">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-ios-browsers f-s-20 pull-left m-r-5"></i> Billing System <b class="caret"></b></a>
                            <div class="dropdown-menu dropdown-menu-lg">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4 class="dropdown-header">UI Kits</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> FontAwesome</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Ionicons</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Simple Line Icons</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Typography</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Media Object</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Widget Boxes</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Tabs & Accordions</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Unlimited Nav Tabs</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Modal & Notification</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Buttons</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4 class="dropdown-header">Page Options <span class="label label-inverse">11</span></h4>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Blank Page</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Footer <span class="badge badge-success">NEW</span></a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page without Sidebar</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Right Sidebar</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Minified Sidebar</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Two Sidebar</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Line Icons</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Full Height Content</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Mega Menu</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Light Sidebar</a></li>
                                                    <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i> Page with Large Sidebar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4 class="dropdown-header">Paragraph</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis libero purus, fermentum at libero convallis, auctor dignissim mauris. Nunc laoreet pellentesque turpis sodales ornare. Nunc vestibulum nunc lorem, at sodales velit malesuada congue. Nam est tortor, tincidunt sit amet eros vitae, aliquam finibus mauris.
                                        </p>
                                        <p>
                                            Fusce ac ligula laoreet ante dapibus mattis. Nam auctor vulputate aliquam. Suspendisse efficitur, felis sed elementum eleifend, ipsum tellus sodales nisi, ut condimentum nisi sem in nibh. Phasellus suscipit vulputate purus at venenatis. Quisque luctus tincidunt tempor.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>opd_form">
                                <i class="ion-ios-people m-r-5 f-s-20 pull-left"></i> OPD
                            </a>
						</li>
						<li>
                            <a href="<?php echo base_url() ?>ipd_form">
                                <i class="ion-ios-people m-r-5 f-s-20 pull-left"></i> IPD
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ion-ios-compose f-s-20 pull-left m-r-5"></i> New <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
				<!-- end navbar-collapse -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					
					
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<img src="assets/img/user-13.jpg" alt="" /> 
							</span>
							<span class="hidden-xs"><?=$name?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url() ?>logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
        
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							<?=$name?>
							<small><?=$username?></small>
						</div>
					</li>
                    
					<li>
						<a href="<?php echo base_url() ?>opd_details">
						    <i class="ion-ios-pulse-strong"></i> 
						    <span>OPD</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>ipd_details">
						    <i class="ion-ios-pulse-strong"></i> 
						    <span>IPD</span>
						</a>
					</li>
                    <li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="ion-ios-list"></i> 
						    <span>Steps</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
						            <b class="caret pull-right"></b>
						            Step 1
						        </a>
								<ul class="sub-menu">
									<li class="has-sub">
										<a href="javascript:;">
										    <b class="caret pull-right"></b>
										    Step 2
										</a>
										<ul class="sub-menu">
											<li><a href="javascript:;">Menu 3.1</a></li>
											<li><a href="javascript:;">Menu 3.2</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Menu 2.2</a></li>
									<li><a href="javascript:;">Menu 2.3</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Menu 1.2</a></li>
							<li><a href="javascript:;">Menu 1.3</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
	
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
        <div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Form Stuff</a></li>
				<li class="active">Form Elements</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Form Elements <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-6 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">OPD Form</h4>
                        </div>
                        <div class="panel-body">
                            <form  action="<?=base_url()?>Opd/opdAdd" method="post" class="form-horizontal col-sm-8 col-sm-offset-2">
                                <input class="hidden" value="SUKPL<?=$patient_data['id']?>" name="receipt_number">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Receipt Number</label>
                                    <div class="col-md-9">
                                        <input name="receipt_number" type="text" class="form-control" value="SUKPL<?=$patient_data['id'];?>" disabled />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Patient Name</label>
                                    <div class="col-md-9">
                                        <input  type="text" class="form-control" value="<?=$patient_data['patient_name'];?>" disabled />
                                    </div>
                                </div>
                                <br>
                                <h4 class="text-center">Charges </h4>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                        <div class="table-responsive">
                                    <table class="table table-default">
                                        <thead>
                                            <tr>
                                                <th>Add</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th style="width:30px;">Number</th>
                                                <th>Total Amount </th>
                                                <th style="width:30px;">Already Added<small> </small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input name="opd" type="checkbox" class="check" id="opd">
                                                </td>
                                                <td>
                                                    OPD Charge
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="calculate(this)" id="opd_amount" name="opd_amount" disabled/>

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="opd_number" name="opd_number" value="1" disabled/>

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="opd_total" name="opd_total" disabled />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="opd_added" name="opd_added" disabled />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="rbs" type="checkbox" class="check" id="rbs">
                                                </td>
                                                <td>
                                                    RBS
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="calculate(this)" id="rbs_amount" name="rbs_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="rbs_number" name="rbs_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="rbs_total"  name="rbs_total" disabled />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="rbs_added"  name="rbs_added" disabled />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="ecg" type="checkbox" class="check" id="ecg">
                                                </td>
                                                <td>
                                                    ECG
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="ecg_amount"  oninput="calculate(this)" name="ecg_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="ecg_number"  oninput="ncalculate(this)" name="ecg_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="ecg_total" name="ecg_total" disabled />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="ecg_added" name="ecg_added" disabled />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="xray" type="checkbox" class="check" id="xray">
                                                </td>
                                                <td>
                                                    X-RAY
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" oninput="calculate(this)" id="xray_amount" name="xray_amount" disabled />

                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" oninput="ncalculate(this)" id="xray_number" name="xray_number" value="1" disabled />

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="xray_total" name="xray_total" disabled />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="xray_added" name="xray_added" disabled />
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>                                    
                            </div>
                                </div>
                               
                               
                                
                                
                                
                                <div  class="form-group text-center">
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-success">Submit Charges</button>
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
	

