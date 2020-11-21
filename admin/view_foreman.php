
<?php
session_start();
if ( !isset($_SESSION["user"]) ) {
  header("Location: login.php");
}

include('./header.php');
// include('./functions/functions.php');
// checkAuthPage( authPages($_SESSION['user_id'],"",$conn), "Foreman" );

?>
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include('./navigation.php');
      navigationList('view_foreman', $conn);

      checkAuthPage( authPages($_SESSION['user_id'],"",$conn), "Foreman" );
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
          <h1 class="h3 mb-4 text-gray-800">Foreman</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foreman Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="add-foreman-form" method="post">
                        <input type="hidden" name="function-type" value="add-foreman">
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="foreman-firstname" id="foremanRequired1" placeholder="foreman firstname*" >
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="foreman-middlename" placeholder="foreman middlename*" id="foremanRequired7" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="foreman-lastname" placeholder="foreman lastname*"  id="foremanRequired8">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="number" class="form-control form-control-user"  name="foreman-age" placeholder="foreman age*" id="foremanRequired2">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user"  name="foreman-birthdate" placeholder="foreman birthdate*" id="foremanRequired3">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="foreman-email" placeholder="foreman email*" id="foremanRequired4">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="number" class="form-control form-control-user"  name="foreman-contact" placeholder="foreman Contact #*" id="foremanRequired5">
                        </div>
                          <div class="col-sm-6 mb-3">
                          <select class="custom-select"  class="form-control form-control-user"  name="foreman-gender" placeholder="foreman gender" id="foremanRequired6">
                              <option selected value="">Select Gender *</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                          </div>
                      </div>
                      

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-foreman-form" class="btn btn-primary btn-user btn-block">
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
              <div class="table-responsive" id="foremanTable">
                <table class="table table-bordered" id="foremanDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Firstname</th>
                      <th>Middlane</th>
                      <th>Lastname</th>
                      <th>Age</th>
                      <th>Birthdate</th>
                      <th>Email</th>
                      <th>Contact #</th>
                      <th>Gender</th>
                      <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Firstname</th>
                      <th>Middlane</th>
                      <th>Lastname</th>
                      <th>Age</th>
                      <th>Birthdate</th>
                      <th>Email</th>
                      <th>Contact #</th>
                      <th>Gender</th>
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

  <script src="./js/script-foreman.js"></script>

  </body>
</html>