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
                    <h6 class="m-0 font-weight-bold text-primary">Project Details</h6>
                    </div>
                    <div class="card-body">
                    <form id="edit-project-form" method="post">
                        <input type="hidden" name="function-type" value="edit-project">
                        <input type="hidden" name="project-id" id="editProjectId" value="<?php echo $_GET['id'] ?>">
                        <div class="form-group row">
                          <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user"  name="project-name" id="projectRequired6" placeholder="Project name*" value="<?php echo $row['project_name'] ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="custom-select"  class="form-control form-control-user"  name="project-contractor-name"  placeholder="Client / Owner*" id="projectRequired1">
                            <option selected value="">Select contractor *</option>
                              <?php
                                include('./connection.php');
                                  $sql3 = "SELECT * FROM tbl_contractors";
                                  $result3 = mysqli_query($conn, $sql3);
                                  if (mysqli_num_rows($result3) != 0){
                                      while($row3 = mysqli_fetch_assoc($result3)) { 
                                  ?>
                                  <option value="<?php echo $row3['contractor_id'] ?>" <?php echo ($row3['contractor_id'] === $row['project_contractor_name']) ? 'selected' : null; ?>><?php echo $row3['contractor_id'] . " - ". $row3['contractor_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                          </select>
                          <!-- <input type="text" class="form-control form-control-user"  name="project-contractor-name" id="projectRequired1" placeholder="Contractor name" value="<?php echo $row['project_contractor_name'] ?>" > -->
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
                          <input type="number" class="form-control form-control-user"  name="project-telephone" placeholder="Telephone*" id="projectRequired4" value="<?php echo $row['project_telephone'] ?>">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"  name="project-work-location" placeholder="Work location*" id="projectRequired5" value="<?php echo $row['project_work_location'] ?>">
                        </div>
                      
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="custom-select"  class="form-control form-control-user"  name="project-client-owner"  placeholder="Client / Owner*" id="projectRequired7">
                              <option selected value="">Select client / owner *</option>
                              <?php
                                include('./connection.php');
                                  $sql2 = "SELECT * FROM tbl_clients";
                                  $result2 = mysqli_query($conn, $sql2);
                                  if (mysqli_num_rows($result2) != 0){
                                      while($row2 = mysqli_fetch_assoc($result2)) { 
                                  ?>
                                  <option value="<?php echo $row2['client_id'] ?>" <?php echo ($row2['client_id'] === $row['project_client_owner']) ? 'selected' : null; ?>><?php echo $row2['client_id'] . " - ". $row2['client_name']; ?></option>
                                <?php
                                    }
                                  }
                                ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                            <Label>Start Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-start-date" placeholder="Start date*" value="<?php echo $row['project_start_date'] ?>" id="projectRequired8" >
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <Label>End Date</Label>
                          <input type="date" class="form-control form-control-user"  name="project-end-date" placeholder="End date*" value="<?php echo $row['project_end_date'] ?>" id="projectRequired9">
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

            <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Engineers</h6>
                </div>
                <div class="card-body">
                  <form id="add-engineer-in-project-form" method="post">
                  <div>
                  <input type="hidden" name="add-engineer-project-id" value="<?php echo $_GET['id'] ?>">
                  <input type="hidden" name="function-type" value="add-engineer-in-project">
                  <input type="hidden" name="add-user-type" value="Engineer">
                  <select class="custom-select"  class="form-control form-control-user"  name="engineer-add-project"  placeholder="Engineer" id="engineerProjectRequired1">
                          <option selected value="">Select engineer</option>
                        <?php
                          include('./connection.php');
                            $sql = "SELECT * FROM tbl_engineers";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) != 0){
                                while($row = mysqli_fetch_assoc($result)) { 
                            ?>
                            <option value="<?php echo $row['engineer_id'] ?>"><?php echo $row['engineer_id'] . " - ". $row['engineer_firstname'] . " " . $row['engineer_lastname']; ?></option>
                          <?php
                              }
                            }
                          ?>
                    </select>
                  </div>
                 

                    <div class="d-flex justify-content-center" style="margin:0 auto;margin-top: 15px;">
                        <div class="col-lg-3">
                          <button id="submit-add-engineer-in-project-form" class="btn btn-primary btn-user btn-block mb-4 ">
                            Submit
                          </button>
                        </div>
                      </div>
                    </form> 

                    
                  
                    <div class="table-responsive" id="engineerProjectTable">
                  <table class="table table-bordered" id="engineerProjectDataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Engineer ID - Name</th>
                        <th>Options</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                      <th>ID</th>
                        <th>Contractor Name</th>
                        <th>Options</th>
                      </tr>
                    </tfoot>
                  
                  </table>
                </div>

                </div>
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Foreman</h6>
                </div>
                <div class="card-body">
                <form id="add-foreman-in-project-form" method="post">
                  <div>
                  <input type="hidden" name="add-engineer-project-id" value="<?php echo $_GET['id'] ?>">
                  <input type="hidden" name="function-type" value="add-engineer-in-project">
                  <input type="hidden" name="add-user-type" value="Foreman">
                  <select class="custom-select"  class="form-control form-control-user"  name="engineer-add-project"  placeholder="Foreman" id="foremanProjectRequired1">
                          <option selected value="">Select foreman</option>
                        <?php
                          include('./connection.php');
                            $sql = "SELECT * FROM tbl_foreman";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) != 0){
                                while($row = mysqli_fetch_assoc($result)) { 
                            ?>
                            <option value="<?php echo $row['foreman_id'] ?>"><?php echo $row['foreman_id'] . " - ". $row['foreman_firstname'] . " " . $row['foreman_lastname']; ?></option>
                          <?php
                              }
                            }
                          ?>
                    </select>
                  </div>
                 

                    <div class="d-flex justify-content-center" style="margin:0 auto;margin-top: 15px;">
                        <div class="col-lg-3">
                          <button id="submit-add-foreman-in-project-form" class="btn btn-primary btn-user btn-block mb-4 ">
                            Submit
                          </button>
                        </div>
                      </div>
                    </form> 

                    
                  
                    <div class="table-responsive" id="foremanProjectTable">
                    <table class="table table-bordered" id="foremanProjectDataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Foreman ID - Name</th>
                        <th>Options</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                      <tr>
                      <th>ID</th>
                        <th>Contractor Name</th>
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
      <div class="row">
          <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Equipments</h6>
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
                          <input type="text" class="form-control form-control-user"  name="equipment-price" id="equipmentRequired4" placeholder="Equipment price*" >
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control form-control-user"  name="equipment-description" placeholder="Equipment uses / description" >
                        </div>
                      </div>
                      <div class="form-group row">
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
                <div class="table-responsive" id="equipmentTable">
                  <table class="table table-bordered" id="equipmentDataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Project Description</th>
                        <th>Quantity</th>
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
                        <th>Project Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Options</th>
                      </tr>
                    </tfoot>
                 
                    </table>
                  </div>          
                  <div class="row">
                    <div class="col-lg-6 mb-4">
                    </div>
                    <div class="col-lg-6 mb-4 text-right ">
                      <div style="font-weight:bold;">TOTAL: <span id="totalEquipmentPrice">0</span></div>
                    </div>
                  </div>
                </div>
            </div>

          </div>
          <div class="col-lg-12 mb-4">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
                </div>
                <div class="card-body">
                  
                <form id="add-tasks-form" method="post">
				              <input type="hidden" name="function-type" value="add-tasks">
                      <div class="form-group row">
                      <div class="col-sm-6 mb-3">
                          <input type="text" class="form-control form-control-user"  name="project-tasks-name" placeholder="Tasks name*" id="taskRequired1">
                        </div>
                        <div class="col-sm-6 mb-3">
                          <div class="" >
                              <select class="custom-select"  class="form-control form-control-user"  name="project-tasks-status"  placeholder="Task Status*" id="taskRequired2">
                              <option value="1">To Do</option>
                              <option value="2">In Progress</option>
                              <option value="3">Done</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                          <input type="text" class="form-control form-control-user"  name="project-tasks-description" placeholder="Task Description" id="taskRequired3">
                        </div>
                      </div>

                      <div class="form-group row d-flex justify-content-center">
                        <div class="col-lg-3">
                          <button id="submit-tasks-form" class="btn btn-primary btn-user btn-block">
                            Submit
                          </button>
                        </div>
                      </div>
                  
                      <hr>
                    </form>

                <div class="row ">
                    <div class="col-lg-4 mb-4">
                      <div class="card  mb-4">

                        <div class="card-header py-3">

                          <h6 class="m-0 font-weight-bold text-primary">To Do</h6>
                        </div>
                            <div class="card-body">
                              <div id="tasksTodoColumn"></div>
                          </div>
                      </div>

                    </div>

                    <div class="col-lg-4 mb-4">
                      <div class="card  mb-4">

                        <div class="card-header py-3">

                          <h6 class="m-0 font-weight-bold text-primary">In Progress</h6>
                        </div>
                        <div class="card-body">
                          <div id="tasksInProgressColumn"></div>
                        </div>
                      </div>

                    </div>

                    <div class="col-lg-4 mb-4">
                      <div class="card  mb-4">

                        <div class="card-header py-3">

                          <h6 class="m-0 font-weight-bold text-primary">Done</h6>
                        </div>
                        <div class="card-body">
                        <div id="tasksDoneColumn"></div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
            </div>
            
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