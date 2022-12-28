<br />
<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <?php 
            // $jumlah_income = 0;
            // $jum = 0;
            // foreach($data_income as $data){
            //     $jumlah_income += $data->income;
            //     $jum += 1;
            //}
            ?>
            <h3><?= $data_count_total[6]->total; ?></h3>
                <p >Total Kasus</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $data_count_layak[6]->total; ?></h3>
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->

                <p>Total Layak</p>
            </div>
            <div class="icon">
                <i class="ion ion-checkmark"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $data_count_nolayak[6]->total; ?></h3>

                <p>Total Tidak Layak</p>
            </div>
            <div class="icon">
                <i class="ion ion-close"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
