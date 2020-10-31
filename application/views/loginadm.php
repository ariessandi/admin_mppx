

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
		
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?php echo base_url();?>/assets/mpro/material_files/login-register.jpg) no-repeat center center; background-size: cover;">
    <div class="auth-box p-4 bg-white rounded">
        <div id="loginform">
            <div class="logo">
                <h3 class="box-title mb-3">Sign In</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
				
                    <form class="form-horizontal mt-3 form-material" id="loginform" action="#" method="post" autocomplete="off">
                        <div class="form-group mb-3">
                            <div class="">
                                <input class="form-control" name="email" id="email" type="text" required="" placeholder="Username"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="">
                                <input class="form-control" name="password" id="password" type="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <div class="checkbox checkbox-info pt-0 d-flex align-items-center">
                                    <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-indigo">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div> 
                                <div class="ml-auto">
                                    <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center mt-4">
                            <div class="col-xs-12">
							<input type="hidden"  name="btnlogin" value="LOGIN">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                <div class="social mb-3">
                                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
                                    <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-4">
                            <div class="col-sm-12 justify-content-center d-flex">
                                <p>Don't have an account? <a href="authentication-register1.html" class="text-info font-weight-normal ml-1">Sign Up</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="recoverform">
            <div class="logo">
                <h3 class="font-weight-medium mb-3">Recover Password</h3>
                <span class="text-muted">Enter your Email and instructions will be sent to you!</span>
            </div>
            <div class="row mt-3 form-material">
                <!-- Form -->
                <form class="col-12" action="index.html">
                    <!-- email -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="email" required="" placeholder="Username">
                        </div>
                    </div>
                    <!-- pwd -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-primary text-uppercase" type="submit" name="action">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>/assets/mpro/material_files/jquery.min.js.download"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>/assets/mpro/material_files/popper.min.js.download"></script>
    <script src="<?php echo base_url();?>/assets/mpro/material_files/bootstrap.min.js.download"></script>
    <!-- apps -->
    <script src="<?php echo base_url();?>/assets/mpro/material_files/app.min.js.download"></script>
    <script src="<?php echo base_url();?>/assets/mpro/material_files/app.init.js.download"></script>
    <script src="<?php echo base_url();?>/assets/mpro/material_files/app-style-switcher.js.download"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>/assets/mpro/material_files/perfect-scrollbar.jquery.min.js.download"></script>
    <script src="<?php echo base_url();?>/assets/mpro/material_files/sparkline.js.download"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>/assets/mpro/material_files/waves.js.download"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>/assets/mpro/material_files/sidebarmenu.js.download"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>/assets/mpro/material_files/custom.min.js.download"></script>
    <!--This page plugins -->
    <script src="<?php echo base_url();?>/assets/mpro/material_files/jquery.dataTables.min.js.download"></script>
    <script src="<?php echo base_url();?>/assets/mpro/material_files/custom-datatable.js.download"></script>
    <script src="<?php echo base_url();?>/assets/mpro/material_files/datatable-basic.init.js.download"></script>

