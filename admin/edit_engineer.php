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
      navigationList('view_engineer', $conn);
      checkAuthPage( authPages($_SESSION['user_id'],"",$conn), "Engineer" );
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

            $sql = "SELECT * FROM tbl_engineers WHERE engineer_id = '{$_GET['id']}'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            
            if(!$row){
                echo 'No equipment found!';
                return false;
            }
            

        ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
          <a href="./view_engineer.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> Edit Engineer</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Engineer Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="edit-engineer-form" method="post">
                        <input type="hidden" name="function-type" value="edit-engineer">
                        <input type="hidden" name="engineer-id" value="<?php echo $_GET['id'] ?>">
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="engineer-firstname" id="engineerRequired1" placeholder="Engineer firstname*" value="<?php echo $row['engineer_firstname'] ?>">
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="engineer-middlename" placeholder="Engineer middlename*" id="engineerRequired7" value="<?php echo $row['engineer_middlename'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="engineer-lastname" placeholder="Engineer lastname*"  id="engineerRequired8" value="<?php echo $row['engineer_lastname'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="number" class="form-control form-control-user"  name="engineer-age" placeholder="Engineer age*" id="engineerRequired2" value="<?php echo $row['engineer_age'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user"  name="engineer-birthdate" placeholder="Engineer birthdate*" id="engineerRequired3" value="<?php echo $row['engineer_birthdate'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="engineer-email" placeholder="Engineer email*" id="engineerRequired4" value="<?php echo $row['engineer_email'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="number" class="form-control form-control-user"  name="engineer-contact" placeholder="Engineer Contact #*" id="engineerRequired5" value="<?php echo $row['engineer_contact_number'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <select class="custom-select"  class="form-control form-control-user"  name="engineer-gender" placeholder="Engineer gender" id="engineerRequired6" value="<?php echo $row['engineer_gender'] ?>" >
                              <option selected value="">Select Gender *</option>
                                <option value="Male" <?php echo $row['engineer_gender'] == "Male" ? 'selected' : null ?>>Male</option>
                                <option value="Female" <?php echo $row['engineer_gender'] == "Female" ? 'selected' : null ?>>Female</option>
                            </select>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" class="form-control form-control-user"  name="engineer-salary" placeholder="Salary *" id="engineerRequired9" value="<?php echo $row['engineer_salary']; ?>">
                          </div>
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-edit-engineer-form" class="btn btn-primary btn-user btn-block">
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

  <script src="./js/script-engineer.js"></script>

  </body>
</html>