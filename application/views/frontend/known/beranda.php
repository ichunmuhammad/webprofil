<link href="<?php echo base_url('known/lightbox/'); ?>css/lightbox.css" rel="stylesheet">
<!-- SLIDER -->
<section id="home">
    <div class="row">
        <div class="owl-carousel owl-theme home-slider">
            <?php if($banner_awal): ?>
            <div class="item" style="background-image: url(<?= base_url('assets/upload/'.$banner_awal->Value); ?>);">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1><?php echo isset($banner_awal_title->Value) ? $banner_awal_title->Value : ""; ?></h1>
                            <h3><?php echo isset($banner_awal_subtitle->Value) ? $banner_awal_subtitle->Value : ""; ?></h3>
                            <a href="<?= base_url('profil'); ?>" class="section-btn btn btn-default smoothScroll">Tentang Kami</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php endif; 
            if($dataslider): $i = 1;
                foreach($dataslider as $slider): ?>

                <div class="item" style="background-image: url(<?= base_url('assets/upload/'.$slider->IsiPos); ?>);">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <!-- <h1>Start your journey with our practical courses</h1> -->
                                <h1><?= word_limiter($slider->Judul, 20); ?></h1>
                                <!-- <a href="#courses" class="section-btn btn btn-default smoothScroll">Take a course</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- TENTANG KAMI -->
<section id="feature" class="bgwhite">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="courses-thumb">
                    <div class="courses-top">
                        <div class="courses-image">
                            <img src="<?= base_url('assets/upload/'.$banner_profil->Value); ?>" class="img-responsive" alt="" style="width:100%;height: 250px;object-fit: cover;">
                        </div>
                        <div class="courses-date" style="background:#0000006e; color:#ffffff;">
                            <h5><?php echo isset($banner_profil_title->Value) ? $banner_profil_title->Value : ""; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="feature">
                    <h2>Tentang Kami</h2>
                    <?php echo ($profilkami) ? word_limiter($profilkami->Value, 60) : ""; ?>
                </div>
                <div class="text-white">
                    <ul class="social-icon">
                            <li><a href="<?php echo $fb_link->Value; ?>" class="fa fa-facebook"></a></li>
                            <li><a href="<?php echo $wa_link->Value; ?>" class="fa fa-whatsapp"></a></li>
                            <li><a href="<?php echo $ig_link->Value; ?>" class="fa fa-instagram"></a></li>
                    </ul>       
                </div>
                <a href="<?= base_url('profil'); ?>" style="margin-top:20px;">
                    Lanjutkan membaca
                    <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php if($tampilkan_visimisi->Value === '1'): ?>

<section id="about" class="bggreen">
    <div class="container">
        <h2 style="color:#fff;">Visi dan Misi Kami</h2>
        <div class="row">
            
            <?php if($datavisi): ?>
            
                <div class="col-sm-6">
                    <div class="about-info card card-body">
                        <h6>Visi-visi Kami Antara Lain : </h6>
                        <?php foreach($datavisi as $visi): ?>
                        
                        <figure style="margin-left:0px;border-bottom:solid #e0e0e0 0.1em; width:100%;">
                            <span style="top:0px;"><i class="fa <?= $visi->Judul; ?>"></i></span>
                            <figcaption>
                                <h3><?= $visi->IsiPos; ?></h3>
                            </figcaption>
                        </figure>
                        
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php endif; ?>
            
            <?php if($datamisi): ?>
            
                <div class="col-sm-6">
                    <div class="about-info card card-body">
                        <h6>Adapun Misi Kami : </h6>
                        <?php foreach($datamisi as $misi): ?>
                        
                        <figure style="margin-left:0px;border-bottom:solid #e0e0e0 0.1em; width:100%;">
                            <span style="top:0px;"><i class="fa <?= $misi->Judul; ?>"></i></span>
                            <figcaption>
                                <h3><?= $misi->IsiPos; ?></h3>
                            </figcaption>
                        </figure>
                        
                        <?php endforeach; ?>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
</section>

<?php endif; ?>

<!-- AGENDA -->
<section id="feature" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Agenda Kegiatan</h2>
        </div>
        <div class="row">
            <?php 
            if($dataagenda):
                $col = 'col-lg-12';
                if(sizeof($dataagenda) == 1){
                    $col = 'col-sm-12';
                }elseif(sizeof($dataagenda) == 2){
                    $col = 'col-sm-6';
                }else{
                    $col = 'col-sm-4';
                }
                $i = 1;
                foreach($dataagenda as $agenda): ?>

                <div class="<?= $col; ?>">
                    <div class="feature-thumb bgwhite" style="margin-bottom:10px;">
                        <span><?= $i++; ?></span>
                        <h3><a href="<?= base_url('page/agenda/'.$agenda->slug); ?>" class="m-text11">
                                <?= $agenda->Judul; ?>
                            </a>
                        </h3>
                        <b><?= strtoupper($this->template->tgl_indo($agenda->TglPublikasi, false, false)); ?></b><br>
                        <?= word_limiter($agenda->IsiPos, 15); ?>
                    </div>
                </div>

            <?php endforeach;
            endif; ?>     
            <div class="col-lg-12 t-center" style="margin-top:10px;">
                <a href="<?= base_url('page/agenda'); ?>" class="btn btn-default">
                    Lihat Semua Agenda
                </a>
            </div>

        </div>
    </div>
</section>

<!-- AGENDA -->
<section id="feature" class="bgwhite">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Pengumuman</h2>
        </div>
        <div class="row">
        <?php if($datapengumuman):
            foreach($datapengumuman as $pengumuman): ?>

                <div class="col-lg-12 mb20">
                    <div class="card border-left">
                        <strong><a href="<?= base_url('page/pengumuman/'.$pengumuman->slug); ?>"><?= $pengumuman->Judul; ?></a></strong>
                        <?= word_limiter($pengumuman->IsiPos, 35); ?>
                        <a href="<?= base_url('page/pengumuman/'.$pengumuman->slug); ?>" style="margin-top:20px;">
                            Lanjutkan membaca
                            <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

            <?php endforeach;
            endif; ?>   

            <div class="col-lg-12 t-center" style="margin-top:10px;">
                <a href="<?= base_url('page/pengumuman'); ?>" class="btn btn-default">
                    Lihat Semua Pengumuman
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ARTIKEL -->
<section id="feature" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Artikel dan Berita</h2>
        </div>
        <div class="row">
        <?php if($dataartikel):
            $col = 'col-lg-12';
            if(sizeof($dataartikel) == 1){
                $col = 'col-sm-12';
            }elseif(sizeof($dataartikel) == 2){
                $col = 'col-sm-6';
            }else{
                $col = 'col-sm-4';
            }
            $i = 1;
            foreach($dataartikel as $artikel): ?>

                <div class="<?= $col; ?>" style="margin-bottom:20px;">
                    <div class="courses-thumb" style="height: 420px;">
                        <div class="courses-top">
                            <div class="courses-image">
                                <img src="<?php
                                $img_artikel = $this->db->get_where('filependukung', ['IdPos'=>$artikel->IdPos], 1)->row_array();
                                if($img_artikel){
                                    echo base_url('assets/upload/'.$img_artikel['Path']);
                                }else{
                                    echo base_url('assets/images/placeholder_artikel.jpg');
                                }
                                ?>" class="img-responsive" alt="" style="width:100%;height: 220px;object-fit: cover;">
                            </div>
                            <div class="courses-date" style="background:#0000006e;">
                                <span><i class="fa fa-calendar"></i>&nbsp;<?= strtoupper($this->template->tgl_indo($artikel->TglPublikasi, false, false)); ?></span>
                            </div>
                        </div>

                        <div class="courses-detail">
                            <h3><a href="<?= base_url('page/artikel/'.$artikel->slug); ?>"><?= $artikel->Judul; ?></a></h3>
                            <?= word_limiter($artikel->IsiPos, 15); ?>
                            <a href="<?= base_url('page/artikel/'.$artikel->slug); ?>" style="margin-top:20px;">
                                Lanjutkan membaca
                                <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

            <?php endforeach;
            endif; ?>     
            <div class="col-lg-12 t-center" style="margin-top:10px;">
                <a href="<?= base_url('page/artikel'); ?>" class="btn btn-default">
                    Lihat Semua Artikel
                </a>
            </div>

        </div>
    </div>
</section>
 
<!-- DOKUMENTASI -->
<section id="feature" class="bgwhite">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Dokumentasi Foto</h2>
        </div>
        <div class="row">
        <?php if($datafoto):
            $col = 'col-lg-12';
            if(sizeof($datafoto) == 1){
                $col = 'col-sm-12';
            }elseif(sizeof($datafoto) == 2){
                $col = 'col-sm-6';
            }else{
                $col = 'col-sm-4';
            }
            $i = 1;
            foreach($datafoto as $foto): ?>

                <div class="<?= $col; ?>" style="margin-bottom:20px;">
                    <div class="courses-thumb">
                        <div class="courses-top">
                            <a href="<?= base_url('assets/upload/'.$foto->IsiPos); ?>#" class="courses-image" data-lightbox="image-1" data-title="<?= $foto->Judul; ?>">
                                <img src="<?= base_url('assets/upload/'.$foto->IsiPos); ?>" class="img-responsive" alt="" style="width:100%;height: 220px;object-fit: cover;">
                            </a>
                            <div class="courses-date" style="background:#0000006e;">
                                <span><i class="fa fa-calendar"></i>&nbsp;<?= strtoupper($this->template->tgl_indo($foto->TglPublikasi, false, false)); ?></span><br>
                                <a href="#" style="color:#ffffff;"><?= $foto->Judul; ?></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach;
            endif; ?>     
            <div class="col-lg-12 t-center" style="margin-top:10px;">
                <a href="<?= base_url('page/foto'); ?>" class="btn btn-default">
                    Lihat Semua Galeri
                </a>
            </div>

        </div>
    </div>
</section>
 
<!-- CONTACT -->
<section id="contact">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner contact-image">

                        <div class="item active">
                            <img src="<?= base_url('assets/upload/'.$banner_kontak->Value); ?>" alt="Los Angeles" style="width:100%;height:430px;object-fit:cover;">
                        </div>
                        <div class="item">
                            <img src="<?= base_url('assets/upload/'.$banner_profil->Value); ?>" alt="Los Angeles" style="width:100%;height:430px;object-fit:cover;">
                        </div>
                        
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <form id="contact-form" role="form" action="<?= base_url('kontak'); ?>" method="post">
                    <div class="section-title">
                        <h2>Hubungi Kami <small>sampaikan pesan anda kepada kami!</small></h2>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter full name" name="NamaLengkap" required>

                        <input type="email" class="form-control" placeholder="Enter email address" name="Email" required>

                        <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="IsiPesan" required></textarea>

                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <input type="submit" name="submit" class="form-control" name="send message" value="Send Message">
                    </div>
                </form>
            </div>

        </div>
    </div>
</section> 

<script src="<?php echo base_url('known/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('known/lightbox/'); ?>js/lightbox.js"></script>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>