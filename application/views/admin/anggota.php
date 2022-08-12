<div class="row">
    <div class="col-lg-12">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item active">
                    <a class="page-link pl-4 pr-4" href="#" tabindex="-1">Data Guru/Karyawan<span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item">
                    <a class="page-link pl-4 pr-4" href="<?= base_url('jabatan'); ?>" tabindex="-1">Mst. Jabatan</a>
                </li>
                <li class="page-item">
                    <a class="page-link pl-4 pr-4" href="<?= base_url('anggota/bagan'); ?>" tabindex="-1">Bagan Struktur Organisasi</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-lg-12 m-t-10">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('anggota/'); ?>" method="get">
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
                                        <a href="<?= base_url('anggota/tambah'); ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 m-t-10">
                        <div class="table-responsive">
                            <table id="tb_peg" class="table table-striped mytable-fixed">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th width="4%">No.</th>
                                        <th >Nama Guru/Karyawan</th>
                                        <th width="14%">No Telpon</th>
                                        <th width="8%">Gender</th>
                                        <th width="16%">Jabatan</th>
                                        <th width="6%" class="text-center">Aktif</th>
                                        <th width="10%" class="text-right">##</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($dataanggota):
                                    foreach($dataanggota as $anggota): ?>

                                    <tr>
                                        <td width="4%"><?= ($page++)+1; ?>.</td>
                                        <td><?= $anggota->NamaLengkap; ?></td>
                                        <td width="14%"><?= $anggota->Telp; ?></td>
                                        <td width="8%"><?= $anggota->Kelamin === 'L' ? "Pria" : "Wanita"; ?></td>
                                        <td width="16%"><?= $anggota->NamaJabatan; ?></td>
                                        <td width="6%" class="text-center"><?php if($anggota->IsAktif === "1"){
                                            echo '<i class="fa fa-fw fa-check text-success">&nbsp;</i>';
                                        }else{
                                            echo '<i class="fa fa-fw fa-minus text-secondary">&nbsp;</i>';              
                                        } ?></td>
                                        <td width="10%" class="text-right">
                                            <a href="<?= base_url('anggota/edit/'.$anggota->IdAnggota); ?>" class="btn btn-success ml-2 mb-2"><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="#" data-id="<?= $anggota->IdAnggota; ?>" data-nama="<?= $anggota->NamaLengkap; ?>" data-jabat="<?= $anggota->NamaJabatan; ?>"  class="btn btn-danger btn-del-ang ml-2 mb-2"><i class="fa fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="delPegModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <input type="hidden" name="IdAnggota" id="IdAnggota">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="msg-hapuspeg"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-deletepeg" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

$(document).ready( function (){
    $('.btn-del-ang').on('click', function(){
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let jabat = $(this).data('jabat');
        $('#IdAnggota').val(id);
        $('#msg-hapuspeg').html('Anda yakin ingin menghapus data guru/karyawan <br/>Nama : <b>'+nama+'</b><br/>Jabatan : <b>'+jabat+'</b><br/> tersebut, data akan dihapus permanen, anda yakin?');
        $('#delPegModal').modal('show');
    })
});

</script>