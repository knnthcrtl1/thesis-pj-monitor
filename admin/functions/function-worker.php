<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-worker") {

            $workName = mysqli_real_escape_string($conn,(strip_tags($_POST['worker-name'])));
            $projectId = mysqli_real_escape_string($conn,(strip_tags($_POST['projectId'])));
            $workerPhone = mysqli_real_escape_string($conn,(strip_tags($_POST['worker-phone'])));
            $workerSalary = mysqli_real_escape_string($conn,(strip_tags($_POST['worker-salary'])));

            $contractorTableFields = "worker_handled_project_name,worker_handled_project_phone,worker_handle_project_project_id,worker_handled_project_salary";
            $sql = "INSERT INTO tbl_worker_handled_projects ( {$contractorTableFields} ) VALUES 
                ('{$workName}','{$workerPhone}','{$projectId}','{$workerSalary}')";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            // auditTrail($_SESSION['user'], "Update Student", $conn);

            return false;
            
        }
      
    }



?>