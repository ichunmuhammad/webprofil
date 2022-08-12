<!-- DOKUMENTASI -->
<link href="<?php echo base_url('known/lightbox/'); ?>css/lightbox.css" rel="stylesheet">
<section id="content" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Dokumentasi Foto</h2>
        </div>
        <div class="row" id="lightgallery">
            <div class="col-lg-12" style="margin-bottom:20px;">
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

<script src="<?php echo base_url('known/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('known/lightbox/'); ?>js/lightbox.js"></script>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>