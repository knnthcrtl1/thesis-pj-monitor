<?php
session_start();
if ( !isset($_SESSION["user"]) ) {
  header("Location: login.php");
}
include('./header.php');

include('./connection.php');


?>


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include('./navigation.php');
      navigationList('view_client', $conn);
      checkAuthPage( authPages($_SESSION['user_id'],"",$conn), "Client" );
      
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

            $sql = "SELECT * FROM tbl_clients WHERE client_id = '{$_GET['id']}'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            
            if(!$row){
                echo 'No data found!';
                return false;
            }
            

        ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
          <a href="./view_client.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> Edit client</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Client Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="edit-client-form" method="post">
                        <input type="hidden" name="function-type" value="edit-client">
                        <input type="hidden" name="client-id" value="<?php echo $_GET['id'] ?>">
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="client-name" id="clientRequired1" placeholder="Name*" value="<?php echo $row['client_name']; ?>">
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="client-address" placeholder="Address*" id="clientRequired2" value="<?php echo $row['client_address']; ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="client-email" placeholder="Email*" id="clientRequired3" value="<?php echo $row['client_email']; ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="number" class="form-control form-control-user"  name="client-contact" placeholder="Contact #*" id="clientRequired4" value="<?php echo $row['client_telephone']; ?>">
                        </div>
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-edit-client-form" class="btn btn-primary btn-user btn-block">
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

  <script src="./js/script-client.js"></script>

  </body>
</html>