<!-- TENTANG KAMI -->
<section id="content" class="bggrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-thumb">
                    <div class="courses-top">
                        <div class="courses-image">
                            <img src="<?= base_url('assets/upload/'.$banner_profil->Value); ?>" class="img-responsive" alt="" style="width:100%;height: 340px;object-fit: cover;">
                        </div>
                        <div class="courses-date" style="background:#0000006e; color:#ffffff;">
                            <h5><?php echo isset($banner_profil_title->Value) ? $banner_profil_title->Value : ""; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-body bgwhite" style="padding:20px;">
                    <div class="feature">
                        <h2>Tentang Kami</h2>
                        <div class="text-white">
                            <ul class="social-icon social-icon-bordered">
                                    <li><a href="<?php echo $fb_link->Value; ?>" class="fa fa-facebook"></a></li>
                                    <li><a href="<?php echo $wa_link->Value; ?>" class="fa fa-whatsapp"></a></li>
                                    <li><a href="<?php echo $ig_link->Value; ?>" class="fa fa-instagram"></a></li>
                                   <li><a href="<?php echo $tg_link->Value; ?>" class="fa fa-telegram"></a></li>
                            </ul>       
                        </div>
                        <?= $profilkami->Value; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>