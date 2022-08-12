<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('pesan/'); ?>" method="get">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" name="q" id="q" placeholder="cari data disini" class="form-control" value="<?php echo isset($_GET['q']) ? $this->input->get('q') : ""; ?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-fw fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 mt-2"> 
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th width="4%">New</th>
                                        <th width="14%">Tgl Pesan</th>
                                        <th width="14%">Nama Pengirim</th>
                                        <th width="12%">Email</th>
                                        <th>Isi Pesan</th>
                                        <th class="text-right" width="5%">##</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($datapesan):
                                    foreach($datapesan as $pesan): ?>

                                    <tr>
                                        <td><?php echo $pesan->IsDibaca !== '1' ? '<span class="badge badge-pill badge-success text-white"><i class="fa fa-fw fa-check"></i>&nbsp;</span>' : '<span class="badge badge-pill badge-secondary text-black"><i class="fa fa-fw fa-minus"></i>&nbsp;</span>'; ?></td>
                                        <td><?= $this->template->tgl_indo($pesan->TglDiterima, true, true); ?></td>
                                        <td><?= $pesan->NamaPengirim; ?></td>
                                        <td><?= $pesan->Email; ?></td>
                                        <td><?= word_limiter($pesan->IsiPesan, 14); ?></td>
                                        <td class="text-right">
                                            <a href="<?= base_url('pesan/view/'.$pesan->Enc); ?>" class="btn btn-primary"><i class="fa fa-fw fa-eye"></i>&nbsp;</a>
                                        </td>
                                    </tr>

                                <?php endforeach; 
                                else: ?>

                                    <tr>
                                        <td colspan="5"><i>tidak ada data !</i></td>
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