<?php

    include('../connection.php');

    if($_POST['projectId']) {

    $sql = "SELECT * FROM tbl_user_handled_projects WHERE user_handled_user_type = 'Foreman' AND user_handled_project_project_id = '{$_POST['projectId']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['user_handled_project_id'] ?></td>
            <?php
                $sql2 = "SELECT * FROM tbl_foreman WHERE foreman_id = '{$row['user_handled_project_engineer_id']}' ";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($result2);
            ?>
            <td><?php echo $row2['foreman_id'] . " - " . $row2['foreman_firstname'] . " " . $row2['foreman_lastname'] ?></td>
            <?php  if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "Delete User in Project" ) ) {  ?>
            <td style="display:flex;flex-direction:row">
            <span id="delete-foreman-in-project" class="btn btn-danger" delete-id="<?php echo $row['user_handled_project_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
            <?php } ?>
          </tr>
        <?php
        }
    }
  }

?>
    