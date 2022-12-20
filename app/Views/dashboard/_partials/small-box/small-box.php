<div class="row">
    <div class="col-lg-6 col-6">
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
            <h3 id="mean_income">Rp. 0</h3>
                <p >Mean Income</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3 id="increase">Rp. 0</h3>
                <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->

                <p>Increased Revenue</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<script type="text/javascript">
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
</script>