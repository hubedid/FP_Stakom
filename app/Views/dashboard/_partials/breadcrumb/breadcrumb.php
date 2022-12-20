<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Selamat Datang <?php echo $data_user[0]->fullname ?> !</h1>
                
                <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <form class="form-inline">
                        <!--tahun-->
                        <div class="form-group mb-2">
                            <!-- <label class="ml-3">tahun : </label> -->
                            <select name="tahun" class="form-control ml-2" id="tahun">
                                <option disabled selected>--Pilih Tahun--</option>
                                <?php $tahun = date('Y');
                                for ($i = 2020; $i < $tahun + 1; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button id="btn_tampil" type="button" class="btn btn-primary mb-2 ml-4"><i class="fas fa-eye"></i> Tampilkan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
