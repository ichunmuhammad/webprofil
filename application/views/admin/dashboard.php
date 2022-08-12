<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php $msg_count = $this->db->get_where('pesan', ['IsDibaca !='=>1])->num_rows();
                    if($msg_count): ?>
                    <div class="col-lg-12 mb-4">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Pesan Baru</strong> Anda memiliki pesan baru yg belum dibaca, <a href="<?= base_url('pesan'); ?>">klik disini ! untuk buka pesan</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php endif; ?>  
                    <a href="<?= base_url('slider'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-buffer"></i></h1>
                                <h6 class="text-white"><?= $this->db->get_where('posting', ['JenisPos'=>SLIDER])->num_rows(); ?> Data Slider</h6>
                            </div>
                        </div>
                    </a> 
                    <a href="<?= base_url('visimisi'); ?>" class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-check-all"></i></h1>
                                <h6 class="text-white"><?= $this->db->select('p.IdPos')->from('posting p')->where_in('p.JenisPos', [VISI, MISI])->get()->num_rows(); ?> Visi dan Misi</h6>
                            </div>
                        </div>
                    </a>    
                    <a href="<?= base_url('artikel'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-developer-board"></i></h1>
                                <h6 class="text-white"><?= $this->db->get_where('posting', ['JenisPos'=>ARTIKEL])->num_rows(); ?> Artikel</h6>
                            </div>
                        </div>
                    </a>
                    <a href="<?= base_url('pengumuman'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <h6 class="text-white"><?= $this->db->get_where('posting', ['JenisPos'=>PENGUMUMAN])->num_rows(); ?> Pengumuman</h6>
                            </div>
                        </div>
                    </a> 
                    <a href="<?= base_url('galeri'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-google-photos"></i></h1>
                                <h6 class="text-white"><?= $this->db->select('p.IdPos')->from('posting p')->where_in('p.JenisPos', [FOTO, VIDEO])->get()->num_rows(); ?> Galeri</h6>
                            </div>
                        </div>
                    </a>   
                    <a href="<?= base_url('dokumen'); ?>" class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-file-document"></i></h1>
                                <h6 class="text-white"><?= $this->db->get_where('posting', ['JenisPos'=>DOKUMEN])->num_rows(); ?> Dokumen</h6>
                            </div>
                        </div>
                    </a>   
                    <a href="<?= base_url('agenda'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-calendar"></i></h1>
                                <h6 class="text-white"><?= $this->db->get_where('posting', ['JenisPos'=>AGENDA])->num_rows(); ?> Agenda</h6>
                            </div>
                        </div>
                    </a>
                    <a href="<?= base_url('anggota'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                <h6 class="text-white"><?= $this->db->get('anggota')->num_rows(); ?> Guru/Karyawan</h6>
                            </div>
                        </div>
                    </a> 
                    <a href="<?= base_url('pesan'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-message"></i></h1>
                                <h6 class="text-white"><?= $this->db->get_where('pesan')->num_rows(); ?> Pesan dan Saran</h6>
                            </div>
                        </div>
                    </a>
                    <a href="<?= base_url('setting'); ?>" class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-settings"></i></h1>
                                <h6 class="text-white"><?= $this->db->get_where('sistemsetting')->num_rows(); ?> Pengaturan Web</h6>
                            </div>
                        </div>
                    </a>     
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" width="400" height="120"></canvas>
            </div>
            <div class="card-footer">
                <div class="pagging">
                    <nav>
                        <ul class="pagination float-right">
                            <li class="page-item disabled">
                                <span class="page-link">Pilih Bulan Utk Grafik <span class="sr-only">(current)</span></span>
                            </li>
                            <?php for ($i=1; $i <= 12; $i++){
                                if($bulan == $i){
                                    echo '<li class="page-item active">
                                            <span class="page-link">'.$i.'<span class="sr-only">(current)</span></span>
                                        </li>';
                                }else{
                                    echo '<li class="page-item">
                                            <span class="page-link"><a href="'.base_url('home/'.$i).'" data-ci-pagination-page="'.$i.'">'.$i.'</a></span>
                                        </li>';
                                }
                            } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr class="bg-cyan text-white">
                        <td colspan="3"><h5>Laporan Pengunjung</h5></td>
                    </tr>
                    <tr>
                        <td width="42%">Pengunjung Hari Ini</td>
                        <td width="2%">:</td>
                        <td class="text-right"><strong><?php echo $pengunjunghariini ?> orang</strong></td>
                    </tr>
                    <tr>
                        <td width="42%">Total Pengunjung</td>
                        <td width="2%">:</td>
                        <td class="text-right"><strong><?php echo $totalpengunjung ?> orang</strong></td>
                    </tr>
                    <tr>
                        <td width="42%">Pengunjung Online</td>
                        <td width="2%">:</td>
                        <td class="text-right"><strong><?php echo $pengunjungonline ?> orang</strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr class="bg-cyan text-white">
                        <td colspan="3"><h5>Anda Login Sebagai <span class="float-right"><a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModel"><i class="fas fa-cog"></i> Ubah</a></span></h5></td>
                    </tr>
                    <tr>
                        <td width="42%">Nama Lengkap</td>
                        <td width="2%">:</td>
                        <td class="text-right"><strong><?php echo $this->session->userdata('NamaLengkap'); ?></strong></td>
                    </tr>
                    <tr>
                        <td width="42%">No. Telepon</td>
                        <td width="2%">:</td>
                        <td class="text-right"><strong><?php echo $this->session->userdata('Telp'); ?></strong></td>
                    </tr>
                    <tr>
                        <td width="42%">Username</td>
                        <td width="2%">:</td>
                        <td class="text-right"><strong><?php echo $this->session->userdata('Username'); ?></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post" onsubmit="return cek_pass();">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Login</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="NamaLengkap">Nama Lengkap</label>
                                <input type="text" name="NamaLengkap" id="NamaLengkap" class="form-control" required value="<?= $this->session->userdata('NamaLengkap'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="Telp">Nomor Telepon</label>
                                <input type="text" name="Telp" id="Telp" class="form-control number-only" required value="<?= $this->session->userdata('Telp'); ?>">
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="Username" placeholder="masukkan username tanpa spasi" id="Username" class="form-control" required value="<?= $this->session->userdata('Username'); ?>"  autocomplete="new-password"  onkeypress="return AvoidSpace(event)">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password Baru</label>
                                <input type="password" oninput="cek_pass()" name="Password" id="Password" class="form-control" placeholder="masukkan password baru, apabila ingin diubah" autocomplete="new-password">
                                <span class="text-warning"><i>password tidak diubah, apabila tidak diisi</i></span>
                            </div>
                            <div class="form-group">
                                <label for="PasswordConf">Konfirmasi Password Baru</label>
                                <input type="password" oninput="cek_pass()" id="PasswordConf" class="form-control" placeholder="tulis ulang password baru" autocomplete="new-password">
                                <span class="text-danger" id="msg-pass"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
                    <button type="submit" name="btn-submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('dist/js/chart/') ?>Chart.bundle.js"></script>
<script src="<?= base_url('dist/js/chart/') ?>Chart.bundle.min.js"></script>
<script src="<?= base_url('dist/js/chart/') ?>Chart.js"></script>
<script src="<?= base_url('dist/js/chart/') ?>Chart.min.js"></script>
<script>

var namaBulan = '<?= $NamaBulan; ?>';
var ctx = document.getElementById('myChart').getContext('2d');
var dataset = [];
var minvisitor = 1;
var maxvisitor = 0;
var allvisitor = <?php echo sizeof($allvisitor) > 0 ? json_encode($allvisitor) : '[]'; ?>;
var datachart = create_data();

var myBarChart = new Chart(ctx, {
    type: 'line',
    data: datachart,
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: 'Grafik Jumlah Pengunjung Web Bulan '+namaBulan
        },
        fill:false,
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: parseInt(maxvisitor) + 5,
                    min: 0,
                    stepSize: minvisitor
                }
            }]
        }
    }
}); 

function create_data() {
    var data = [];
    var labels = [];
    maxvisitor = 0; 
    minvisitor = 100; 
    for (let i = 0; i < allvisitor.length; i++) {
        const visitor = allvisitor[i];
        if(visitor.JumlahVisitor > maxvisitor){
            maxvisitor = visitor.JumlahVisitor;
        }
        if(visitor.JumlahVisitor < minvisitor){
            minvisitor = visitor.JumlahVisitor;
        }
        data.push(visitor.JumlahVisitor);
        labels.push(visitor.DateFormat);
    }
    return {
        labels: labels,
        datasets: [{
            label: '# Jml Pengunjung',
            data: data,
            borderColor: "#3e95cd",
            fill: false
        }]
    }
}

function cek_pass() {
    const pass = document.getElementById('Password').value;
    const confpass = document.getElementById('PasswordConf').value;
    if(pass !== confpass){
        document.getElementById('msg-pass').innerHTML = "konfirmasi password tidak sesuai";
        return false;
    }else{
        document.getElementById('msg-pass').innerHTML = "";
        return true;
    }
}

</script>