<?php
session_start();
if ( !isset($_SESSION["user_client"]) ) {
  header("Location: login.php");
}
include('./header.php');

include('./connection.php');
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include('./navigation.php');
      navigationList('view_project', $conn);
      
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include('./navbar.php')?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php 

            if(!$_GET['id']){
                echo 'Please input an parameter id on the link ';
                return false;
            }

            $sql = "SELECT * FROM tbl_projects WHERE project_id = '{$_GET['id']}'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            
            if(!$row){
                echo 'No data found!';
                return false;
            }
            

        ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
          <a href="./view_project.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> Project</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
          
        <input type="hidden" id="editProjectId" value=<?php echo $_GET['id']; ?> />

            <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Engineers</h6>
                </div>
                <div class="card-body">
                 
                  
                    <div class="table-responsive" id="engineerProjectTable">
                  <table class="table table-bordered" id="engineerProjectDataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Engineer ID - Name</th>
                      
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                      <th>ID</th>
                        <th>Engineer ID - Name</th>
                      </tr>
                    </tfoot>
                  
                  </table>
                  
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                    </div>
                   
                  </div>

                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Foreman</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="foremanProjectTable">
                    <table class="table table-bordered" id="foremanProjectDataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Foreman ID - Name</th>
                      
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                      <th>ID</th>
                        <th>Foreman ID Name</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                    </div>
                  </div>

            </div>
          </div>
         

        </div>
        <!-- /.container-fluid -->

      </div>
      <div class="row">
          <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Equipments</h6>
                </div>
                <div class="card-body">

              
                <div class="table-responsive" id="equipmentTable">
                  <table class="table table-bordered" id="equipmentDataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>UM</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                      
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>UM</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                      
                      </tr>
                    </tfoot>
                 
                    </table>
                  </div>          
                  <div class="row">
                    <div class="col-lg-6 mb-4">
                    </div>
                    <div class="col-lg-6 mb-4 text-right ">
                      <div style="font-weight:bold;">TOTAL: <span id="totalEquipmentPrice">0</span></div>
                    </div>
                  </div>
                </div>
            </div>

          </div>
          <div class="col-lg-12 mb-4">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
                </div>
                <div class="card-body">

                <div class="row ">
                    <div class="col-lg-4 mb-4">
                      <div class="card  mb-4">

                        <div class="card-header py-3">

                          <h6 class="m-0 font-weight-bold text-primary">To Do</h6>
                        </div>
                            <div class="card-body">
                              <div id="tasksTodoColumn"></div>
                          </div>
                      </div>

                    </div>

                    <div class="col-lg-4 mb-4">
                      <div class="card  mb-4">

                        <div class="card-header py-3">

                          <h6 class="m-0 font-weight-bold text-primary">In Progress</h6>
                        </div>
                        <div class="card-body">
                          <div id="tasksInProgressColumn"></div>
                        </div>
                      </div>

                    </div>

                    <div class="col-lg-4 mb-4">
                      <div class="card  mb-4">

                        <div class="card-header py-3">

                          <h6 class="m-0 font-weight-bold text-primary">Done</h6>
                        </div>
                        <div class="card-body">
                        <div id="tasksDoneColumn"></div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
            </div>
            
          </div>
          
      <!-- End of Main Content -->
      
  <!-- Scroll to Top Button-->
  <?php
    include('./logout-modal.php')
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="admin/js/sb-admin-2.min.js"></script>

  <script src="js/script-edit-project.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
  </body>
</html>