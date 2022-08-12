<!DOCTYPE html>
<html dir="ltr" lang="en" style="background:#eee;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <?php $logo = $this->db->select('*')->from('sistemsetting')->where(['NamaSetting' => 'LOGO_WEBSITE'])->get()->row(); ?>
    <link rel="icon" href="<?= ($logo ? base_url('assets/upload/' . $logo->Value) : base_url('fashe/images/icons/logo.png')) ?>" type="image/x-icon">
    <title>ADMIN || <?= NAMA_APLIKASI; ?></title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/extra-libs/multicheck/multicheck.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/mycss.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .sidebar-nav ul .sidebar-item .first-level .sidebar-item.active .sidebar-link {
            opacity: 1;
            /* background: #27a9e3; */
            font-weight: bolder;
        }

        /* 
    .sidebar-nav ul .sidebar-item.selected > .sidebar-link {
        background: #27a9e32b;
        opacity: 1;
    } */

        .text-bold {
            font-weight: bolder;
        }

        ul.collapse {
            background: #1c1b1bb0 !important;
        }

        select {
            min-height: 30px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="<?php //echo base_url(); 
                                            ?>assets/images/logo-icon.png" alt="homepage" class="light-logo" /> -->
                            <h4><?= $this->session->userdata('NamaLengkap'); ?> <br><small style="font-size:8px;"><?= NAMA_APLIKASI; ?></small></h4>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!-- <img style="max-width: 100%;scale: revert;object-fit: fill;margin-top: 3px;" src="<?php //echo base_url(); 
                                                                                                                    ?>assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        </span>
                        <!-- Logo icon -->

                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>

                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <!-- <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div> -->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
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
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <?php
                        $link = $this->uri->segment(1) . "/" . $this->uri->segment(2);
                        if ($this->uri->segment(2) === "index" || is_numeric($this->uri->segment(2))) {
                            $link = $this->uri->segment(1) . "/";
                        }
                        $uri[0] = in_array($link, array("home/"));

                        $uri[1] = in_array($link, array("setting/"));

                        $uri[2] = in_array($link, array("artikel/", "artikel/tambah", "artikel/edit"));

                        $uri[3] = in_array($link, array("pengumuman/", "pengumuman/tambah", "pengumuman/edit"));

                        $uri[4] = in_array($link, array("galeri/", "galeri/tambah", "galeri/edit", "galeri/video"));

                        $uri[5] = in_array($link, array("dokumen/", "dokumen/tambah"));

                        $uri[6] = in_array($link, array("agenda/", "agenda/tambah", "agenda/edit"));

                        $uri[7] = in_array($link, array("anggota/", "anggota/tambah", "anggota/edit", "anggota/bagan", "jabatan/", "jabatan/tambah", "jabatan/edit"));

                        $uri[8] = in_array($link, array("slider/", "slider/tambah"));

                        $uri[9] = in_array($link, array("visimisi/", "visimisi/tambah"));

                        $uri[10] = in_array($link, array("pesan/", "pesan/view"));

                        ?>
                        <li class="sidebar-item <?php echo $uri[0] ? "selected" : ""; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo $uri[0] ? "active" : ""; ?>" href="<?php echo base_url('home'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                        <li class="sidebar-item <?php echo $uri[2] || $uri[3] || $uri[4] || $uri[5] || $uri[6] || $uri[8] || $uri[9] ? "active" : ""; ?>"> <a class="sidebar-link has-arrow waves-effect waves-dark <?php echo $uri[2] || $uri[3] || $uri[4] || $uri[5] || $uri[6] || $uri[8] || $uri[9] ? "active" : ""; ?>" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cisco-webex"></i><span class="hide-menu">Postingan </span></a>
                            <ul aria-expanded="true" class="collapse first-level <?php echo $uri[2] || $uri[3] || $uri[4] || $uri[5] || $uri[6] || $uri[8] || $uri[9] ? "in" : ""; ?>">

                                <li class="sidebar-item <?php echo $uri[8] ? "selected" : ""; ?>"><a href="<?php echo base_url("slider"); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Slider Web </span></a></li>

                                <li class="sidebar-item <?php echo $uri[9] ? "selected" : ""; ?>"><a href="<?php echo base_url("visimisi"); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Visi & Misi </span></a></li>

                                <li class="sidebar-item <?php echo $uri[2] ? "selected" : ""; ?>"><a href="<?php echo base_url("artikel"); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Artikel </span></a></li>

                                <li class="sidebar-item <?php echo $uri[3] ? "selected" : ""; ?>"><a href="<?php echo base_url("pengumuman"); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Pengumuman </span></a></li>

                                <li class="sidebar-item <?php echo $uri[4] ? "selected" : ""; ?>"><a href="<?php echo base_url("galeri"); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Galeri </span></a></li>

                                <li class="sidebar-item <?php echo $uri[5] ? "selected" : ""; ?>"><a href="<?php echo base_url("dokumen"); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Dokumen </span></a></li>

                                <li class="sidebar-item <?php echo $uri[6] ? "selected" : ""; ?>"><a href="<?php echo base_url("agenda"); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Agenda </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php echo $uri[7] ? "selected" : ""; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo $uri[7] ? "active" : ""; ?>" href="<?php echo base_url('anggota'); ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Guru/Karyawan</span></a></li>

                        <li class="sidebar-item <?php echo $uri[10] ? "selected" : ""; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo $uri[10] ? "active" : ""; ?>" href="<?php echo base_url('pesan'); ?>" aria-expanded="false"><i class="mdi mdi-message"></i><span class="hide-menu">Pesan/Saran</span></a></li>

                        <li class="sidebar-item <?php echo $uri[1] ? "selected" : ""; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link <?php echo $uri[1] ? "active" : ""; ?>" href="<?php echo base_url('setting'); ?>" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Pengaturan</span></a></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?php echo isset($title) ? $title : " --- "; ?></h4>
                        <!-- <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <?php
            $success = $this->session->flashdata('success');
            $error = $this->session->flashdata('error');
            ?>
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <?php if (isset($success)) : ?>
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil</strong> <?php echo $success; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal</strong> <?php echo $error; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php echo $content; ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin akan keluar dari halaman admin ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?php echo base_url('user/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="<?php echo base_url(); ?>assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/magnific-popup/meg.init.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/number.js"></script>

    <script src="<?php echo base_url(); ?>assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        // Restricts input for the given textbox to the given inputFilter.
        function setInputFilter(textbox, inputFilter) {
            if (textbox.length > 0) {
                ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                    for (let inp = 0; inp < textbox.length; inp++) {
                        const tb = textbox[inp];
                        tb.addEventListener(event, function() {
                            if (inputFilter(this.value)) {
                                this.oldValue = this.value;
                                this.oldSelectionStart = this.selectionStart;
                                this.oldSelectionEnd = this.selectionEnd;
                            } else if (this.hasOwnProperty("oldValue")) {
                                this.value = this.oldValue;
                                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                            }
                        });
                    }
                });
            }
        }

        function previewImage(id, target) {
            document.getElementById(target).style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById(id).files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById(target).src = oFREvent.target.result;
                document.getElementById('preview-img').href = oFREvent.target.result;
            };
        };

        function AvoidSpace(event) {
            var k = event ? event.which : window.event.keyCode;
            if (k == 32) return false;
        }

        function hari_indo(param) {
            switch (param) {
                case 'sunday':
                    return 'minggu';
                case 'monday':
                    return 'senin';
                case 'tuesday':
                    return 'selasa';
                case 'wednesday':
                    return 'rabu';
                case 'thursday':
                    return 'kamis';
                case 'friday':
                    return 'jumat';
                case 'saturday':
                    return 'sabtu';
                default:
                    break;
            }
        }

        $(document).ready(function() {
            setInputFilter(document.getElementsByClassName("number-only"), function(value) {
                return /^\d*$/.test(value);
            }); //nilai positive saja

            setInputFilter(document.getElementsByClassName("positive-under-500"), function(value) {
                return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500);
            }); //nilai positive kurang dari 500 saja

            setInputFilter(document.getElementsByClassName("negative-positive"), function(value) {
                return /^-?\d*$/.test(value);
            }); //nilai positive dan negative

            setInputFilter(document.getElementsByClassName("with-decimal"), function(value) {
                return /^-?\d*[.,]?\d*$/.test(value);
            }); //nilai decimal

            setInputFilter(document.getElementsByClassName("with-decimal-2"), function(value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value);
            }); //nilai decimal curency 2 angka dibelakang koma

            setInputFilter(document.getElementsByClassName("a-z-only"), function(value) {
                return /^[a-z]*$/i.test(value);
            }); // a sampai z saja

            setInputFilter(document.getElementsByClassName("normal-input"), function(value) {
                return /^[a-z\u00c0-\u024f]*$/i.test(value);
            });

            setInputFilter(document.getElementsByClassName("hexa-only"), function(value) {
                return /^[0-9a-f]*$/i.test(value);
            }); // hexadecimal saja
        });
    </script>
</body>

</html>