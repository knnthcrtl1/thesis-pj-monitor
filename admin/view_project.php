
<?php
session_start();
if ( !isset($_SESSION["user"]) ) {
  header("Location: login.php");
}

include('./header.php');
?>
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Projects</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Project Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="add-project-form" method="post">
                        <input type="hidden" name="function-type" value="add-project">
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-contractor-name" id="projectRequired1" placeholder="Contractor name" >
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="project-agreement-details" placeholder="Agreement details" id="projectRequired2" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-address" placeholder="Project Address"  id="projectRequired3">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="project-telephone" placeholder="Telephone*" id="projectRequired4">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"  name="project-work-location" placeholder="Work location*" id="projectRequired5">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="project-issuing-office" placeholder="Issuing office" id="projectRequired6">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-issuing-address" placeholder="Issuing address">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="project-client-owner" placeholder="Client / Owner*" id="projectRequired7">
                        </div>
                      </div>

                      <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                            <Label>Start Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-start-date" placeholder="Start date*" >
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <Label>End Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-end-date" placeholder="End date*" >
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" id="projectTable">
                <table class="table table-bordered" id="projectDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Contractor Name</th>
                      <th>Address</th>
                      <th>Telephone</th>
                      <th>Work Location</th>
                      <th>Issuing Office</th>
                      <th>Issuing Address</th>
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
                      <th>Contractor Name</th>
                      <th>Address</th>
                      <th>Telephone</th>
                      <th>Work Location</th>
                      <th>Issuing Office</th>
                      <th>Issuing Address</th>
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