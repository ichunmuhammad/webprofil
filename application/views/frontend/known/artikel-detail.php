<!-- TENTANG KAMI -->
<section id="content" class="bggrey">
    <div class="container">
        <div class="row">
            <?php if($datapendukung): ?>
            <div class="col-lg-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">

                        <?php 
                        $i = 0;
                        while($i < sizeof($datapendukung)): ?>

                            <li data-target="#myCarousel" data-slide-to="<?= $i; ?>" class="<?php echo ($i == 0) ? "active" : ""; $i++; ?>"></li>

                        <?php endwhile; ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                    <?php 
                    $i = 0;
                    foreach($datapendukung as $pendukung): ?>

                        <div class="item <?php echo ($i == 0) ? "active" : ""; $i++; ?>">
                            <img src="<?= base_url('assets/upload/'.$pendukung->Path); ?>" alt="Los Angeles" style="width:100%;height:340px;object-fit:cover;">
                            <span style="display:block;background:#000; color:#ffffff;"><?= $pendukung->NamaFile; ?></span>
                        </div>

                    <?php endforeach; ?>

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
            <?php endif; ?>
            <div class="col-lg-12">
                <div class="card card-body bgwhite" style="padding:20px;">
                    <div class="feature">
                        <h2><?= $detail_artikel['Judul']; ?></h2>
                        <b><?= strtoupper($this->template->tgl_indo($detail_artikel['TglPublikasi'], false, false)); ?></b><br>
                        <?= $detail_artikel['IsiPos']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>