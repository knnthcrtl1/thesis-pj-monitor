<?php
    session_start();
    include('../connection.php');
    include('./functions.php');


    if (isset($_POST['ajax'])) {
      


        if ($_POST["function-type"] === "add-client") {

            $clientEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['client-email'])));

            // check if email exist return false 
            $password = getUsualPassword();
            $sql = "INSERT INTO tbl_users (user_username,user_password,user_level) VALUES ('{$clientEmail}',
            '{$password}','7')";

            if (!mysqli_query($conn, $sql)) {
                // echo("Error description: " . mysqli_error($conn));
                echo 1;
                return false;
            }

            $clientName = mysqli_real_escape_string($conn,(strip_tags($_POST['client-name'])));
            $clientAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['client-address'])));
            $clientContact = mysqli_real_escape_string($conn,(strip_tags($_POST['client-contact'])));
           

            $clientTableFields = "client_name,client_address,client_telephone,client_email";
            $sql = "INSERT INTO tbl_clients ( {$clientTableFields} ) VALUES 
                ('{$clientName}','{$clientAddress}','{$clientContact}','{$clientEmail}')";
            
            mysqli_query($conn, $sql);

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            $sql = "SELECT client_id FROM tbl_clients ORDER BY client_id DESC LIMIT 1";

			$result = mysqli_query($conn, $sql);

            $clientId = mysqli_fetch_array($result)['client_id'];

            $sql = "UPDATE tbl_users SET user_user_id = '{$clientId}' WHERE user_username = '{$clientEmail}' ";
            mysqli_query($conn, $sql);

            // auditTrail($_SESSION['user'], "Update Student", $conn);

            return false;
            
        }
        
        if ($_POST["function-type"] === "edit-client") {
            $clientId = mysqli_real_escape_string($conn,(strip_tags($_POST['client-id'])));
            $clientEmail = mysqli_real_escape_string($conn,(strip_tags($_POST['client-email'])));

            // check if email exist return false 
            $sql = "UPDATE tbl_users SET user_username = '{$clientEmail}' WHERE user_user_id = '{$clientId}' ";
            mysqli_query($conn, $sql);
            
            if (!mysqli_query($conn, $sql)) {
                // echo("Error description: " . mysqli_error($conn));
                echo 1;
                return false;
            }

            $clientName = mysqli_real_escape_string($conn,(strip_tags($_POST['client-name'])));
            $clientAddress = mysqli_real_escape_string($conn,(strip_tags($_POST['client-address'])));
            $clientContact = mysqli_real_escape_string($conn,(strip_tags($_POST['client-contact'])));
            
            $sql = "UPDATE tbl_clients SET client_name = '{$clientName}' , client_address = '{$clientAddress}', client_telephone = '{$clientContact}', client_email  = '{$clientEmail}' WHERE client_id = '{$clientId}' ";

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }
            
        }
    }



?>