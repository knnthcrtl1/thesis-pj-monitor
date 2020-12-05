<?php

    include('../connection.php');
    session_start();

    if (isset($_POST['projectId'])) {

        $sql = "SELECT * FROM tbl_worker_handled_projects where worker_handle_project_project_id = '{$_POST['projectId']}' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0){
            while($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
                <td><?php echo $row['worker_handled_project_id'] ?></td>
                <td><?php echo $row['worker_handled_project_name'] ?></td>
                <td><?php echo $row['worker_handled_project_phone'] ?></td>
            </tr>
            <?php
            }
        }
    }

?>
    