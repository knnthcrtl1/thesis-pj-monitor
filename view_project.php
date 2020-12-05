
<?php
session_start();
if ( !isset($_SESSION["user_client"]) ) {
  header("Location: login.php");
}

include('./header.php');
include('./connection.php');

?>
  <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                      <th>Telephone</th>
                      <th>Work Location</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Project Name</th>
                      <th>Contractor Name</th>
                      <th>Telephone</th>
                      <th>Work Location</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Option</th>
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
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="admin/js/sb-admin-2.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="admin/js/demo/datatables-demo.js"></script>

  <script src="js/script-project.js"></script>

  </body>
</html>