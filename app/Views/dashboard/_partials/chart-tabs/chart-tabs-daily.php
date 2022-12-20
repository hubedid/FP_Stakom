<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4 card-body ">
        <h1 class="h2 mb-0 text-gray-800 "><b>DASHBOARD</b></h1>
    </div> -->

    <!-- =================================================== TAMBAHAN CHART ========================================= -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="card-title">Income Daily</h6>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                <form class="form-inline">
                        <!--tahun-->
                        <div class="form-group mb-2">
                            <!-- <label class="ml-3">Tahun : </label> -->
                            <select name="minggu" class="form-control ml-2" id="minggu">
                                <option disabled selected>--Pilih Minggu--</option>
                                <?php 
                                for ($i = 0; $i < 4; $i++) { ?>
                                    <option value="<?php echo $i+1 ?>">Minggu ke-<?php echo $i+1 ?></option>
                                <?php } ?>
                            </select>
                            <select name="bulan" class="form-control ml-2" id="bulan">
                                <option disabled selected>--Pilih Bulan--</option>
                                <?php 
                                $month= ["January","February","March","April","May","June","July",
                                "August","September","October","November","December"];
                                for ($i = 0; $i < 12; $i++) { ?>
                                    <option value="<?php echo $i+1 ?>"><?php echo $month[$i] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button id="btn_chart_daily" type="button" class="btn btn-primary mb-2 ml-4"><i class="fas fa-eye"></i> Tampilkan Data</button>
                    </form>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:40vh;">
                            <canvas id="barChartDaily"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    <!-- =================================================== TAMBAHAN CHART ========================================= -->

    <!---------------------------------------->
    <!-- End of Main Content -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- ============ PIE CHART ============ -->

    <script type="text/javascript">
        const data_bar_daily = {
            labels:'',
            datasets: [{
                label: 'TEs',
                data: [],
                backgroundColor:[]
            }]
        };
        const configBarDaily = {
            type: 'polarArea',
            data: data_bar_daily,
            options: {
                maintainAspectRatio: false,
                responsive: true,
                // scales: {
                //     r: {
                //         pointLabels: {
                //             display: true,
                //             centerPointLabels: true,
                //             font: {
                //                 size: 10
                //             }
                //         }
                //     }
                // },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: ''
                    }
                },
            }
        };

        var barChartDaily = new Chart(
            document.getElementById('barChartDaily'),
            configBarDaily
        );
        $('#btn_chart_daily').click(function() {
            var tahun = $('#tahun').val();
            var bulan = $('#bulan').val();
            var minggu = $('#minggu').val();
            $.ajax({
                url: "<?php echo base_url(); ?>/Report/get_data_income_daily",
                method: "POST",
                data: {
                    bulan,
                    tahun,
                    minggu
                },
                dataType: "JSON",
                success: function(result, textStatus, jqXHR) {
                    update_barChartDaily_realisasi(barChartDaily, minggu, result);
                    console.log(result);
                }
            })
        });

        function update_barChartDaily_realisasi(chart, minggu, data) {
            var days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
            let hari = []
            data.forEach(item=>{
                hari.push(days[item.hari-1]);
            })
            
            let income = []
            data.forEach(item=>{
                income.push(item.daily_income);
            })
            const data_bar_daily = {
                labels: hari,
                datasets: [{
                    data: income,
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                }]
            }
            chart.data = data_bar_daily;
            chart.options.plugins.title.text = `Minggu ke-${minggu}`;
            chart.update();
        }

    </script>