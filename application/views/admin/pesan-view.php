<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 m-b-10">
                        <a href="<?= base_url('pesan'); ?>" class="btn btn-secondary"><i class="fa fa-fw fa-chevron-left"></i> List Data Pesan/Saran</a>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <tr>
                                <td width="10%">Nama Pengirim</td>
                                <td width="2%">:</td>
                                <td><b><?= $detailpesan['NamaPengirim']; ?></b></td>
                            </tr>
                            <tr>
                                <td>Tgl Pesan</td>
                                <td>:</td>
                                <td><b><?= $this->template->tgl_indo($detailpesan['TglDiterima'], true, true); ?></b></td>
                            </tr>
                            <tr>
                                <td>Email Pengirim</td>
                                <td>:</td>
                                <td><b><?= $detailpesan['Email']; ?></b></td>
                            </tr>
                            <tr>
                                <td>Isi Pesan</td>
                                <td>:</td>
                                <td><b><?= $detailpesan['IsiPesan']; ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>