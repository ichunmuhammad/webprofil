<link href="<?php echo base_url(); ?>assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
<div class="row el-element-overlay">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('artikel/'); ?>" method="get">
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
                                        <a href="<?= base_url('artikel/tambah'); ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 mt-2">                    
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th width="4%">No.</th>
                                        <th>Isi Artikel</th>
                                        <th width="6%" class="text-center">Publikasi</th>
                                        <th width="4%" class="text-right">##</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($datapos):
                                    foreach($datapos as $pos): ?>
                                    <tr>
                                        <td><?= ($page++)+1; ?>.</td>
                                        <td>
                                            <span class="mb-4">
                                                <b><?= $pos->Judul; ?></b><br>
                                                <small class="text-primary"><?= $this->template->tgl_indo($pos->TglDibuat, true, true); ?></small>
                                            </span>
                                            <div class=""><?= word_limiter($pos->IsiPos, 40); ?></div>
                                            <?php if($pos->datapendukung):
                                                echo '<div class="row">';
                                                foreach($pos->datapendukung as $pendukung){
                                                    echo '<div class="col-md-2 col-sm-3 card" style="background:transparent;">
                                                        <div class="el-card-item">
                                                            <div class="el-overlay-1">';
                                                                $imgsrc = base_url('assets/upload/'.$pendukung->Path);
                                                                echo '<img src="'.$imgsrc.'" id="img-val" alt="user">
                                                                <div class="el-overlay">
                                                                    <ul class="list-style-none el-info">
                                                                        <li class="el-item">
                                                                            <a id="preview-img" class="btn default btn-outline image-popup-vertical-fit el-link" href="'.$imgsrc.'"><i class="mdi mdi-magnify-plus"></i></a>
                                                                            <a data-id="'.$pendukung->IdPos.'" data-source="'.$imgsrc.'" data-no="'.$pendukung->NoUrut.'" id="delete-img" class="btn default btn-sm btn-danger el-link btn-delete-img" href="#"><i class="mdi mdi-close-box"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>';                                                    
                                                }
                                                echo '</div>';
                                            endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $pos->IsPublikasi == 1 ? '<i class="fa fa-fw fa-check text-success"></i>' : '<i class="fa fa-fw fa-minus text-secondary"></i>'; ?>
                                        </td>
                                        <td class="text-right">
                                            <a href="<?= base_url('artikel/edit?id='.$pos->IdPos); ?>" class="btn btn-success ml-2 mb-2"><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="#" data-id="<?= $pos->IdPos; ?>" data-judul="<?= $pos->Judul; ?>" class="btn btn-danger btn-del-pos ml-2 mb-2"><i class="fa fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                                    else: ?>
                                    <tr>
                                        <td colspan="6"><i>tidak ada data</i></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
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
<div class="modal fade" id="delItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
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

<script>
$(document).ready(function(){
    $('.btn-del-pos').on('click', function(){
        var idpos = $(this).data('id');
        var judul = $(this).data('judul');
        $('#IdPos').val(idpos);
        $('#msg-hapus').html('Anda yakin ingin menghapus data artikel <br><b>"'+judul+'"</b> ini ?');
        $('#delItemModal').modal('show');
    })
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