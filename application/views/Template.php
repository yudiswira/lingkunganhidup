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
    <title>Dinas Lingkungan Hidup Kota Pekanbaru</title>
    <!-- Bootstrap Core CSS -->
    <!-- <link href="<?=base_url()?>assets/material/font/webfont.css" rel="stylesheet"> -->
    <link href="<?=base_url()?>assets/material/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?=base_url()?>assets/material/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/material/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/material/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?=base_url()?>assets/material/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet"> -->
    <!--This page css - Morris CSS -->
    <link href="<?=base_url()?>assets/material/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/material/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?=base_url()?>assets/material/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?=base_url()?>assets/material/plugins/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" >
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header fix-sidebar card-no-border logo-center">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <b>
                            <img src="<?=base_url()?>assets/img/dinas.png" width="70" height="50" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                            <b style="color: white;">Sistem Informasi Monitoring Ruang Terbuka Hijau</b>
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img src="<?=base_url()?>assets/material/images/users/1.jpg" alt="user" class="profile-pic" /> -->
                                <img src="<?=base_url()?>assets/img/account.png" alt="user" class="profile-pic" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <!-- <img src="<?=base_url()?>assets/material/images/users/1.jpg" alt="user"> -->
                                                <img src="<?=base_url()?>assets/img/account.png" alt="user">
                                            </div>
                                            <div class="u-text">
                                                <h4><?=$this->session->userdata('namaLengkap');?></h4>
                                            </div>
                                        </div>
                                    </li>
<!--                                     <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> <b>Pengaturan Akun</b></a></li> -->
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?=site_url('Dashboard/Logout');?>"><i class="fa fa-power-off"></i> <b>Logout</b></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?=site_url('Dashboard')?>"><b>Dashboard</b></a></li>
                            </ul>
                        </li>
                        <?php foreach($_getMenu1 as $x) : 
                            if($x->flag == 1){
                        ?>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="<?=$x->menuIcon;?>"></i><span class="hide-menu"><?=$x->menuName?></span></a>
                            <ul aria-expanded="false" class="collapse">
                            <?php foreach($_getMenu2 as $y) : 
                                if($y->flag == 1 && $y->menuHeader == $x->menuID){
                            ?>
                                <li><a href="<?=site_url();?><?=$y->menuLink;?>"><b><i class="<?=$y->menuIcon;?>"></i> <?=$y->menuName;?></b></a></li>
                            <?php
                                } 
                            endforeach; ?>
                            </ul>
                        </li>
                        <?php 
                            }
                        endforeach; ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== --><!-- ============================================================== -->
		<!-- Page wrapper  -->
		<!-- ============================================================== -->
		<div class="page-wrapper">
		    <!-- ============================================================== -->
		    <!-- Container fluid  -->
		    <!-- ============================================================== -->
		    <div class="container-fluid">
		        <!-- ============================================================== -->
		        <!-- Bread crumb and right sidebar toggle -->
		        <!-- ============================================================== -->
		        <!-- <div class="row page-titles">
		            <div class="col-md-12 col-12 align-self-center">
		                <h3 class="text-themecolor">Dashboard</h3>
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		                    <li class="breadcrumb-item active">Dashboard</li>
		                </ol>
		            </div>
		        </div> -->
                <br>
		        <!-- ============================================================== -->
		        <!-- End Bread crumb and right sidebar toggle -->
		        <!-- ============================================================== -->
				<?=$_content;?>
		    </div>
		    <!-- ============================================================== -->
		    <!-- End Container fluid  -->
		    <!-- ============================================================== -->
		    <!-- ============================================================== -->
		    <!-- footer -->
		    <!-- ============================================================== -->
		    <footer style="position: fixed;z-index: 100" class="footer">&copy; 2021 Dinas Lingkungan Hidup dan Kebersihan Kota, Jl. Datuk Setia Maharaja No. 4 Telp (0761) 31516 Fax (0761) 31512 Pekanbaru - user : <?=$this->session->userdata('namaLengkap');?></footer>
		    <!-- ============================================================== -->
		    <!-- End footer -->
		    <!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Page wrapper  -->
		<!-- ============================================================== -->
    </div>
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
    <script src="<?=base_url()?>assets/material/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets/material/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?=base_url()?>assets/material/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="<?=base_url()?>assets/material/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <!-- <script src="<?=base_url()?>assets/material/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script> -->
    <!--c3 JavaScript -->
    <script src="<?=base_url()?>assets/material/plugins/d3/d3.min.js"></script>
    <script src="<?=base_url()?>assets/material/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <!-- <script src="<?=base_url()?>assets/material/js/dashboard1.js"></script> -->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>assets/material/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- <script src="<?=base_url()?>assets/material/plugins/datatables/jquery.dataTables.min.js"></script> -->
    <!-- jQuery file upload -->
    <script src="<?=base_url()?>assets/material/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            $(".select2").select2();
        // Basic
            $('.dropify').dropify();
        });
    </script>
</body>
</html>