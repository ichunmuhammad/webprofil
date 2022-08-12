<div class="row">
    <div class="col-lg-12">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link pl-4 pr-4" href="<?= base_url('galeri'); ?>" tabindex="-1">Foto</a>
                </li>
                <li class="page-item active">
                    <a class="page-link pl-4 pr-4" href="#" tabindex="-1">Video<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('galeri/video'); ?>" method="get">
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
                                        <a href="<?= base_url('galeri/tambah/video'); ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</a>
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
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th width="4%">No.</th>
                                        <th width="10%">Video</th>
                                        <th>Keterangan</th>
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
                                            <div target="_blank" style="text-decoration:none;">                
                                                <iframe class="myimg" src="//www.youtube.com/embed/<?php
                                                    $url = $pos->IsiPos;
                                                    $sUrl = explode('v=', $url);
                                                    echo $sUrl[1];
                                                ?>" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="mb-4">
                                                <b><?= $pos->Judul; ?></b><br>
                                                <small class="text-primary"><?= $this->template->tgl_indo($pos->TglDibuat, true, true); ?></small>
                                            </span>
                                            <div class=""><?= word_limiter($pos->IsiPos, 40); ?></div>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $pos->IsPublikasi == 1 ? '<i class="fa fa-fw fa-check text-success"></i>' : '<i class="fa fa-fw fa-minus text-secondary"></i>'; ?>
                                        </td>
                                        <td class="text-right">
                                            <a href="<?= base_url('galeri/edit/'.$pos->IdPos); ?>" class="btn btn-success ml-2 mb-2"><i class="fa fa-fw fa-edit"></i></a>
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

<script>
$(document).ready(function(){
    $('.btn-del-pos').on('click', function(){
        let idpos = $(this).data('id');
        let judul = $(this).data('judul');
        $('#IdPos').val(idpos);
        $('#msg-hapus').html('Anda yakin ingin menghapus data video <br><b>"'+judul+'"</b> ini ?');
        $('#delModal').modal('show');
    })
})
</script>