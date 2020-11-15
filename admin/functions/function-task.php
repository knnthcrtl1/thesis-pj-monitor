<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-tasks") {

            $projectId = mysqli_real_escape_string($conn,(strip_tags($_POST['project-id'])));
            
            $projectTasksName = mysqli_real_escape_string($conn,(strip_tags($_POST['project-tasks-name'])));
            $projectTasksStatus = mysqli_real_escape_string($conn,(strip_tags($_POST['project-tasks-status'])));
            $projectTasksDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['project-tasks-description'])));
            $projectTasksDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-tasks-date'])));

            $tasksTableFields = "project_task_name,project_task_description,project_task_status,project_task_project_id,project_task_date";
            $sql = "INSERT INTO tbl_project_tasks ( {$tasksTableFields} ) VALUES 
                ('{$projectTasksName}','{$projectTasksDescription}','{$projectTasksStatus}','{$projectId}','{$projectTasksDate}')";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            // auditTrail($_SESSION['user'], "Update Student", $conn);

            return false;
            
        }

        if ($_POST["function-type"] === "update-tasks") {

            // $projectId = mysqli_real_escape_string($conn,(strip_tags($_POST['project-id'])));
            $projectTasksStatus = mysqli_real_escape_string($conn,(strip_tags($_POST['taskStatus'])));
            $taskId = mysqli_real_escape_string($conn,(strip_tags($_POST['taskId'])));
        
            
            $sql = "UPDATE tbl_project_tasks SET project_task_status = '{$projectTasksStatus}' WHERE project_task_id = '{$taskId}' ";

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            return false;
            
        }
        
    }



?>