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
                <p >Total Data Latih</p>
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
                <h3><?= $data_akurasi[0]->benar + $data_akurasi[0]->salah; ?></h3>
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->

                <p>Total Data Uji</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
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

<!-- <script type="text/javascript">
    function convertToRupiah(angka){
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    }
    function update_mean(data){
        let sum_income = 0;
        let jum = 0;
        data.forEach(item=>{
            sum_income += parseInt(item.income);
            jum += 1;
        })
        console.log(sum_income/jum);
        document.getElementById("mean_income").innerHTML = convertToRupiah(sum_income/jum);

    }
    function update_increase(data){
        let income = [];
        let jum = 0;
        data.forEach(item=>{
            income.push(parseInt(item.income));
            jum += 1;
        })
        console.log(income[jum-1]);
        document.getElementById("increase").innerHTML = convertToRupiah(income[jum-1]-income[jum-2]);

    }
</script> -->