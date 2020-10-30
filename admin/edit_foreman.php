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
      navigationList('view_foreman');
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

            $sql = "SELECT * FROM tbl_foreman WHERE foreman_id = '{$_GET['id']}'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            
            if(!$row){
                echo 'No data found!';
                return false;
            }
            

        ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
          <a href="./view_foreman.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> Edit Foreman</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foreman Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="edit-foreman-form" method="post">
                        <input type="hidden" name="function-type" value="edit-foreman">
                        <input type="hidden" name="foreman-id" value="<?php echo $_GET['id'] ?>">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="foreman-firstname" id="foremanRequired1" placeholder="foreman firstname*" value="<?php echo $row['foreman_firstname'] ?>">
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="foreman-middlename" placeholder="foreman middlename*" id="foremanRequired7" value="<?php echo $row['foreman_middlename'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="foreman-lastname" placeholder="foreman lastname*"  id="foremanRequired8" value="<?php echo $row['foreman_lastname'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="number" class="form-control form-control-user"  name="foreman-age" placeholder="foreman age*" id="foremanRequired2" value="<?php echo $row['foreman_age'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user"  name="foreman-birthdate" placeholder="foreman birthdate*" id="foremanRequired3" value="<?php echo $row['foreman_birthdate'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="foreman-email" placeholder="foreman email*" id="foremanRequired4" value="<?php echo $row['foreman_email'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="number" class="form-control form-control-user"  name="foreman-contact" placeholder="foreman Contact #*" id="foremanRequired5" value="<?php echo $row['foreman_contact_number'] ?>">
                        </div>
                          <div class="col-sm-6 mb-3">
                          <select class="custom-select"  class="form-control form-control-user"  name="foreman-gender" placeholder="foreman gender" id="foremanRequired6" value="<?php echo $row['foreman_gender'] ?>" >
                              <option selected value="">Select Gender *</option>
                                <option value="Male" <?php echo $row['foreman_gender'] == "Male" ? 'selected' : null ?>>Male</option>
                                <option value="Female" <?php echo $row['foreman_gender'] == "Female" ? 'selected' : null ?>>Female</option>
                            </select>
                          </div>
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-edit-foreman-form" class="btn btn-primary btn-user btn-block">
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

  <script src="./js/script-foreman.js"></script>

  </body>
</html>