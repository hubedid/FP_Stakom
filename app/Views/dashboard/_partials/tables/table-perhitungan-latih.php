<br />
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Perhitungan Data Latih</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" valign="center">No. </th>
                    <th rowspan="2" class="text-center">Jenis Atribut</th>
                    <th rowspan="2" class="text-center">Jenis Kelas</th>
                    <th colspan="3" class="text-center">Jumlah Kasus</th>
                    <th colspan="4" class="text-center">Probabilitas</th>
                </tr>
                <tr>
                    <th class="text-center">Total</th>
                    <th class="text-center">Layak</th>
                    <th class="text-center">Tidak Layak</th>
                    <th class="text-center">X / Layak</th>
                    <th class="text-center">Smoothing X / Layak</th>
                    <th class="text-center">X / Tidak Layak</th>
                    <th class="text-center">Smoothing X / Tidak Layak</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 0;
                $j = -1;
                $temp = " ";
                foreach ($data_kelas as $kelas) { $i++;?>
                    <tr>
                        <td><?= $i; ?></td>
                        <?php 
                            if($temp != $kelas->nama_atribut){ $j++; ?>
                                <td><?= $kelas->nama_atribut; ?></td> 
                            <?php }else{?>
                                <td> </td> 
                            <?php } 
                            $temp = $kelas->nama_atribut;
                            $nama_kelas = $kelas->nama_kelas;
                        ?>
                        <td><?= $nama_kelas; ?></td>
                        <td class="text-center"><?= $data_count_total[$j]->$nama_kelas; ?></td>
                        <td class="text-center"><?= $data_count_layak[$j]->$nama_kelas; ?></td>
                        <td class="text-center"><?= $data_count_nolayak[$j]->$nama_kelas; ?></td>
                        <td class="text-center"><?= $data_count_layak[$j]->$nama_kelas; ?>/<?= $data_count_layak[6]->total; ?></td>
                        <td class="text-center"><?= (int)$data_count_layak[$j]->$nama_kelas + 1; ?>/<?php $arrObject = new ArrayObject($data_count_layak[$j]); echo (int)$data_count_layak[6]->total + $arrObject->count(); ?></td>
                        <td class="text-center"><?= $data_count_nolayak[$j]->$nama_kelas; ?>/<?= $data_count_nolayak[6]->total; ?></td>
                        <td class="text-center"><?= (int)$data_count_nolayak[$j]->$nama_kelas + 1; ?>/<?php $arrObject = new ArrayObject($data_count_nolayak[$j]); echo (int)$data_count_nolayak[6]->total + $arrObject->count(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function () {
        $("#example2").DataTable({
        "responsive": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>