<link href="<?php echo base_url(); ?>assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
<?php $this->load->library('Nativesession','nativesession'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Judul">Judul <?= ucwords($JenisPos); ?></label>
                                <input type="text" name="Judul" id="Judul" placeholder="tulis judul <?= $JenisPos; ?> disini" class="form-control" required value="<?php echo isset($detailpos['Judul']) ? $detailpos['Judul'] : "" ?>">
                            </div>
                            <div class="form-group">
                                <label for="IsiPos">Isi <?= ucwords($JenisPos); ?></label>
                                <textarea name="IsiPos" id="IsiPos" class="form-control ckeditor" required><?php echo isset($detailpos['IsiPos']) ? $detailpos['IsiPos'] : "" ?></textarea>
                            </div>
                            <div class="row el-element-overlay">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Path" class="mb-2">Gambar Pendukung 1</label>
                                        <div class="card" style="margin-bottom:0px;">
                                            <div class="el-card-item" style="margin-bottom:0px;padding-bottom:0px;">
                                                <div class="el-card-avatar el-overlay-1" style="margin-bottom:0px;"> 
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="Path1" name="Path1" onchange="previewImage('Path1', 'preview_path1');">
                                                        <label class="custom-file-label" for="validatedCustomFile" style="text-align: left;">Ubah foto, Klik disini !</label>
                                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                    </div>
                                                    <?php 
                                                    $imgsrc = base_url('assets/images/image_add_placeholder.png');
                                                    if(isset($datapendukung) && sizeof($datapendukung) > 0){
                                                        $imgsrc = base_url('assets/upload/'.$datapendukung[0]->Path);
                                                    }
                                                    ?>
                                                    <img src="<?= $imgsrc; ?>" id="preview_path1" alt="...." style="max-height: 200px;object-fit:contain;">
                                                    <div class="el-overlay">
                                                        <ul class="list-style-none el-info">
                                                            <li class="el-item"><a id="preview-img" class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= $imgsrc; ?>"><i class="mdi mdi-magnify-plus"></i></a>
                                                                <?php if(isset($datapendukung) && sizeof($datapendukung) > 0): ?>
                                                                    <a data-id="<?= $datapendukung[0]->IdPos; ?>" data-source="<?= $imgsrc; ?>" data-no="<?= $datapendukung[0]->NoUrut; ?>" id="delete-img" class="btn default btn-sm btn-danger el-link btn-delete-img" href="#"><i class="mdi mdi-close-box"></i></a>
                                                                <?php endif; ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- <div class="el-card-content">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Path" class="mb-2">Gambar Pendukung 2</label>
                                        <div class="card" style="margin-bottom:0px;">
                                            <div class="el-card-item" style="margin-bottom:0px;padding-bottom:0px;">
                                                <div class="el-card-avatar el-overlay-1" style="margin-bottom:0px;"> 
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="Path2" name="Path2" onchange="previewImage('Path2', 'preview_path2');">
                                                        <label class="custom-file-label" for="validatedCustomFile" style="text-align: left;">Ubah foto, Klik disini !</label>
                                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                    </div>
                                                    <?php 
                                                    $imgsrc = base_url('assets/images/image_add_placeholder.png');
                                                    if(isset($datapendukung) && sizeof($datapendukung) > 1){
                                                        $imgsrc = base_url('assets/upload/'.$datapendukung[1]->Path);
                                                    }
                                                    ?>
                                                    <img src="<?= $imgsrc; ?>" id="preview_path2" alt="...." style="max-height: 200px;object-fit:contain;">
                                                    <div class="el-overlay">
                                                        <ul class="list-style-none el-info">
                                                            <li class="el-item"><a id="preview-img" class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= $imgsrc; ?>"><i class="mdi mdi-magnify-plus"></i></a>
                                                                <?php if(isset($datapendukung) && sizeof($datapendukung) > 1): ?>
                                                                    <a data-id="<?= $datapendukung[1]->IdPos; ?>" data-source="<?= $imgsrc; ?>" data-no="<?= $datapendukung[1]->NoUrut; ?>" id="delete-img" class="btn default btn-sm btn-danger el-link btn-delete-img" href="#"><i class="mdi mdi-close-box"></i></a>
                                                                <?php endif; ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- <div class="el-card-content">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Path" class="mb-2">Gambar Pendukung 3</label>
                                        <div class="card" style="margin-bottom:0px;">
                                            <div class="el-card-item" style="margin-bottom:0px;padding-bottom:0px;">
                                                <div class="el-card-avatar el-overlay-1" style="margin-bottom:0px;"> 
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="Path3" name="Path3" onchange="previewImage('Path3', 'preview_path3');">
                                                        <label class="custom-file-label" for="validatedCustomFile" style="text-align: left;">Ubah foto, Klik disini !</label>
                                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                    </div>
                                                    <?php 
                                                    $imgsrc = base_url('assets/images/image_add_placeholder.png');
                                                    if(isset($datapendukung) && sizeof($datapendukung) > 2){
                                                        $imgsrc = base_url('assets/upload/'.$datapendukung[2]->Path);
                                                    }
                                                    ?>
                                                    <img src="<?= $imgsrc; ?>" id="preview_path3" alt="...." style="max-height: 200px;object-fit:contain;">
                                                    <div class="el-overlay">
                                                        <ul class="list-style-none el-info">
                                                            <li class="el-item">
                                                                <a id="preview-img" class="btn default btn-sm btn-outline image-popup-vertical-fit el-link" href="<?= $imgsrc; ?>"><i class="mdi mdi-magnify-plus"></i></a>
                                                                <?php if(isset($datapendukung) && sizeof($datapendukung) > 2): ?>
                                                                    <a data-id="<?= $datapendukung[2]->IdPos; ?>" data-source="<?= $imgsrc; ?>" data-no="<?= $datapendukung[2]->NoUrut; ?>" id="delete-img" class="btn default btn-sm btn-danger el-link btn-delete-img" href="#"><i class="mdi mdi-close-box"></i></a>
                                                                <?php endif; ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- <div class="el-card-content">
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('artikel/'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <input type="hidden" name="IdPos" id="IdPosImg">
                    <input type="hidden" name="NoUrut" id="NoUrutImg">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="msg-hapusimg"></span>
                    <img src="" style="width:auto;height:120px;display:block;margin:10px 0;" id="img-hapus">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-delete-file" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<script>

$(document).ready(function(){
    CKEDITOR.replace('ckeditor',{
        filebrowserImageBrowseUrl : '<?= base_url('assets/kcfinder/browse.php');?>',
        height: '400px'                 
    });
    $('.btn-delete-img').on('click', function(){
        var idpos = $(this).data('id');
        var no = $(this).data('no');
        var source = $(this).data('source');
        $('#IdPosImg').val(idpos);
        $('#NoUrutImg').val(no);
        $('#msg-hapusimg').html('Anda yakin ingin menghapus data pendukung ini ?');
        $('#img-hapus').prop('src', source);
        $('#delModal').modal('show');
    })
})

</script>