<link href="<?php echo base_url(); ?>assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('slider/'); ?>" method="get">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="q" id="q" placeholder="cari data disini" class="form-control" value="<?php echo isset($_GET['q']) ? $this->input->get('q') : ""; ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <span class="float-right">
                                        <a href="<?= base_url('slider/tambah/'); ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">                    
                        <div class="row el-element-overlay">
                            <?php if($datapos):
                                foreach($datapos as $pos): ?>

                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card" style="background:transparent;padding:6px;border:solid #e0e0e0 0.1px;">
                                        <div class="el-card-item" style="padding-bottom:0px;">
                                            <div class="el-overlay-1">
                                                <?php $imgsrc = base_url('assets/upload/'.$pos->IsiPos); ?>
                                                <img src="<?= $imgsrc; ?>" id="img-val" alt="user">
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a id="preview-img" class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= $imgsrc; ?>"><i class="mdi mdi-magnify-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-title">
                                                <b><?= word_limiter($pos->Judul, 30); ?></b><br>
                                                <small class="text-primary"><?= $this->template->tgl_indo($pos->TglDibuat, false, true); ?></small>
                                            </div>
                                            <div class="btn-group">
                                                <a href="#" data-id="<?= $pos->IdPos; ?>" data-judul="<?= $pos->Judul; ?>" class="btn btn-danger btn-del-pos mr-2 mb-2"><i class="fa fa-fw fa-trash"></i> Hapus</a>
                                                <a href="<?= $imgsrc ?>" target="_blank" class="btn btn-info mr-2 mb-2"><i class="fa fa-fw fa-download"></i> Unduh</a>
                                                <?php if($pos->IsPublikasi == 1): ?>
                                                    <a href="#" data-id="<?= $pos->IdPos; ?>" data-judul="<?= $pos->Judul; ?>" class="btn btn-secondary btn-hide-pos mr-2 mb-2"><i class="mdi mdi-eye-off"></i> Hide</a>
                                                <?php else: ?>
                                                    <a href="#" data-id="<?= $pos->IdPos; ?>" data-judul="<?= $pos->Judul; ?>" class="btn btn-success btn-show-pos mr-2 mb-2"><i class="mdi mdi-eye"></i> Show</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; 
                            else: ?>
                                <div class="col-lg-12 p-4"><b><i>Tidak ada data slider</i></b></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <?php echo $this->pagination->create_links(); ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <input type="hidden" name="IdPos" id="IdPos">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="msg-hapus"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-delete" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="publikModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tampilkan</h5>
                    <input type="hidden" name="IdPos" id="IdPosPublik">
                    <input type="hidden" name="IsPublikasi" id="IsPublikasiPublik">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="msg-publik"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-publikasi" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Ya, Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.btn-del-pos').on('click', function(){
        let idpos = $(this).data('id');
        let judul = $(this).data('judul');
        $('#IdPos').val(idpos);
        $('#msg-hapus').html('Anda yakin ingin menghapus data slider <br><b>"'+judul+'"</b> ini ?');
        $('#delModal').modal('show');
    })
    $('.btn-hide-pos').on('click', function(){
        let idpos = $(this).data('id');
        let judul = $(this).data('judul');
        $('#IdPosPublik').val(idpos);
        $('#IsPublikasiPublik').val(0);
        $('#msg-publik').html('Anda yakin ingin menyembunyikan data slider <br><b>"'+judul+'"</b> ini dari publikasi ?');
        $('#publikModal').modal('show');
    })
    $('.btn-show-pos').on('click', function(){
        let idpos = $(this).data('id');
        let judul = $(this).data('judul');
        $('#IdPosPublik').val(idpos);
        $('#IsPublikasiPublik').val(1);
        $('#msg-publik').html('Anda yakin ingin menampilkan data slider <br><b>"'+judul+'"</b> ini ke publikasi ?');
        $('#publikModal').modal('show');
    })
})
</script>