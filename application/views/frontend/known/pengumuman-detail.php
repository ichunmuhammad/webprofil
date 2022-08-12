<!-- TENTANG KAMI -->
<section id="content" class="bggrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-body bgwhite" style="padding:20px;">
                    <div class="feature">
                        <h2><?= $detail_pengumuman['Judul']; ?></h2>
                        <b><?= strtoupper($this->template->tgl_indo($detail_pengumuman['TglPublikasi'], false, false)); ?></b><br>
                        <?= $detail_pengumuman['IsiPos']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>