<?php

    include('../connection.php');
    session_start();

    $sql = "SELECT * FROM tbl_audit WHERE audit_client_id = '{$_SESSION['user_id']}'";
   
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['audit_id'] ?></td>
            <td><?php echo $row['audit_action'] ?></td>
         
            <td><?php echo $row['audit_timestamp'];?></td>
            <?php
                $sql3 = "SELECT * FROM tbl_project_tasks WHERE project_task_id = '{$row['audit_task_id']}'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3);
            ?>
            <td><?php echo $row3['project_task_name'] ?></td>
            <?php
                $sql4 = "SELECT * FROM tbl_projects WHERE project_id = '{$row['audit_project_id']}'";
                $result4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_array($result4);
            ?>
            <td><?php echo $row4['project_name'] ?></td>
            <td>
                <?php  
                if($row['audit_task_status'] == 1) echo "To Do";
                if($row['audit_task_status'] == 2) echo "In Progress";
                if($row['audit_task_status'] == 3) echo "Done";
                ?>
            </td>
          </tr>
        <?php
        }
    }
?>
    