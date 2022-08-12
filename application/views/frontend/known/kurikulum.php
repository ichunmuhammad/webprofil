<section id="content" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2>Kurikulum & Dokumen Umum</h2>
        </div>
        <div class="row">
            <div class="col-lg-12" style="margin-bottom:1px;">
                <form class="card">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="q" value="<?php echo isset($_GET['q']) ? $this->input->get('q') : ""; ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                Telusuri
                            </button>
                        </div>
                    </div>
                </form> 
            </div>
            <div class="col-lg-12">
                <div class="table-responsive card">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="4%">No</th>
                                <th>Nama Dokumen</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($datadokumen): $i = 1;
                                foreach($datadokumen as $dokumen): ?>

                                <tr>
                                    <td><?= $i++; ?>.</td>
                                    <td><?= $dokumen->Judul; ?></td>
                                    <td><a target="_blank" href="<?= base_url('assets/upload/'.$dokumen->IsiPos); ?>" class="btn btn-default"><i class="fa fa-fw fa-download"></i> Unduh</a></td>
                                </tr>

                            <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="3">
                                        <h4>data "<b><?php echo isset($_GET['q']) ? $this->input->get('q') : ""; ?></b>" tidak ditemukan !</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>  
            <div class="col-lg-12" style="margin-top:10px;">
                <?php echo $this->pagination->create_links(); ?> 
            </div>
        </div>
    </div>
</section>