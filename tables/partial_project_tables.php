<?php

    include('../connection.php');
    session_start();

    $sql = "SELECT * FROM tbl_projects WHERE project_client_owner = '{$_SESSION['user_id']}'";
   
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
            <td><a class="btn btn-success" href="edit_project.php?id=<?php echo $row['project_id']; ?>"><i class="fas fa-fw fa-edit"></i> View</a></td>
          </tr>
        <?php
        }
    }
?>
    