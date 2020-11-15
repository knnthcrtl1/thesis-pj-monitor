
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

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Equipments</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
            <div class="row">
                
                <div class="col-lg-12">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Equipment Form</h6>
                    </div>
                    <div class="card-body">
                    <form id="add-equipment-form" method="post">
				              <input type="hidden" name="function-type" value="add-equipment">
                      <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                          <input type="text" class="form-control form-control-user"  name="equipment-name" id="equipmentRequired1" placeholder="Equipment name*" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="number" class="form-control form-control-user"  name="equipment-price" id="equipmentRequired4" placeholder="Equipment price*" >
                        </div>
                        <div class="col-sm-6">
                        <select class="form-control form-control-user"  name="equipment-description" placeholder="Unit of measure" name="equipment-description" id="">
                          <option value="">Select unit of measurement *</option>
                          <option value="AU">AU</option>
                          <option value="LO">LO</option>
                          <option value="M2">M2</option>
                          <option value="PCE">PCE</option>
                          <option value="M">M</option>
                          <option value="M3" > M3</option>
                          <option value="KG"  >KG</option>
                          <option value="SET">SET</option>
                          <option value="UT" >AU</option>
                          <option value="PL">BAG</option>
                          <option value="BAG">BAG</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                          <!-- <select class="custom-select"  class="form-control form-control-user"  name="equipment-project-id" placeholder="Equipment category" id="equipmentRequired2"> -->
                            <!-- <option selected value="">Select Project Name *</option> -->
                            <?php
                              // include('./connection.php');
                              // $sql = "SELECT * FROM tbl_projects";
                              // $result = mysqli_query($conn, $sql);
                              // if (mysqli_num_rows($result) != 0){
                              //   while($row = mysqli_fetch_assoc($result)) { 
                            ?>
                              <!-- <option value="<?php echo $row['project_id']?>"><?php echo $row['project_name'] ?></option> -->
                            <?php
                              //   }
                              // }
                            ?>
                          <!-- </select> -->
                        <!-- </div> -->
                        <div class="col-sm-6 mb-3">
                          <input type="number" class="form-control form-control-user"  name="equipment-count" placeholder="Equipment count *" id="equipmentRequired3">
                        </div>
                        
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-equipment-form" class="btn btn-primary btn-user btn-block">
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
              <div class="table-responsive" id="equipmentTable">
                <table class="table table-bordered" id="equipmentDataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>UM</th>
                      <th>Count</th>
                      <th>Price</th>
                      <th>Total</th>
                      <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>UM</th>
                      <th>Count</th>
                      <th>Price</th>
                      <th>Total</th>
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

  <script src="./js/script-equipment.js"></script>

  </body>
</html>