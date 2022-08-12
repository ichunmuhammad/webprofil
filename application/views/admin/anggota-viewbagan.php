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
            $result .= "<li style='padding-top:6px;'><h6>{$row->NamaLengkap}</h6>{$row->NamaJabatan}";
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
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link pl-4 pr-4" href="<?= base_url('anggota'); ?>" tabindex="-1">Data Guru/Karyawan</a>
                </li>
                <li class="page-item">
                    <a class="page-link pl-4 pr-4" href="<?= base_url('jabatan'); ?>" tabindex="-1">Mst. Jabatan</a>
                </li>
                <li class="page-item active">
                    <a class="page-link pl-4 pr-4" href="#" tabindex="-1">Bagan Struktur Organisasi<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col-lg-12 m-t-10">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">  
                        <div class="bg-secondary p-b-20" id="bagan">
                            <div class="p-l-10 p-r-20 p-t-20 p-b-10 text-center">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>