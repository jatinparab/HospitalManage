

<?php $this->load->view('templates/head2') ?>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div style="margin-top:-170px;background-color:rgba(0,0,0,0.85);width:503px;margin-left:400px;" class="login animated fadeInDown">
           <h2 class="text-center text-white"><strong>Sukham Hospital</strong> <br> Karanjade Login</h2>
            <!-- end brand -->
            <div class="login-content">
                <form action="<?php echo base_url() ?>Auth/validate" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="text" name="username" class="form-control input-lg inverse-mode no-border" placeholder="Email Address" required />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" class="form-control input-lg inverse-mode no-border" placeholder="Password" required />
                    </div>
                    <?php if(isset($error)){ ?>

                    
                    <div class="alert alert-danger fade in m-b-15">
								<strong>Error!</strong>
								<?=$error?>
								<span class="close" data-dismiss="alert">&times;</span>
                            </div>
                            <?php } ?>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" /> Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-warning btn-block btn-lg">Sign me in</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
        
        <!-- begin theme-panel -->
       
	</div>
	<!-- end page container -->

