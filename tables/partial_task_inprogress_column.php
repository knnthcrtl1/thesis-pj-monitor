<?php

    include('../connection.php');
    session_start();
    
    if (isset($_POST['projectId'])) {
    $sql = "SELECT * FROM tbl_project_tasks WHERE project_task_project_id = '{$_POST['projectId']}' AND project_task_status = '{$_POST['taskStatus']}' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
             <div class="todo_items">
                <div class="task-title">Title: <?php echo $row['project_task_name']; ?></div>
                <div class="text-black-50 small">Description: <?php echo $row['project_task_description']; ?></div>
                <div class="text-black-50 small">Date: <?php echo $row['project_task_date']; ?></div>
            </div>
        <?php
        }
    }
}
?>
    