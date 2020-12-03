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
            $projectStartDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-start-tasks-date'])));
            $projectEndDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-end-tasks-date'])));
            $projectClientId = mysqli_real_escape_string($conn,(strip_tags($_POST['clientId'])));

            $tasksTableFields = "project_task_name,project_task_description,project_task_status,project_task_project_id,project_task_start_date,project_task_end_date";
            $sql = "INSERT INTO tbl_project_tasks ( {$tasksTableFields} ) VALUES 
                ('{$projectTasksName}','{$projectTasksDescription}','{$projectTasksStatus}','{$projectId}','{$projectStartDate}','{$projectEndDate}')";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            $sql = "SELECT project_task_id FROM tbl_project_tasks ORDER BY project_task_id DESC LIMIT 1";

			$result = mysqli_query($conn, $sql);

            $taskId = mysqli_fetch_array($result)['project_task_id'];

            // auditTrail($_SESSION['user'], "Update Student", $conn);
            auditTrail($_SESSION['user_id'], "Add Task", $projectId, $taskId, $projectTasksStatus, $projectClientId, $conn);

            return false;
            
        }

        if ($_POST["function-type"] === "update-tasks") {

            $projectId = mysqli_real_escape_string($conn,(strip_tags($_POST['project-id'])));
            $projectTasksStatus = mysqli_real_escape_string($conn,(strip_tags($_POST['taskStatus'])));
            $taskId = mysqli_real_escape_string($conn,(strip_tags($_POST['taskId'])));
            $projectClientId = mysqli_real_escape_string($conn,(strip_tags($_POST['clientId'])));

            
            $sql = "UPDATE tbl_project_tasks SET project_task_status = '{$projectTasksStatus}' WHERE project_task_id = '{$taskId}' ";

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            auditTrail($_SESSION['user_id'], "Update Task", $projectId, $taskId, $projectTasksStatus, $projectClientId, $conn);


            return false;
            
        }
        
    }



?>