<br />
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Latih</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="tbl_latih" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis Lantai Rumah</th>
                    <th>Jenis Dinding Rumah</th>
                    <th>Penerangan Yang Digunakan</th>
                    <th>Pekerjaan Kepala Rumah Tangga</th>
                    <th>Jumlah Penghasilan</th>
                    <th>Kepemilikan Aset</th>
                    <th>Kelayakan</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 0;
            foreach ($data_latih as $latih) { $i++;?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $latih->nama; ?></td>
                    <td><?= $latih->jenis_lantai; ?></td>
                    <td><?= $latih->penerangan; ?></td>
                    <td><?= $latih->pekerjaan_kepala_rumah_tangga; ?></td>
                    <td><?= $latih->jumlah_penghasilan; ?></td>
                    <td><?= $latih->kepemilikan_aset; ?></td>
                    <td><?= $latih->kelayakan; ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Jenis Lantai Rumah</th>
                    <th>Jenis Dinding Rumah</th>
                    <th>Penerangan Yang Digunakan</th>
                    <th>Pekerjaan Kepala Rumah Tangga</th>
                    <th>Jumlah Penghasilan</th>
                    <th>Kepemilikan Aset</th>
                    <th>Kelayakan</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function () {
        $("#tbl_latih").DataTable({
        "responsive": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tbl_latih_wrapper .col-md-6:eq(0)');
    });
</script>