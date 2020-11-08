<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {

        if ($_POST["function-type"] === "add-engineer-in-project") {

            $addUserType = mysqli_real_escape_string($conn,(strip_tags($_POST['add-user-type'])));
            $engineerAddProject = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-add-project'])));
            $addEngineerProjectId = mysqli_real_escape_string($conn,(strip_tags($_POST['add-engineer-project-id'])));

            // check if engineer already exist in project
            if(!checkEngineerExistInProject($conn, $addEngineerProjectId, $engineerAddProject)) return false;
            
         
            $projectTableFields = "user_handled_project_project_id, user_handled_project_engineer_id, user_handled_user_type";
            $sql = "INSERT INTO tbl_user_handled_projects ( {$projectTableFields} ) VALUES 
                ('{$addEngineerProjectId}','{$engineerAddProject}','{$addUserType}')";

        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
        }

            // auditTrail($_SESSION['user'], "Update Student", $conn);
            
        }
      


        if ($_POST["function-type"] === "add-project") {

            $projectName = mysqli_real_escape_string($conn,(strip_tags($_POST['project-name'])));
            $projectContractorName = mysqli_real_escape_string($conn,(strip_tags($_POST['project-contractor-name'])));
            $projectAgreementDetails = mysqli_real_escape_string($conn,(strip_tags($_POST['project-agreement-details'])));
            $projectAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['project-address'])));
            $projectTelephone = mysqli_real_escape_string($conn,(strip_tags($_POST['project-telephone'])));
            $projectWorkLocation = mysqli_real_escape_string($conn,(strip_tags($_POST['project-work-location'])));
            $projectClientOwner = mysqli_real_escape_string($conn,(strip_tags($_POST['project-client-owner'])));
            $projectStartDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-start-date'])));
            $projectEndDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-end-date'])));

            $projectTableFields = "project_name,project_contractor_name,project_agreement_details,project_address,project_telephone,project_work_location,project_issuing_office,project_issuing_addres,project_start_date,project_end_date,project_client_owner";
            $sql = "INSERT INTO tbl_projects ( {$projectTableFields} ) VALUES 
                ('{$projectName}','{$projectContractorName}','{$projectAgreementDetails}','{$projectAddress}','{$projectTelephone}','{$projectWorkLocation}','{$projectIssuingOffice}','{$projectIssuingAddress}','{$projectStartDate}','{$projectEndDate}','{$projectClientOwner}')";

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            // auditTrail($_SESSION['user'], "Update Student", $conn);
            
        }
        
        if ($_POST["function-type"] === "edit-project") {
            $projectId = mysqli_real_escape_string($conn,(strip_tags($_POST['project-id'])));

            $projectName = mysqli_real_escape_string($conn,(strip_tags($_POST['project-name'])));
            $projectContractorName = mysqli_real_escape_string($conn,(strip_tags($_POST['project-contractor-name'])));
            $projectAgreementDetails = mysqli_real_escape_string($conn,(strip_tags($_POST['project-agreement-details'])));
            $projectAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['project-address'])));
            $projectTelephone = mysqli_real_escape_string($conn,(strip_tags($_POST['project-telephone'])));
            $projectWorkLocation = mysqli_real_escape_string($conn,(strip_tags($_POST['project-work-location'])));
            $projectClientOwner = mysqli_real_escape_string($conn,(strip_tags($_POST['project-client-owner'])));
            $projectStartDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-start-date'])));
            $projectEndDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-end-date'])));

            $sql = "UPDATE tbl_projects SET project_name = '{$projectName}' , project_contractor_name = '{$projectContractorName}' , project_agreement_details = '{$projectAgreementDetails}', project_address = '{$projectAddress}', project_telephone = '{$projectTelephone}', project_work_location = '{$projectWorkLocation}' , project_start_date = '{$projectStartDate}', project_end_date = '{$projectEndDate}', project_client_owner = '{$projectClientOwner}' WHERE project_id = '{$projectId}' ";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            return false;
        }
    }



?>