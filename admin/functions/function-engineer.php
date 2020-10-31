<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-engineer") {

            $engineerEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-email'])));
            checkEmailExist($conn,$engineerEmail);

            $engineerFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-firstname'])));
            $engineerMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-middlename'])));
            $engineerLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-lastname'])));
            $engineerAge = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-age'])));
            $engineerBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-birthdate'])));
            $engineerContact = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-contact'])));
            $engineerGender = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-gender'])));

            $engineerTableFields = "engineer_firstname,engineer_middlename,engineer_lastname,engineer_age,engineer_birthdate,engineer_email,engineer_contact_number,engineer_gender";
            $sql = "INSERT INTO tbl_engineers ( {$engineerTableFields} ) VALUES 
                ('{$engineerFirstname}','{$engineerMiddlename}','{$engineerLastname}','{$engineerAge}','{$engineerBirthdate}','{$engineerEmail}','{$engineerContact}','{$engineerGender}')";
            
          mysqli_query($conn, $sql);

            // auditTrail($_SESSION['user'], "Update Student", $conn);

            
        }
        
        if ($_POST["function-type"] === "edit-engineer") {
            
            $engineerId = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-id'])));
            $engineerEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-email'])));
            
            checkEmailExist($conn,$engineerEmail);

            $engineerFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-firstname'])));
            $engineerMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-middlename'])));
            $engineerLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-lastname'])));
            $engineerAge = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-age'])));
            $engineerBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-birthdate'])));
            $engineerContact = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-contact'])));
            $engineerGender = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-gender'])));

			$sql = "UPDATE tbl_engineers SET engineer_firstname = '{$engineerFirstname}' , engineer_middlename = '{$engineerMiddlename}', engineer_lastname = '{$engineerLastname}', engineer_age = '{$engineerAge}', engineer_birthdate = '{$engineerBirthdate}' , engineer_email = '{$engineerEmail}', engineer_contact_number = '{$engineerContact}', engineer_gender = '{$engineerGender}' WHERE engineer_id = '{$engineerId}' ";
            mysqli_query($conn, $sql);

            return false;
        }
    }



?>