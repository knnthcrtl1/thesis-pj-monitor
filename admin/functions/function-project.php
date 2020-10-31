<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-project") {

            $projectContractorName = mysqli_real_escape_string($conn,(strip_tags($_POST['project-contractor-name'])));
            $projectAgreementDetails = mysqli_real_escape_string($conn,(strip_tags($_POST['project-agreement-details'])));
            $projectAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['project-address'])));
            $projectTelephone = mysqli_real_escape_string($conn,(strip_tags($_POST['project-telephone'])));
            $projectWorkLocation = mysqli_real_escape_string($conn,(strip_tags($_POST['project-work-location'])));
            $projectIssuingOffice = mysqli_real_escape_string($conn,(strip_tags($_POST['project-issuing-office'])));
            $projectIssuingAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['project-issuing-address'])));
            $projectClientOwner = mysqli_real_escape_string($conn,(strip_tags($_POST['project-client-owner'])));
            $projectStartDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-start-date'])));
            $projectEndDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-end-date'])));

            $projectTableFields = "project_contractor_name,project_agreement_details,project_address,project_telephone,project_work_location,project_issuing_office,project_issuing_addres,project_start_date,project_end_date,project_client_owner";
            $sql = "INSERT INTO tbl_projects ( {$projectTableFields} ) VALUES 
                ('{$projectContractorName}','{$projectAgreementDetails}','{$projectAddress}','{$projectTelephone}','{$projectWorkLocation}','{$projectIssuingOffice}','{$projectIssuingAddress}','{$projectStartDate}','{$projectEndDate}','{$projectClientOwner}')";

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            // auditTrail($_SESSION['user'], "Update Student", $conn);

            
        }
        
        if ($_POST["function-type"] === "edit-project") {
            $projectId = mysqli_real_escape_string($conn,(strip_tags($_POST['project-id'])));

            $projectContractorName = mysqli_real_escape_string($conn,(strip_tags($_POST['project-contractor-name'])));
            $projectAgreementDetails = mysqli_real_escape_string($conn,(strip_tags($_POST['project-agreement-details'])));
            $projectAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['project-address'])));
            $projectTelephone = mysqli_real_escape_string($conn,(strip_tags($_POST['project-telephone'])));
            $projectWorkLocation = mysqli_real_escape_string($conn,(strip_tags($_POST['project-work-location'])));
            $projectIssuingOffice = mysqli_real_escape_string($conn,(strip_tags($_POST['project-issuing-office'])));
            $projectIssuingAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['project-issuing-address'])));
            $projectClientOwner = mysqli_real_escape_string($conn,(strip_tags($_POST['project-client-owner'])));
            $projectStartDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-start-date'])));
            $projectEndDate = mysqli_real_escape_string($conn,(strip_tags($_POST['project-end-date'])));

            $sql = "UPDATE tbl_projects SET project_contractor_name = '{$projectContractorName}' , project_agreement_details = '{$projectAgreementDetails}', project_address = '{$projectAddress}', project_telephone = '{$projectTelephone}', project_work_location = '{$projectWorkLocation}' , project_issuing_office = '{$projectIssuingOffice}', project_issuing_addres = '{$projectIssuingAddress}', project_start_date = '{$projectStartDate}', project_end_date = '{$projectEndDate}', project_client_owner = '{$projectClientOwner}' WHERE project_id = '{$projectId}' ";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            return false;
        }
    }



?>