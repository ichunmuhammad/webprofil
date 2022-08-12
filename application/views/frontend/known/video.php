<!-- ARTIKEL -->
<section id="content" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Video Kami</h2>
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
        <?php if($datavideo):
            $i = 1;
            foreach($datavideo as $video): ?>

                <div class="col-sm-4" style="margin-top:20px;margin-bottom:20px;">
                    <div class="courses-thumb" style="height: auto;">
                        <div class="courses-top">
                            <div class="courses-image">
                                <div target="_blank" style="text-decoration:none;">                
                                    <iframe class="myimg" src="//www.youtube.com/embed/<?php
                                        $url = $video->IsiPos;
                                        $sUrl = explode('v=', $url);
                                        echo $sUrl[1];
                                    ?>" frameborder="0" allowfullscreen style="width:100%;height:220px;"></iframe>
                                </div>
                            </div>
                            <div class="courses-date" style="background:#0000006e;">
                                <span><i class="fa fa-calendar"></i>&nbsp;<?= strtoupper($this->template->tgl_indo($video->TglPublikasi, false, false)); ?></span>
                            </div>
                        </div>
                        <div class="courses-detail">
                            <h3><a target="_blank" href="<?= $video->IsiPos; ?>"><?= $video->Judul; ?></a></h3>
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