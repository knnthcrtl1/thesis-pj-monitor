<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-engineer") {

            $engineerEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-email'])));
            
            $password = getUsualPassword();
            $sql = "INSERT INTO tbl_users (user_username,user_password,user_level) VALUES ('{$engineerEmail}',
            '{$password}','5')";

            if (!mysqli_query($conn, $sql)) {
                // echo("Error description: " . mysqli_error($conn));
                echo 1;
                return false;
            }


            $engineerFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-firstname'])));
            $engineerMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-middlename'])));
            $engineerLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-lastname'])));
            $engineerAge = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-age'])));
            $engineerBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-birthdate'])));
            $engineerContact = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-contact'])));
            $engineerGender = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-gender'])));
            $engineerSalary = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-salary'])));

            $engineerTableFields = "engineer_firstname,engineer_middlename,engineer_lastname,engineer_age,engineer_birthdate,engineer_email,engineer_contact_number,engineer_gender,engineer_salary";
            $sql = "INSERT INTO tbl_engineers ( {$engineerTableFields} ) VALUES 
                ('{$engineerFirstname}','{$engineerMiddlename}','{$engineerLastname}','{$engineerAge}','{$engineerBirthdate}','{$engineerEmail}','{$engineerContact}','{$engineerGender}','{$engineerSalary}')";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
                // echo 1;
            }
                        
            $sql = "SELECT engineer_id FROM tbl_engineers ORDER BY engineer_id DESC LIMIT 1";

            $result = mysqli_query($conn, $sql);
            
            $engineerId = mysqli_fetch_array($result)['engineer_id'];

            $sql = "UPDATE tbl_users SET user_user_id = '{$engineerId}' WHERE user_username = '{$engineerEmail}' ";

            mysqli_query($conn, $sql);
            
        }
        
        if ($_POST["function-type"] === "edit-engineer") {
            
            $engineerId = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-id'])));
            $engineerEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-email'])));
            
            $sql = "UPDATE tbl_users SET user_username = '{$engineerEmail}' WHERE user_user_id = '{$engineerId}' ";
            mysqli_query($conn, $sql);
            
            if (!mysqli_query($conn, $sql)) {
                // echo("Error description: " . mysqli_error($conn));
                echo 1;
                return false;
            }

            $engineerFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-firstname'])));
            $engineerMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-middlename'])));
            $engineerLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-lastname'])));
            $engineerAge = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-age'])));
            $engineerBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-birthdate'])));
            $engineerContact = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-contact'])));
            $engineerGender = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-gender'])));
            $engineerSalary = mysqli_real_escape_string($conn,(strip_tags($_POST['engineer-salary'])));

			$sql = "UPDATE tbl_engineers SET engineer_firstname = '{$engineerFirstname}' , engineer_middlename = '{$engineerMiddlename}', engineer_lastname = '{$engineerLastname}', engineer_age = '{$engineerAge}', engineer_birthdate = '{$engineerBirthdate}' , engineer_email = '{$engineerEmail}', engineer_contact_number = '{$engineerContact}', engineer_gender = '{$engineerGender}' , engineer_salary = '{$engineerSalary}' WHERE engineer_id = '{$engineerId}' ";
            mysqli_query($conn, $sql);
           
            return false;
        }
        
    }



?>