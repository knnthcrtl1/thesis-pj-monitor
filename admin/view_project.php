
<?php
session_start();
if ( !isset($_SESSION["user"]) ) {
  header("Location: login.php");
}

include('./header.php');
include('./connection.php');


?>
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Projects</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            <?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "Add Project" ) ) {  ?>
            <div class="row">
                
                <div class="col-lg-12">

                <?php
                   $sql = "SELECT * FROM tbl_projects
                   LEFT JOIN tbl_user_handled_projects
                   ON project_id = user_handled_project_project_id
                   AND user_handled_project_engineer_id = '{$_SESSION['user_id']}";
                ?>
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Project Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="add-project-form" method="post">
                        <input type="hidden" name="function-type" value="add-project">
                        <div class="form-group row">
                          <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user"  name="project-name" id="projectRequired6" placeholder="Project name*" >
                          </div>
                        </div>
                      <div class="form-group row">
                        
                        <div class="col-sm-12 mb-3 mb-sm-0">
                          <select class="custom-select"  class="form-control form-control-user"  name="project-contractor-name"  placeholder="Client / Owner*" id="projectRequired1">
                              <option selected value="">Select contractor *</option>
                                
                              <?php
                                include('./connection.php');
                                  $sql = "SELECT * FROM tbl_contractors";
                                  $result = mysqli_query($conn, $sql);
                                  if (mysqli_num_rows($result) != 0){
                                      while($row = mysqli_fetch_assoc($result)) { 
                                  ?>
                                  <option value="<?php echo $row['contractor_id'] ?>"><?php echo $row['contractor_id'] . " - ". $row['contractor_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-address" placeholder="Project Address"  id="projectRequired3">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="number" class="form-control form-control-user"  name="project-telephone" placeholder="Telephone*" id="projectRequired4">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"  name="project-work-location" placeholder="Work location*" id="projectRequired5">
                        </div>
                        <!-- <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="project-issuing-office" placeholder="Issuing office" id="projectRequired6">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-issuing-address" placeholder="Issuing address">
                        </div> -->
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <select class="custom-select"  class="form-control form-control-user"  name="project-client-owner"  placeholder="Client / Owner*" id="projectRequired7">
                              <option selected value="">Select client / owner *</option>
                                
                              <?php
                                include('./connection.php');
                                  $sql = "SELECT * FROM tbl_clients";
                                  $result = mysqli_query($conn, $sql);
                                  if (mysqli_num_rows($result) != 0){
                                      while($row = mysqli_fetch_assoc($result)) { 
                                  ?>
                                  <option value="<?php echo $row['client_id'] ?>"><?php echo $row['client_id'] . " - ". $row['client_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                            <Label>Start Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-start-date" placeholder="Start date*"  id="projectRequired8" >
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <Label>End Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-end-date" placeholder="End date*"  id="projectRequired9">
                        </div>
                        
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-project-form" class="btn btn-primary btn-user btn-block">
                            Submit
                          </button>
                        </div>
                      </div>
                  
                      <hr>
                    </form>
                    </div>
                </div>

                </div>

            </div>

            <?php } ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Project Table</h6>
            </div>
            <div class="card-body">
                                  
              <div class="table-responsive" id="projectTable">
                <table class="table table-bordered" id="projectDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Project Name</th>
                      <th>Contractor Name</th>
                      <th>Address</th>
                      <th>Telephone</th>
                      <th>Work Location</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Client owner</th>
                      <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Project Name</th>
                      <th>Contractor Name</th>
                      <th>Address</th>
                      <th>Telephone</th>
                      <th>Work Location</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Client owner</th>
                      <th>Options</th>
                    </tr>
                  </tfoot>
                 
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
  <!-- Scroll to Top Button-->
  <?php
    include('./logout-modal.php')
  ?>
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script src="./js/script-project.js"></script>

  </body>
</html>