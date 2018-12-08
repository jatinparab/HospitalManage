
<?php
if (isset($this->session->userdata['logged_in'])) {
$loc = base_urL()."user_main";
header("location: ".$loc);
}
?>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login bg-black animated fadeInDown">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"><i class="ion-ios-cloud"></i></span> Panvel Login
                    <small>Please sign in to continue.</small>
                </div>
                <div class="icon">
                    <i class="ion-ios-locked"></i>
                </div>
            </div>
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
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign me in</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
        
        <!-- begin theme-panel -->
       
	</div>
	<!-- end page container -->

