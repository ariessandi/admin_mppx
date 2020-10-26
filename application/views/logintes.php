
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="csrf-token" content="9dusjrJPBB69Mo34Ena8T3ceSFwxr8EY2JkG3JCQ">
        <title>Mall Pelayanan Publik | Kota Bukittinggi</title>

        <link href="<?php echo base_url();?>/assets/mpp/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/assets/mpp/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/assets/mpp/css/responsive.css" rel="stylesheet" />

        <link href="<?php echo base_url();?>/assets/mpp/css/plugin/daterangepicker.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/assets/mpp/css/login-style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>/assets/mpp/css/login-theme.css" rel="stylesheet" />

        <link rel="shortcut icon" href="<?php echo base_url();?>/assets/mpp/images/favicon.png" type="image/x-icon" />
        <link rel="icon" href="<?php echo base_url();?>/assets/mpp/images/favicon.png" type="image/x-icon" />

        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
        <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    </head>

    <body style="background-color:#0093FF;">
        <div class="preloader"></div>
        <div class="form-body">
            <div class="website-logo">
                <a href="index.html">
                    <div class="logo">
                        <img class="logo-size" src="<?php echo base_url();?>/assets/mpp/images/logo-light.svg" alt="" />
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="img-holder">
                    <div class="bg"></div>
                    <div class="info-holder">
                        <img src="<?php echo base_url();?>/assets/mpp/images/graphic2.svg" alt="" />
                    </div>
                </div>
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <a href="http://localhost:8001">
                                <h3>
                                    Login MPP <br />
                                    Kota Bukittinggi
                                </h3>
                            </a>
                            <div class="page-links">
                                <a href="http://localhost:8001/login" class="active">Login</a>
                                <a href="http://localhost:8001/register">Register</a>
                            </div>
                            
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="messageError" style="display:none;">
                                <ul id="listError">
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <form action="#" method="post" autocomplete="off">
                                <input class="form-control" type="text" name="email" id="email" placeholder="E-mail Address" />
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                                <div class="form-button">
                                    <!--button id="btnSubmit" type="button" class="ibtn">Login</button--> 
									
									<input type=submit class="ibtn" name="btnlogin" value="LOGIN">
									
                                    <a href="http://localhost:8001/forgot">Forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url();?>/assets/mpp/js/jquery.js"></script>

        <script src="<?php echo base_url();?>/assets/mpp/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/jquery.fancybox.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/appear.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/nav-tool.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/mixitup.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/owl.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/wow.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/jquery-ui.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/jquery.validate.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/script.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/color-settings.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="<?php echo base_url();?>/assets/mpp/js/plugin/moment.min.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/plugin/daterangepicker.min.js"></script>

        <script src="<?php echo base_url();?>/assets/mpp/js/custom.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/url.js"></script>
        <script src="<?php echo base_url();?>/assets/mpp/js/login.js"></script>
    </body>
</html>