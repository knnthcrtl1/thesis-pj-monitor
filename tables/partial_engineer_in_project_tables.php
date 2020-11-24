<?php

    session_start();
    include('../connection.php');

    if($_POST['projectId']) {

    $sql = "SELECT * FROM tbl_user_handled_projects WHERE user_handled_user_type = 'Engineer' AND user_handled_project_project_id = '{$_POST['projectId']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
              $sql2 = "SELECT * FROM tbl_engineers WHERE engineer_id = '{$row['user_handled_project_engineer_id']}'";
              $result2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_array($result2);
          ?>
          <tr>
            <td><?php echo $row['user_handled_project_id'] ?></td>
           
            <td><?php echo $row2['engineer_id'] . " - " . $row2['engineer_firstname'] . " " . $row2['engineer_lastname'] ?></td>
          </tr>
        <?php
        }
    }
  }

?>
    