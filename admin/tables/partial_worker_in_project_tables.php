<?php

    include('../connection.php');
    include('../functions/functions.php');
    session_start();

    if (isset($_POST['projectId'])) {

        $sql = "SELECT * FROM tbl_worker_handled_projects where worker_handle_project_project_id = '{$_POST['projectId']}'  ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0){
            while($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr class="workerSalary[]" testValue="<?php echo $row['worker_handled_project_salary']; ?>">
                <td><?php echo $row['worker_handled_project_id'] ?></td>
                <td><?php echo $row['worker_handled_project_name'] ?></td>
                <td><?php echo $row['worker_handled_project_phone'] ?></td>
                <?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "View Worker Salary" ) ) {  ?>
                <td><?php echo "PHP " . number_format($row['worker_handled_project_salary'], 2); ?></td>
                <?php } ?>
                <?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "Delete Worker" ) ) {  ?>
                <td>
                <!-- <a class="btn btn-success" href="edit_equipment.php?id=<?php echo $row['equipment_handled_project_id ']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
                &nbsp; -->
                <span id="delete-worker-in-project" class="btn btn-danger" delete-id="<?php echo $row['worker_handled_project_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
                <?php } ?>
            </tr>
            <?php
            }
        }
    }

?>
    