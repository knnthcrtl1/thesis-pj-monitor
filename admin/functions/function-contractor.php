<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-contractor") {

            $contractorEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-email'])));

            // check if email exist return false 
            checkEmailExist($conn,$contractorEmail);

            $contractorName = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-name'])));
            $contractorAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-address'])));
            $contractorContact = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-contact'])));
           

            $contractorTableFields = "contractor_name,contractor_address,contractor_telephone,contractor_email";
            $sql = "INSERT INTO tbl_contractors ( {$contractorTableFields} ) VALUES 
                ('{$contractorName}','{$contractorAddress}','{$contractorContact}','{$contractorEmail}')";
            
            mysqli_query($conn, $sql);

            // auditTrail($_SESSION['user'], "Update Student", $conn);

            return false;
            
        }
        
        if ($_POST["function-type"] === "edit-contractor") {
            $contractorId = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-id'])));
            $contractorEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-email'])));

            // check if email exist return false 
            checkEmailExist($conn,$contractorEmail);

            $contractorName = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-name'])));
            $contractorAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-address'])));
            $contractorContact = mysqli_real_escape_string($conn,(strip_tags($_POST['contractor-contact'])));
            
            $sql = "UPDATE tbl_contractors SET contractor_name = '{$contractorName}' , contractor_address = '{$contractorAddress}', contractor_telephone = '{$contractorContact}', contractor_email  = '{$contractorEmail}' WHERE contractor_id = '{$contractorId}' ";

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }
            
            // return false;
        }
    }



?>