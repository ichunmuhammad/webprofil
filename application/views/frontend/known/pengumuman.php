<!-- AGENDA -->
<section id="content" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Pengumuman</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 mb20">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="q" value="<?php echo isset($_GET['q']) ? $this->input->get('q') : ""; ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                Telusuri
                            </button>
                        </div>
                    </div>
                </form> 
            </div>
            <?php if($datapengumuman): $i = 1;
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
            else:?>

                <div class="col-lg-12">
                    <div class="card card-body bgwhite text-center" style="padding:20px;margin-top:10px;">
                        <h4>data "<b><?php echo isset($_GET['q']) ? $this->input->get('q') : ""; ?></b>" tidak ditemukan !</h4>
                    </div>
                </div>
            
            <?php 
            endif; ?> 

            <div class="col-lg-12" style="margin-top:10px;">
                <?php echo $this->pagination->create_links(); ?> 
            </div>

        </div>
    </div>
</section>