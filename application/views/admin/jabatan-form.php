<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NamaJabatan">Nama Jabatan</label>
                                <input type="text" name="NamaJabatan" id="NamaJabatan" class="form-control" placeholder="masukkan nama jabatan" value="<?= isset($detailjabatan['NamaJabatan']) ? $detailjabatan['NamaJabatan'] : ""; ?>">
                            </div>
                            <div class="form-group">
                                <label for="KodeJabatanAtas">Jabatan Atasan</label>
                                <select name="KodeJabatanAtas" id="KodeJabatanAtas" class="form-control" required>
                                    <option value="0">Jabatan Teratas</option>
                                    <?php if($datajabatan): 
                                        foreach($datajabatan as $jabatan): ?>

                                        <option value="<?= $jabatan->KodeJabatan; ?>" <?php echo isset($detailjabatan['KodeJabatanAtas']) && $detailjabatan['KodeJabatanAtas'] === $jabatan->KodeJabatan ? "selected" : ""; ?>><?= $jabatan->NamaJabatan; ?></option>

                                    <?php endforeach;
                                    endif; ?>
                                </select>
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group m-t-20">
                                <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Submit</button>
                                <a href="<?= base_url('jabatan'); ?>" class="btn btn-secondary"><i class="fa fa-fw fa-times"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>