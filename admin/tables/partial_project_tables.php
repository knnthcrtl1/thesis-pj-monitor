<?php

    include('../connection.php');
    include('../functions/functions.php');
    session_start();
  try {
    //code...
  } catch (\Throwable $th) {
    //throw $th;
  }
    if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "Display Project" ) ) {  
      $sql = "SELECT * FROM tbl_projects";
    }

    if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "Display Project (Engineer)" ) ) {  
    $sql = "SELECT * FROM tbl_projects LEFT JOIN tbl_user_handled_projects ON tbl_projects.project_id = tbl_user_handled_projects.user_handled_project_project_id WHERE tbl_user_handled_projects.user_handled_project_engineer_id = '{$_SESSION['user_id']}'";
    }

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['project_id'] ?></td>
            <td><?php echo $row['project_name'] ?></td>
            <?php
                $sql3 = "SELECT * FROM tbl_contractors WHERE contractor_id = '{$row['project_contractor_name']}'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3);
            ?>
            <td><?php echo $row3['contractor_id'] . " - " . $row3['contractor_name'] ?></td>
            <td><?php echo $row['project_telephone'] ?></td>
            <td><?php echo $row['project_work_location'] ?></td>
            <td><?php echo $row['project_start_date'] ?></td>
            <td><?php echo $row['project_end_date'] ?></td>
            <?php
                $sql2 = "SELECT * FROM tbl_clients WHERE client_id = '{$row['project_client_owner']}'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($result2);
            ?>
            <td><?php echo ($row2) ? $row2['client_id'] . " - " . $row2['client_name'] : 'null' ?></td>
         
            <td style="display:flex;flex-direction:row">
              <a class="btn btn-success" href="edit_project.php?id=<?php echo $row['project_id']; ?>"><i class="fas fa-fw fa-edit"></i> View</a>
              <?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "Delete Project" ) ) {  ?>
                &nbsp;
                <span id="delete-project" class="btn btn-danger" delete-id="<?php echo $row['project_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
              <?php }?>
          </tr>
        <?php
        }
    }
?>
    