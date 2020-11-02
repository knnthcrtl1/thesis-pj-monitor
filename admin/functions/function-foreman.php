<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-foreman") {

            $foremanEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-email'])));
            checkEmailExist($conn,$foremanEmail);

            $foremanFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-firstname'])));
            $foremanMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-middlename'])));
            $foremanLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-lastname'])));
            $foremanAge = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-age'])));
            $foremanBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-birthdate'])));
            $foremanContact = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-contact'])));
            $foremanGender = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-gender'])));

            $foremanTableFields = "foreman_firstname,foreman_middlename,foreman_lastname,foreman_age,foreman_birthdate,foreman_email,foreman_contact_number,foreman_gender";
            $sql = "INSERT INTO tbl_foreman ( {$foremanTableFields} ) VALUES 
                ('{$foremanFirstname}','{$foremanMiddlename}','{$foremanLastname}','{$foremanAge}','{$foremanBirthdate}','{$foremanEmail}','{$foremanContact}','{$foremanGender}')";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }


            // auditTrail($_SESSION['user'], "Update Student", $conn);

            
        }
        
        if ($_POST["function-type"] === "edit-foreman") {
            $foremanId = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-id'])));
            $foremanEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-email'])));
            
            checkEmailExist($conn,$foremanEmail);

            $foremanFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-firstname'])));
            $foremanMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-middlename'])));
            $foremanLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-lastname'])));
            $foremanAge = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-age'])));
            $foremanBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-birthdate'])));
            $foremanContact = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-contact'])));
            $foremanGender = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-gender'])));

			$sql = "UPDATE tbl_foreman SET foreman_firstname = '{$foremanFirstname}' , foreman_middlename = '{$foremanMiddlename}', foreman_lastname = '{$foremanLastname}', foreman_age = '{$foremanAge}', foreman_birthdate = '{$foremanBirthdate}' , foreman_email = '{$foremanEmail}', foreman_contact_number = '{$foremanContact}', foreman_gender = '{$foremanGender}' WHERE foreman_id = '{$foremanId}' ";
            mysqli_query($conn, $sql);

            return false;
        }
    }



?>