
<?php
session_start();
if ( !isset($_SESSION["user_client"]) ) {
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


      navigationList('', $conn);

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
<div class="d-sm-flex align-items-center justify-content-between mb-4">

  <h1 class="h3 mb-0 text-gray-800">Settings</h1>
</div>

<div class="row">
      
      <div class="col-lg-12">

      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
          </div>
          <div class="card-body">
          <form id="change-password-form" method="post">
            <input type="hidden" name="function-type" value="change-password">
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="hidden" name="password-user-id" id="equipmentRequired3" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="password" class="form-control form-control-user"  name="password" id="equipmentRequired1" placeholder="Enter new password*" >
              </div>
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user"  name="password-retype-password" id="equipmentRequired2" placeholder="Re type new password" >
              </div>
            </div>
            <div class="form-group row d-flex justify-content-center">
              <div class="col-lg-3">
                <button id="submit-change-password-form" class="btn btn-primary btn-user btn-block">
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


<!-- Content Row -->

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

  <script src="js/script-user.js"></script>

  </body>
</html>