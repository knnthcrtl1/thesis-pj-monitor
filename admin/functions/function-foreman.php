<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-foreman") {

            $foremanEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-email'])));
            
            $password = getUsualPassword();
            $sql = "INSERT INTO tbl_users (user_username,user_password,user_level) VALUES ('{$foremanEmail}',
            '{$password}','6')";

            if (!mysqli_query($conn, $sql)) {
                // echo("Error description: " . mysqli_error($conn));
                echo 1;
                return false;
            }

            $foremanFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-firstname'])));
            $foremanMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-middlename'])));
            $foremanLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-lastname'])));
            $foremanAge = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-age'])));
            $foremanBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-birthdate'])));
            $foremanContact = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-contact'])));
            $foremanGender = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-gender'])));
            $foremanSalary = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-salary'])));

            $foremanTableFields = "foreman_firstname,foreman_middlename,foreman_lastname,foreman_age,foreman_birthdate,foreman_email,foreman_contact_number,foreman_gender,foreman_salary";
            $sql = "INSERT INTO tbl_foreman ( {$foremanTableFields} ) VALUES 
                ('{$foremanFirstname}','{$foremanMiddlename}','{$foremanLastname}','{$foremanAge}','{$foremanBirthdate}','{$foremanEmail}','{$foremanContact}','{$foremanGender}','{$foremanSalary}')";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            $sql = "SELECT foreman_id FROM tbl_foreman ORDER BY foreman_id DESC LIMIT 1";

			$result = mysqli_query($conn, $sql);

            $foremanId = mysqli_fetch_array($result)['foreman_id'];

            $sql = "UPDATE tbl_users SET user_user_id = '{$foremanId}' WHERE user_username = '{$foremanEmail}' ";
            mysqli_query($conn, $sql);


            // auditTrail($_SESSION['user'], "Update Student", $conn);

            
        }
        
        if ($_POST["function-type"] === "edit-foreman") {
            $foremanId = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-id'])));
            $foremanEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-email'])));
            
            $sql = "UPDATE tbl_users SET user_username = '{$foremanEmail}' WHERE user_user_id = '{$foremanId}' ";
            mysqli_query($conn, $sql);
            
            if (!mysqli_query($conn, $sql)) {
                // echo("Error description: " . mysqli_error($conn));
                echo 1;
                return false;
            }

            $foremanFirstname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-firstname'])));
            $foremanMiddlename = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-middlename'])));
            $foremanLastname = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-lastname'])));
            $foremanAge = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-age'])));
            $foremanBirthdate = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-birthdate'])));
            $foremanContact = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-contact'])));
            $foremanGender = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-gender'])));
            $foremanSalary = mysqli_real_escape_string($conn,(strip_tags($_POST['foreman-salary'])));

			$sql = "UPDATE tbl_foreman SET foreman_firstname = '{$foremanFirstname}' , foreman_middlename = '{$foremanMiddlename}', foreman_lastname = '{$foremanLastname}', foreman_age = '{$foremanAge}', foreman_birthdate = '{$foremanBirthdate}' , foreman_email = '{$foremanEmail}', foreman_contact_number = '{$foremanContact}', foreman_gender = '{$foremanGender}', foreman_salary = '{$foremanSalary}' WHERE foreman_id = '{$foremanId}' ";
            mysqli_query($conn, $sql);

            return false;
        }
    }



?>