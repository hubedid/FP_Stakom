<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Sales
        </h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab"><?php print_r($data_income) ?></a>
                </li>
            </ul>
        </div>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
            </div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
            </div>
        </div>
    </div><!-- /.card-body -->
</div>

<?php if($i==1){echo "Januari";}else if($i == 2){echo "Februari";}else if($i == 3){echo "Maret";}else if($i == 4){echo "April";}else if($i == 5){echo "Mei";}else if($i == 6){echo "Juni";}else if($i == 7){echo "Juli";}else if($i == 8){echo "Agustus";}else if($i == 9){echo "September";}else if($i == 10){echo "Oktober";}else if($i == 11){echo "November";}else if($i == 12){echo "Desember";}?></option>
