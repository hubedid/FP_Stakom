<br />
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <?php 
            ?>
            <h3><?= $data_akurasi[0]->benar + $data_akurasi[0]->salah; ?></h3>
                <p >Total Data Uji</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $data_akurasi[0]->benar; ?></h3>
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->

                <p>Status Benar</p>
            </div>
            <div class="icon">
                <i class="ion ion-checkmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $data_akurasi[0]->salah; ?></h3>

                <p>Status Salah</p>
            </div>
            <div class="icon">
                <i class="ion ion-close"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $data_akurasi[0]->akurasi; ?></h3>

                <p>Akurasi</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
