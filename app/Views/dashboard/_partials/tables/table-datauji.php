<br />
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Latih</h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Lantai Rumah</th>
                    <th>Jenis Dinding Rumah</th>
                    <th>Penerangan Yang Digunakan</th>
                    <th>Pekerjaan Kepala Rumah Tangga</th>
                    <th>Jumlah Penghasilan</th>
                    <th>Kepemilikan Aset</th>
                    <th>Kelayakan Asli</th>
                    <th>Kelayakan Prediksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 0;
            $benar = 0;
            $salah = 0;
            foreach ($data_uji as $latih) { $i++;?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $latih->nama; ?></td>
                    <td><?= $latih->jenis_lantai; ?></td>
                    <td><?= $latih->jenis_dinding; ?></td>
                    <td><?= $latih->penerangan; ?></td>
                    <td><?= $latih->pekerjaan_kepala_rumah_tangga; ?></td>
                    <td><?= $latih->jumlah_penghasilan; ?></td>
                    <td><?= $latih->kepemilikan_aset; ?></td>
                    <td><?= $latih->kelayakan; ?></td>
                    <?php
                        $lantai = $latih->jenis_lantai;
                        $dinding = $latih->jenis_dinding;
                        $penerangan = $latih->penerangan;
                        $pekerjaan = $latih->pekerjaan_kepala_rumah_tangga;
                        $penghasilan = $latih->jumlah_penghasilan;
                        $aset = $latih->kepemilikan_aset;
                        $prob_layak = $data_perhitungan[0]->$lantai->layak * $data_perhitungan[1]->$dinding->layak * $data_perhitungan[2]->$penerangan->layak * $data_perhitungan[3]->$pekerjaan->layak * $data_perhitungan[4]->$penghasilan->layak * $data_perhitungan[5]->$aset->layak * ($data_count_layak[6]->total / $data_count_total[6]->total);
                        $prob_nolayak = $data_perhitungan[0]->$lantai->nolayak * $data_perhitungan[1]->$dinding->nolayak * $data_perhitungan[2]->$penerangan->nolayak * $data_perhitungan[3]->$pekerjaan->nolayak * $data_perhitungan[4]->$penghasilan->nolayak * $data_perhitungan[5]->$aset->nolayak * ($data_count_nolayak[6]->total / $data_count_total[6]->total);
                    ?>
                    <td><?= ($prob_layak > $prob_nolayak) ? "Layak" : "Tidak Layak" ?></td>
                    <td><?= ((($prob_layak > $prob_nolayak) ? "Layak" : "Tidak Layak") == $latih->kelayakan) ? "Benar" : "Salah" ?></td>
                    <?php ((((($prob_layak > $prob_nolayak) ? "Layak" : "Tidak Layak") == $latih->kelayakan) ? "Benar" : "Salah") == "Benar") ? $benar++ : $salah++; ?>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Nama Orang</th>
                    <th>Jenis Lantai Rumah</th>
                    <th>Jenis Dinding Rumah</th>
                    <th>Penerangan Yang Digunakan</th>
                    <th>Pekerjaan Kepala Rumah Tangga</th>
                    <th>Jumlah Penghasilan</th>
                    <th>Kepemilikan Aset</th>
                    <th>Kelayakan Asli</th>
                    <th>Kelayakan Prediksi</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- <div class="card"> -->
    <h1>Akurasi : <?= round((($benar/($benar + $salah)) * 100), 2) . '%';?> </h1>
<!-- </div> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
</script>