<?php
session_start();
if ( !isset($_SESSION["user"]) ) {
  header("Location: login.php");
}

include('./header.php');
?>


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php

      include('./navigation.php');
      
      navigationList('view_dashboard', $conn);
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <?php include('./navbar.php')?>

        <!-- Begin Page Content -->
        <?php if($_SESSION['user_level'] == 1) { ?>

        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
   
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Equipments</div>
                      <?php
                         $sql = "SELECT * FROM tbl_equipments";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row; ?></div>

                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Engineers</div>
                      <?php
                         $sql = "SELECT * FROM tbl_engineers";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row; ?></div>

                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Foreman</div>
                      <!-- <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div> -->
                      <?php
                         $sql = "SELECT * FROM tbl_foreman";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row; ?></div>
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Clients</div>
                      <?php
                         $sql = "SELECT * FROM tbl_clients";
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row;?></div>
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-xl-3 col-md-6 mb-4"></div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Projects</div>
                      <?php
                        $sql = "SELECT * FROM tbl_projects";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row; ?></div>

                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Contractors</div>
                      <?php
                        $sql = "SELECT * FROM tbl_contractors";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_num_rows($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row; ?></div>

                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row -->
          
          <div class="row">


          <canvas id="myChart"></canvas>


          <!-- Content Row -->

        </div>

        <?php } ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  <?php
    include('./logout-modal.php')
  ?>
    <!-- Page level custom scripts -->
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="./js/script-dashboard.js"></script>
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->


<?php include('./footer.php') ?>