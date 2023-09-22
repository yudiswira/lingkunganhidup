<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/dinas.png">
    <title>Sistem Informasi Monitoring Taman</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/material/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/material/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?=base_url()?>assets/material/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register">     
            <div class="login-box">
                <span><?php  if ($this->session->flashdata('message')){echo $this->session->flashdata('message');}?></span> 
            </div>
            <div class="login-box card">  
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="<?=site_url('Auth/ProsesLogin')?>">
                        <h3 class="box-title m-b-20"><b>Login<b></h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="Username" required="" placeholder="Username" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="Password" required="" placeholder="Password" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-xs-12">
                                <a href="<?=site_url("LandingPage");?>" class="text-info m-l-5"><i class="mdi mdi-keyboard-backspace"></i> Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/material/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url()?>assets/material/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/material/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url()?>assets/material/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets/material/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>assets/material/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?=base_url()?>assets/material/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?=base_url()?>assets/material/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets/material/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/material/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>