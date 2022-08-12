<?php
$tingkat = 0;
//untuk mendapatkan menu
function has_children($rows, $id) {
    foreach ($rows as $row) {
        if ($row->KodeJabatanAtas == $id)
            return true;
    }
    return false;
}

function build_menu($tingkat, $rows, $parent = 0) {
    $tingkat += 1;
    if ($tingkat >= 3) {
        $result = "<ul type=\"vertical\">";
    } else {
        $result = "<ul>";
    }
    foreach ($rows as $row) {
        if ($row->KodeJabatanAtas == $parent) {
            $result .= "<li style='padding-top:2px;'><h6>{$row->NamaLengkap}</h6>{$row->NamaJabatan}";
            if (has_children($rows, $row->KodeJabatan))
                $result .= build_menu($tingkat, $rows, $row->KodeJabatan);
            $result .= "</li>";
        }
    }
    $result .= "</ul>";

    return $result;
}
?>

<link href="<?= base_url('assets/') ?>orgchart/orgchart.css" rel="stylesheet" type="text/css"/>

<style>
    .table-fixed tr {display: block; }
    .table-fixed th, .table-fixed td { width: 300px; }
    .table-fixed tbody { display: block; height: 400px; overflow: auto;} 
</style>

<script type="text/javascript" src="<?= base_url('assets/') ?>orgchart/orgchart.js"></script>
<script>
    $(document).ready(function () {
        // create a tree
        $("#tree-data").jOrgChart({
            chartElement: $("#tree-view"),
            nodeClicked: nodeClicked
        });

        // lighting a node in the selection
        function nodeClicked(node, type) {
            node = node || $(this);
            $('.jOrgChart .selected').removeClass('selected');
            node.addClass('selected');
        }
    });
</script>
<!-- CONTACT -->
<section id="content" class="bggrey">
    <div class="container">
        <div class="feature" style="margin-bottom:10px;">
            <h2 class="text-center">Data Guru dan Struktur Organisasi <?php echo isset($namaweb) ? $namaweb->Value : "web profil sekolah"; ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-8 bggreen" style="padding-top:20px; padding-bottom:20px;">
                <center>
                    <ul id="tree-data" style="display:none">
                        <li id="root" style="background-color: lightgrey;">
                            <b>Struktir Organisasi</b>
                            <?php echo build_menu($tingkat, $dataanggota); ?>
                        </li>
                    </ul>
                    <div id="tree-view"></div>
                </center>	
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <table class="table table-striped table-fixed">
                        <thead>
                            <tr class="bggreen">
                                <th><h4 style="color: #ffffff !important;">Nama<span style="float:right;">Jabatan</span></h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($dataanggota):
                                foreach($dataanggota as $anggota): ?>

                                <tr>
                                    <td>
                                        <h6>
                                            <?= $anggota->NamaLengkap; ?> <span style="float:right;"><?= $anggota->NamaJabatan; ?></span>
                                        </h6>
                                    </td>
                                </tr>

                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> 