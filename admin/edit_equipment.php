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
      navigationList('view_equipment');
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

            $sql = "SELECT * FROM tbl_equipments WHERE equipment_id = '{$_GET['id']}'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            
            if(!$row){
                echo 'No equipment found!';
                return false;
            }
            

        ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
          <a href="javascript:history.back()"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> Edit Equipment</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Equipment Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="edit-equipment-form" method="post">
                        <input type="hidden" name="function-type" value="edit-equipment">
                        <input type="hidden" name="equipment-id" value="<?php echo $_GET['id'] ?>">
                      <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="equipment-name" id="equipmentRequired1" placeholder="Equipment name*" value="<?php echo $row['equipment_name']; ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="number" class="form-control form-control-user"  name="equipment-price" id="equipmentRequired4" placeholder="Equipment price*" value="<?php echo $row['equipment_price']; ?>" >
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="equipment-description" placeholder="Equipment uses / description" value="<?php echo $row['equipment_description']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <select class="custom-select"  class="form-control form-control-user"  name="equipment-project-id" placeholder="Equipment category" id="equipmentRequired2" >
                            <option >Select project name *</option>
                            <?php
                              include('./connection.php');
                              $sql2 = "SELECT * FROM tbl_projects";
                              $result2 = mysqli_query($conn, $sql2);
                              if (mysqli_num_rows($result2) != 0){
                                while($row2 = mysqli_fetch_assoc($result2)) { 
                            ?>
                              <option value="<?php echo $row2['project_id']?>" <?php echo ($row2['project_id'] == $row['equipment_project_id']) ? 'selected' : null; ?> ><?php echo $row2['project_name'] ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-sm-6 mb-3">
                          <input type="number" class="form-control form-control-user"  name="equipment-count" placeholder="Equipment count *" id="equipmentRequired3" value="<?php echo $row['equipment_count']; ?>">
                        </div>
                        
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-edit-equipment-form" class="btn btn-primary btn-user btn-block">
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

  <script src="./js/script-equipment.js"></script>

  </body>
</html>