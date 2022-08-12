<link href="<?php echo base_url(); ?>assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row el-element-overlay">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="Path" class="mb-2">Foto Slider</label>
                                <div class="card" style="margin-bottom:0px;">
                                    <div class="el-card-item" style="margin-bottom:0px;padding-bottom:0px;">
                                        <div class="el-card-avatar el-overlay-1" style="margin-bottom:0px;"> 
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="Path" name="Path" required onchange="previewImage('Path', 'img-foto-galeri');">
                                                <label class="custom-file-label" for="validatedCustomFile">Ubah foto slider, Klik disini !</label>
                                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                            </div>
                                            <?php 
                                            // $imgsrc = base_url('assets/images/placeholder_galeri.jpg');
                                            $imgsrc = "#";
                                            ?>
                                            <img src="<?= $imgsrc; ?>" id="img-foto-galeri" alt="preview file slider disini" style="max-height: 200px;object-fit:contain;border: solid #ddd 0.1em;background: #000;">
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item"><a id="preview-img" class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= $imgsrc; ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
                                                    <!-- <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="mdi mdi-link"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- <div class="el-card-content">
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            
                            <div class="form-group">
                                <label for="Judul">Judul <?= ucwords($JenisPos); ?></label>
                                <input type="text" name="Judul" id="Judul" placeholder="tulis judul <?= $JenisPos; ?> disini" class="form-control" required value="<?php echo isset($detailpos['Judul']) ? $detailpos['Judul'] : "" ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Simpan</button>
                                <a href="<?= base_url('slider'); ?>" class="btn btn-secondary"><i class="fa fa-fw fa-times"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>