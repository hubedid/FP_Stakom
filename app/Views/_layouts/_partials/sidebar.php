<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://www.upnjatim.ac.id/wp-content/uploads/2018/05/logoupnbaru.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UAS STAKOM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $data_user[0]->img ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info" text-align="center">
                <a href="#" class="d-block"><?php echo $data_user[0]->fullname ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" <?php 
                    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
                    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
                    if(base_url().'/' == $CurPageURL){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}
                    ?>>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/report" <?php 
                    if(base_url().'/report' == $CurPageURL){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}
                    ?>>
                        <i class="nav-icon fas fa-chart-bar"></i>
                        
                        <p>
                            Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-latih" <?php 
                    if(base_url().'/data-latih' == $CurPageURL){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}
                    ?>>
                        <i class="nav-icon fas fa-map"></i>
                        
                        <p>
                            Data Latih
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/data-uji" <?php 
                    if(base_url().'/data-uji' == $CurPageURL){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}
                    ?>>
                        <i class="nav-icon fas fa-map"></i>
                        
                        <p>
                            Data Uji
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/perhitungan-data-latih" <?php 
                    if(base_url().'/perhitungan-data-latih' == $CurPageURL){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}
                    ?>>
                        <i class="nav-icon fas fa-map"></i>
                        
                        <p>
                            Perhitungan Data Latih
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" <?php 
                    if(base_url().'/logout' == $CurPageURL){echo 'class="nav-link active"';}else{echo 'class="nav-link"';}
                    ?> onclick="return confirm('Are you sure?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>