<?php

    include('../connection.php');

    include('../functions/functions.php');
    session_start();
    
    if (isset($_POST['projectId'])) {
    $sql = "SELECT * FROM tbl_project_tasks WHERE project_task_project_id = '{$_POST['projectId']}' AND project_task_status = '{$_POST['taskStatus']}' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
             <div class="todo_items">
                 <?php if ( checkAuthAction( authActions($_SESSION['user_id'],"",$conn), "Delete Equipment in Project" ) ) {  ?>
                <div class="delete-button">
                    <span id="delete-task" delete-id="<?php echo $row['project_task_id'] ?>"><i class="fas fa-times" style="color: #e74a3b"></i></span>
                </div>
                 <?php } ?>
                <div class="task-title">Title: <?php echo $row['project_task_name']; ?></div>
                <div class="text-black-50 small">Description: <?php echo $row['project_task_description']; ?></div>
                <div class="text-black-50 small">Start Date: <?php echo $row['project_task_start_date']; ?></div>
                <div class="text-black-50 small">End Date: <?php echo $row['project_task_end_date']; ?></div>
                <div class="" style="margin-top: 10px">
                <select class="custom-select select-project-status[]"  class="form-control form-control-user"  name="project-tasks-status"  placeholder="Client / Owner*" id="projectRequired1" edit-attr-id="<?php echo $row['project_task_id']; ?>">
                <option value="1" <?php echo $row['project_task_status'] == 1 ? 'selected' : null ?>>To Do</option>
                <option value="2" <?php echo $row['project_task_status'] == 2 ? 'selected' : null ?>>In Progress</option>
                <option value="3" <?php echo $row['project_task_status'] == 3 ? 'selected' : null ?>>Done</option>
                </select>
                </div>
            </div>
        <?php
        }
    }
}
?>
    