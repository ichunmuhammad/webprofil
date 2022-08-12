<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row el-element-overlay">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="Path" class="mb-2">File Dokumen</label>
                                <input type="file" name="Path" id="Path" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label for="Judul">Judul <?= ucwords($JenisPos); ?></label>
                                <input type="text" name="Judul" id="Judul" placeholder="tulis judul <?= $JenisPos; ?> disini" class="form-control" required value="<?php echo isset($detailpos['Judul']) ? $detailpos['Judul'] : "" ?>">
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group">
                                <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Simpan</button>
                                <a href="<?= base_url('dokumen'); ?>" class="btn btn-secondary"><i class="fa fa-fw fa-times"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>