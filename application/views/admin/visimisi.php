<style>
    .icon{
        width:48px;
        font-size:22px;
        margin:0px 2px 2px 0px;
    }
    .addScroll{
        overflow-y:auto;
        height: 300px;
    }
</style>
<?php
$dataicon = $this->template->getListIcons();
?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 m-t-20">
                        <span class="card-title m-b-0 text-center h5">Visi-Visi Kami</span>
                        <div class="float-right">
                            <a href="#" class="btn btn-primary btn-add-visi"><i class="fa fa-fw fa-plus"></i>&nbsp;Tambah</a>
                        </div>
                    </div>
                    <div class="col-lg-12 m-t-10">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th width="5%">Icon</th>
                                        <th>Uraian</th>
                                        <th class="text-right" width="18%">##</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($datavisi): $i = 0;
                                        foreach($datavisi as $visi): ?>

                                        <tr>
                                            <td><i class="fa <?= $visi->Judul; ?>"></i></td>
                                            <td><h6><?= $visi->IsiPos; ?></h6></td>
                                            <td class="text-right">
                                                <!-- <a href="#" class="btn btn-success btn-edit ml-2 mb-2" data-id="<?php // $visi->IdPos; ?>" data-val="<?php // $visi->IsiPos; ?>" data-kat="<?php // $visi->JenisPos; ?>" data-jdl="<?php // $visi->Judul; ?>"><i class="fa fa-fw fa-edit"></i>&nbsp;</a> -->
                                                <a href="#" class="btn btn-danger btn-hapus ml-2 mb-2" data-id="<?= $visi->IdPos; ?>" data-val="<?= $visi->IsiPos; ?>" data-kat="<?= $visi->JenisPos; ?>"><i class="fa fa-fw fa-trash"></i>&nbsp;</a>
                                            </td>
                                        </tr>

                                    <?php endforeach;
                                    else:?>

                                        <tr>
                                            <td colspan="3"><i>tidak ada data !</i></td>
                                        </tr>
                                    
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 m-t-20">
                        <span class="card-title m-b-0 text-center h5">Daftar Misi Kami</span>
                        <div class="float-right">
                            <a href="#" class="btn btn-primary btn-add-misi"><i class="fa fa-fw fa-plus"></i>&nbsp;Tambah</a>
                        </div>
                    </div>
                    <div class="col-lg-12 m-t-10">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th width="5%">Icon</th>
                                        <th>Uraian</th>
                                        <th class="text-right" width="18%">##</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($datamisi): $i = 0;
                                        foreach($datamisi as $misi): ?>

                                        <tr>
                                            <td><i class="fa <?= $misi->Judul; ?>"></i></td>
                                            <td><h6><?= $misi->IsiPos; ?></h6></td>
                                            <td class="text-right">
                                                <!-- <a href="#" class="btn btn-success btn-edit ml-2 mb-2" data-id="<?php //echo $misi->IdPos; ?>" data-val="<?php // $misi->IsiPos; ?>" data-kat="<?php // $misi->JenisPos; ?>" data-jdl="<?php // $misi->Judul; ?>"><i class="fa fa-fw fa-edit"></i>&nbsp;</a> -->
                                                <a href="#" class="btn btn-danger btn-hapus ml-2 mb-2" data-id="<?= $misi->IdPos; ?>" data-val="<?= $misi->IsiPos; ?>" data-kat="<?= $misi->JenisPos; ?>"><i class="fa fa-fw fa-trash"></i>&nbsp;</a>
                                            </td>
                                        </tr>

                                    <?php endforeach;
                                    else:?>

                                        <tr>
                                            <td colspan="3"><i>tidak ada data !</i></td>
                                        </tr>
                                    
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Visi & Misi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Judul">Icon/Simbol/Lambang</label>
                                <input type="hidden" name="Judul" id="Judul">
                                <input type="hidden" name="JenisPos" id="JenisPos">

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                
                                <div class="mt-2 addScroll">
                                <?php 
                                    $i = 0;
                                    foreach ($dataicon as $icon) {
                                        $class = '';
                                        if($i == 0){
                                            $class = 'active';
                                        }else{
                                            $class = '';
                                        }
                                        echo '<div class="btn btn-outline-primary text-center icon '.$class.'" data-val="'.$icon.'"><i class="fas '.$icon.'"></i>&nbsp;</div>';
                                        $i++;
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="IsiPos">Uraian Visi</label>
                                <input type="text" name="IsiPos" id="IsiPos" placeholder="masukkan uraian disini !" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="delModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data Visi & Misi</h5>
                    <input type="hidden" name="IdPos" id="IdPos">
                    <input type="hidden" name="JenisPos" id="JenisPosDel">

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="mst-del"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-delete" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> Ya, Hapus data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){
    var icons = <?= json_encode($dataicon); ?>;
    var selectedIcon =  icons[0];
    var visi = '<?= VISI; ?>';
    var misi = '<?= MISI; ?>';
    $('#Judul').val(selectedIcon);
    
    $('.btn-add-visi').on('click', function(){
        $('#exampleModalLabel').html('Form Data Visi-visi');
        $('#JenisPos').val(visi);
        $('#addModal').modal('show');
    })
    $('.btn-add-misi').on('click', function(){
        $('#exampleModalLabel').html('Form Data Misi-misi');
        $('#JenisPos').val(misi);
        $('#addModal').modal('show');
    })
    $('.btn-hapus').on('click', function(){
        let idpos = $(this).data('id');
        let isipos = $(this).data('val');
        let jenis = $(this).data('kat');
        $('#IdPos').val(idpos);
        $('#JenisPosDel').val(jenis);
        $('#mst-del').html('Anda yakin ingin menghapus data '+jenis+' "<b>'+isipos+'</b>" ini ?');
        $('#delModel').modal('show');
    })
    $('.icon').on('click', function(){
        $(".icon").removeClass("active");
        selectedIcon = $(this).data('val');
        $('#Judul').val(selectedIcon);
        $(this).addClass("active");
    })
})
</script>