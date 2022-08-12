<?php $this->load->library('Nativesession','nativesession'); ?>
<link href="<?php echo base_url(); ?>assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
<div class="row el-element-overlay">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark text-white">
                            <tr>
                                <th width="4%">No.</th>
                                <th width="18%">Nama Setting</th>
                                <th>Value</th>
                                <th width="10%" class="text-right">##</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($datasetting): $i = 1;
                            foreach($datasetting as $setting): ?>

                            <tr>
                                <td><?= $i++; ?>.</td>
                                <td><?= str_replace('_', ' ', $setting->NamaSetting); ?></td>
                                <td><?php 
                                    if($setting->Tipe === "img"){
                                        echo '<div class="card" style="background:transparent; height:50%;">
                                            <div class="el-card-item">
                                                <div class="el-overlay-1" style="width:80px;max-height:30%;">';
                                                    $imgsrc = base_url('assets/upload/'.$setting->Value);                                                
                                                    echo '<img src="'.$imgsrc.'" id="img-val" alt="user">
                                                    <div class="el-overlay">
                                                        <ul class="list-style-none el-info">
                                                            <li class="el-item"><a id="preview-img" class="btn default btn-outline image-popup-vertical-fit el-link" href="'.$imgsrc.'"><i class="mdi mdi-magnify-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }elseif($setting->Tipe === "bool"){
                                        echo $setting->Value === '1' ? '<span class="badge badge-pill badge-success"><i class="fa fa-fw fa-check"></i>&nbsp;</span>' : '<span class="badge badge-pill badge-danger"><i class="fa fa-fw fa-times"></i>&nbsp;</span>';
                                    }else{
                                        echo word_limiter($setting->Value, 50);
                                    } 
                                ?></td>
                                <td class="text-right">
                                    <a href="#" data-nama="<?= str_replace('_', ' ', $setting->NamaSetting); ?>" data-id="<?= $setting->KodeSetting; ?>" class="btn btn-success btn-edit"><i class="fa fa-fw fa-edit"></i></a>
                                </td>
                            </tr>

                        <?php endforeach; 
                        else: ?>

                            <tr>
                                <td colspan="4"><i>tidak ada data !!</i></td>
                            </tr>

                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="longTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Pengaturan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="KodeSetting" id="KodeSettingLongText">
                        <input type="hidden" name="Tipe" id="TipeLongText">
                        <label for="">Nama Setting</label>
                        <input type="text" id="NamaSettingLongText" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Value">Pengaturan</label>
                        <textarea style="min-height:120px;" name="Value" id="ValueLongText" class="form-control ckeditor"></textarea>
                    </div>

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="TextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Pengaturan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="KodeSetting" id="KodeSettingText">
                        <input type="hidden" name="Tipe" id="TipeText">
                        <label for="">Nama Setting</label>
                        <input type="text" id="NamaSettingText" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Value">Pengaturan</label>
                        <input type="text" name="Value" id="ValueText" class="form-control">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Pengaturan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="KodeSetting" id="KodeSettingImg">
                        <input type="hidden" name="Tipe" id="TipeImg">
                        <label for="">Nama Setting</label>
                        <input type="text" id="NamaSettingImg" class="form-control" readonly>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>
                    <div class="form-group el-element-overlay">
                        <label for="ValueImg">Pengaturan</label>
                        <div class="card" style="margin-bottom:0px;">
                            <div class="el-card-item" style="margin-bottom:0px;padding-bottom:0px;">
                                <div class="el-card-avatar el-overlay-1" style="margin-bottom:0px;"> 
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ValueImg" name="ValueImg" onchange="previewImage('ValueImg', 'img-ValueImg')">
                                        <label class="custom-file-label" for="validatedCustomFile">Ubah foto, Klik disini !</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                    <img id="img-ValueImg" alt="user" style="max-height: 300px;object-fit:contain;border: solid #ddd 0.1em;background: #000;">
                                </div>
                                <!-- <div class="el-card-content">
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                        <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="BoolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Ubah Pengaturan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="KodeSetting" id="KodeSettingBool">
                        <input type="hidden" name="Tipe" id="TipeBool">
                        <label for="">Nama Setting</label>
                        <input type="text" id="NamaSettingBool" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Value">Pengaturan</label>
                        <select name="Value" id="ValueBool" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript">

var selectedSetting = null;
var dataSetting = <?= json_encode($datasetting); ?>;

$(document).ready(function() {
    CKEDITOR.replace('ckeditor',{
        filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
        height: '400px'             
    });

    $('.btn-edit').on('click', function(){
        let KodeSetting = $(this).data('id');
        let nama = $(this).data('nama');
        for (let a = 0; a < dataSetting.length; a++) {
            const setting = dataSetting[a];
            if(setting.KodeSetting == KodeSetting){
                selectedSetting = setting;
                break;
            }
        }
        switch(selectedSetting.Tipe){
            case 'img':
                let baseurl = '<?= base_url('assets/upload/'); ?>';
                $('#KodeSettingImg').val(KodeSetting);
                $('#TipeImg').val(selectedSetting.Tipe);
                $('#NamaSettingImg').val(nama);
                $('#img-ValueImg').prop('src', baseurl+selectedSetting.Value);
                $('#preview-img').prop('href', baseurl+selectedSetting.Value);
                $('#ImgModal').modal('show');
                break;
            case 'longtext':
                $('#KodeSettingLongText').val(KodeSetting);
                $('#TipeLongText').val(selectedSetting.Tipe);
                $('#NamaSettingLongText').val(nama);
                CKEDITOR.instances['ValueLongText'].setData(selectedSetting.Value);
                $('#longTextModal').modal('show');
                break;
            case 'text':
                $('#KodeSettingText').val(KodeSetting);
                $('#TipeText').val(selectedSetting.Tipe);
                $('#NamaSettingText').val(nama);
                $('#ValueText').val(selectedSetting.Value);
                $('#TextModal').modal('show');
                break;
            case 'bool':
                $('#KodeSettingBool').val(KodeSetting);
                $('#TipeBool').val(selectedSetting.Tipe);
                $('#NamaSettingBool').val(nama);
                $('#ValueBool').val(selectedSetting.Value);
                $('#BoolModal').modal('show');
                break;
            default:
                break;
        }
    });
});
</script>