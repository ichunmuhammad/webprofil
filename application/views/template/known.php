<!DOCTYPE html>
<html lang="en">

<head>

     <title><?php echo isset($namaweb) ? $namaweb->Value : "web profil sekolah"; ?></title>
     <!-- 

Known Template 

https://templatemo.com/tm-516-known

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?= base_url('known/'); ?>css/bootstrap.min.css">
     <link rel="stylesheet" href="<?= base_url('known/'); ?>css/font-awesome.min.css">
     <link rel="stylesheet" href="<?= base_url('known/'); ?>css/owl.carousel.css">
     <link rel="stylesheet" href="<?php base_url('known/'); ?>css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?= base_url('known/'); ?>css/templatemo-style.css">
     <link rel="stylesheet" href="<?= base_url('known/'); ?>css/mycss.css">

     <script src="<?= base_url('known/'); ?>js/jquery.js"></script>
     <link rel="icon" href="<?= ($logo ? base_url('assets/upload/' . $logo->Value) : base_url('fashe/images/icons/logo.png')) ?>" type="image/x-icon">
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="<?= base_url(); ?>" class="navbar-brand">
                         <img src="<?php
                                   if ($logo) {
                                        echo base_url('assets/upload/' . $logo->Value);
                                   } else {
                                        echo base_url('fashe/images/icons/logo.png');
                                   } ?>" class="logo-navbar">
                         <span style="font-size:14px;"><?php echo isset($namaweb) ? $namaweb->Value : "web profil sekolah"; ?></span>
                    </a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first navbar-right">
                         <?php
                         $link = $this->uri->segment(1) . "/" . $this->uri->segment(2);
                         if ($this->uri->segment(2) === "index" || is_numeric($this->uri->segment(2))) {
                              $link = $this->uri->segment(1) . "/";
                         }
                         $uri[0] = in_array($link, ["/", "umum/"]);
                         $uri[1] = in_array($link, ["profil/", "umum/profil"]);
                         $uri[2] = in_array($link, ['page/artikel']);
                         $uri[3] = in_array($link, ['page/agenda']);
                         $uri[4] = in_array($link, ['page/pengumuman']);
                         $uri[5] = in_array($link, ['page/foto']);
                         $uri[6] = in_array($link, ['page/video']);
                         $uri[7] = in_array($link, ['page/kurikulum']);
                         $uri[8] = in_array($link, ['page/guru']);
                         $uri[9] = in_array($link, ['kontak/']);
                         ?>
                         <li class="<?php echo $uri[0] ? "active" : ""; ?>">
                              <a href="<?= base_url(); ?>" class="smoothScroll">Beranda</a>
                         </li>
                         <li class="<?php echo $uri[1] ? "active" : ""; ?>">
                              <a href="<?= base_url('/profil'); ?>" class="smoothScroll">Tentang Kami</a>
                         </li>
                         <li class="<?php echo $uri[2] ? "active" : ""; ?>">
                              <a href="<?= base_url('page/artikel'); ?>" class="smoothScroll">Artikel</a>
                         </li>
                         <li class="dropdown <?php echo $uri[3] || $uri[4] ? "active" : ""; ?>">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pemberitahuan</span> <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li class="<?php echo $uri[3] ? "active" : ""; ?>"><a href="<?= base_url('page/agenda'); ?>">Agenda</a></li>
                                   <li class="<?php echo $uri[4] ? "active" : ""; ?>"><a href="<?= base_url('page/pengumuman'); ?>">Pengumuman</a></li>
                              </ul>
                         </li>
                         <li class="dropdown <?php echo $uri[5] || $uri[6] ? "active" : ""; ?>">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Galeri</span> <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                   <li class="<?php echo $uri[5] ? "active" : ""; ?>"><a href="<?= base_url('page/foto'); ?>">Foto</a></li>
                                   <li class="<?php echo $uri[6] ? "active" : ""; ?>"><a href="<?= base_url('page/video'); ?>">Video</a></li>
                              </ul>
                         </li>
                         <li class="<?php echo $uri[7] ? "active" : ""; ?>">
                              <a href="<?= base_url('page/kurikulum'); ?>" class="smoothScroll">Kurikulum</a>
                         </li>
                         <li class="<?php echo $uri[8] ? "active" : ""; ?>">
                              <a href="<?= base_url('page/guru'); ?>" class="smoothScroll">Guru</a>
                         </li>
                         <li class="<?php echo $uri[9] ? "active" : ""; ?>">
                              <a href="<?= base_url('kontak'); ?>" class="smoothScroll">Kontak</a>
                         </li>
                    </ul>

                    <!-- <ul class="nav navbar-nav navbar-right">
                         <li><a href="#"><i class="fa fa-phone"></i> +65 2244 1100</a></li>
                    </ul> -->
               </div>

          </div>
     </section>

     <?php echo $content; ?>


     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Lokasi Kami</h2>
                              </div>
                              <address style="color:#ffffff;">
                                   <?php echo $lokasi_kami->Value; ?>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="<?php echo $fb_link->Value; ?>" class="fa fa-facebook"></a></li>
                                   <li><a href="<?php echo $wa_link->Value; ?>" class="fa fa-whatsapp"></a></li>
                                   <li><a href="<?php echo $ig_link->Value; ?>" class="fa fa-instagram"></a></li>
                                   <li><a href="<?php echo $tg_link->Value; ?>" class="fa fa-telegram"></a></li>
                              </ul>

                              <div class="copyright-text">
                                   <p>Copyright &copy; 2019 || <a href="<?= $url_dev->Value; ?>"><?= $nama_dev->Value; ?></a></p>

                                   <p>Design: TemplateMo</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Informasi Kontak</h2>
                              </div>
                              <address style="color:#ffffff;">
                                   <?php echo $kontak_kami->Value; ?>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="<?= base_url('page/artikel'); ?>">Artike</a></li>
                                        <li><a href="<?= base_url('page/pengumuman'); ?>">Pengumuman</a></li>
                                        <li><a href="<?= base_url('page/agenda'); ?>">Agenda</a></li>
                                        <li><a href="<?= base_url('page/foto'); ?>">Galeri</a></li>
                                        <li><a href="<?= base_url('profil'); ?>">Profil</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <!-- <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="#" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required="">
                                             <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div> -->

               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="<?= base_url('known/'); ?>js/bootstrap.min.js"></script>
     <script src="<?= base_url('known/'); ?>js/owl.carousel.min.js"></script>
     <script src="<?= base_url('known/'); ?>js/smoothscroll.js"></script>
     <script src="<?= base_url('known/'); ?>js/custom.js"></script>

</body>

</html>