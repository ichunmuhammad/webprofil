<!-- CONTACT -->
<?php 
    $success = $this->session->flashdata('success');
    $error = $this->session->flashdata('error');
?>
<section id="contact">
    <div class="container">
        <div class="row">
            <?php if(isset($success)): ?>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Congratulations!</strong> <?php echo $success; ?>
                    </div>
                </div>
            <?php endif;?>
            <?php if(isset($error)): ?>
                <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Failed!</strong> <?php echo $error; ?>
                    </div>
                </div>
            <?php endif;?> 

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