<!-- AGENDA -->
<section id="content" class="bggrey">
    <div class="container">
    <div class="feature" style="margin-bottom:10px;">
        <h2>Agenda Kegiatan</h2>
    </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom:10px;">
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
        <?php if($dataagenda):
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
                    <div class="feature-thumb bgwhite" style="margin-bottom:40px;">
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