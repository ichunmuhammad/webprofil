<!-- ARTIKEL -->
<section id="content" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Artikel dan Berita</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
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
        <?php if($dataartikel):
            $i = 1;
            foreach($dataartikel as $artikel): ?>

                <div class="col-sm-4" style="margin-top:20px;margin-bottom:20px;">
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
            else:?>
            
            <div class="col-lg-12">
                <div class="card card-body bgwhite text-center" style="padding:20px;margin-top:10px;">
                    <h4>data "<b><?php echo isset($_GET['q']) ? $this->input->get('q') : ""; ?></b>" tidak ditemukan !</h4>
                </div>
            </div>
            
            <?php endif; ?>     
            <div class="col-lg-12" style="margin-top:10px;">
                <?php echo $this->pagination->create_links(); ?> 
            </div>

        </div>
    </div>
 </section>