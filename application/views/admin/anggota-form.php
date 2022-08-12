<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="NamaLengkap">Nama Lengkap</label>
                                <input type="text" name="NamaLengkap" id="NamaLengkap" class="form-control" placeholder="masukkan nama lengkap guru/karyawan" value="<?php echo isset($detailanggota['NamaLengkap']) ? $detailanggota['NamaLengkap'] : ""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Telp">Nomor Telepon</label>
                                <input type="text" name="Telp" id="Telp" class="form-control number-only" placeholder="masukkan nomor telepon guru/karyawan" value="<?php echo isset($detailanggota['Telp']) ? $detailanggota['Telp'] : ""; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Kelamin">Jenis Kelamin</label>
                                <select name="Kelamin" id="Kelamin" class="form-control" required>
                                    <option value="L" <?php echo isset($detailanggota['Kelamin']) && $detailanggota['Kelamin'] === "L" ? "selected" : ""; ?>>Laki-laki</option>
                                    <option value="W" <?php echo isset($detailanggota['Kelamin']) && $detailanggota['Kelamin'] === "W" ? "selected" : ""; ?>>Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KodeJabatan">Jabatan</label>
                                <select name="KodeJabatan" id="KodeJabatan" class="form-control" required>
                                    <?php if($datajabatan): 
                                        foreach($datajabatan as $jabatan): ?>

                                        <option value="<?= $jabatan->KodeJabatan; ?>" <?php echo isset($detailanggota['KodeJabatan']) && $detailanggota['KodeJabatan'] === $jabatan->KodeJabatan ? "selected" : ""; ?>><?= $jabatan->NamaJabatan; ?></option>

                                    <?php endforeach;
                                    endif; ?>
                                </select>
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group m-t-10 m-b-20">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" value="1" <?php 
                                    if(isset($detailanggota['IsAktif'])){
                                        if($detailanggota['IsAktif'] === "1"){
                                            echo 'checked';
                                        }
                                    }else{
                                        echo 'checked';
                                    }
                                    ?> id="IsAktif" name="IsAktif">
                                    <label class="custom-control-label" for="IsAktif">Aktif</label>
                                </div>
                            </div>
                            <div class="form-group m-t-20">
                                <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Submit</button>
                                <a href="<?= base_url('anggota'); ?>" class="btn btn-secondary"><i class="fa fa-fw fa-times"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>