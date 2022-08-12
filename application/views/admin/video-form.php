<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Judul">Judul Video</label>
                                <input type="text" name="Judul" id="Judul" placeholder="tulis judul video disini" class="form-control" required value="<?php echo isset($detailpos['Judul']) ? $detailpos['Judul'] : "" ?>">
                            </div>
                            <div class="form-group">
                                <label for="IsiPos">Link Video</label>
                                <textarea name="IsiPos" id="IsiPos" class="form-control" placeholder="tulis link video disini!, (youtube.com/dailymotion.com/vidio.com dll.)" required><?php echo isset($detailpos['IsiPos']) ? $detailpos['IsiPos'] : "" ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" value="1" <?php 
                                    if(isset($detailpos['IsPublikasi'])){
                                        if($detailpos['IsPublikasi'] === "1"){
                                            echo 'checked';
                                        }
                                    }else{
                                        echo 'checked';
                                    }
                                    ?> id="IsPublikasi" name="IsPublikasi">
                                    <label class="custom-control-label" for="IsPublikasi">Publikasikan</label>
                                </div>
                            </div>

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            
                            <div class="form-group">
                                <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Simpan</button>
                                <a href="<?= base_url($JenisPos); ?>" class="btn btn-secondary"><i class="fa fa-fw fa-times"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>