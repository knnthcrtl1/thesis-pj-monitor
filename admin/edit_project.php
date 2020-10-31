<?php
session_start();
if ( !isset($_SESSION["user"]) ) {
  header("Location: login.php");
}
include('./connection.php');
include('./header.php');
?>


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include('./navigation.php');
      navigationList('view_project');
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
          <a href="./view_project.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> Edit Project</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Project Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="edit-project-form" method="post">
                        <input type="hidden" name="function-type" value="edit-project">
                        <input type="hidden" name="project-id" value="<?php echo $_GET['id'] ?>">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-contractor-name" id="projectRequired1" placeholder="Contractor name" value="<?php echo $row['project_contractor_name'] ?>" >
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="project-agreement-details" placeholder="Agreement details" id="projectRequired2" value="<?php echo $row['project_agreement_details'] ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-address" placeholder="Project Address"  id="projectRequired3" value ="<?php echo $row['project_address'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="project-telephone" placeholder="Telephone*" id="projectRequired4" value="<?php echo $row['project_telephone'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"  name="project-work-location" placeholder="Work location*" id="projectRequired5" value="<?php echo $row['project_work_location'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="project-issuing-office" placeholder="Issuing office" id="projectRequired6" value="<?php echo $row['project_issuing_office']; ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-issuing-address" placeholder="Issuing address" value="<?php echo $row['project_issuing_addres'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-client-owner" placeholder="project / Owner*" id="projectRequired7" value="<?php echo $row['project_client_owner'] ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                            <Label>Start Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-start-date" placeholder="Start date*" value="<?php echo $row['project_start_date'] ?>" >
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <Label>End Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-end-date" placeholder="End date*" value="<?php echo $row['project_end_date'] ?>">
                        </div>
                        
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-edit-project-form" class="btn btn-primary btn-user btn-block">
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

  <script src="js/sb-admin-2.min.js"></script>

  <script src="./js/script-project.js"></script>

  </body>
</html>