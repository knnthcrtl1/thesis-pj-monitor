<?php


session_start();
include('../connection.php');

    if (isset($_POST['ajax'])) {

        if ($_POST["function-type"] === "change-password") {
            
            $id = mysqli_real_escape_string($conn,(strip_tags($_POST['password-user-id'])));
            $password = mysqli_real_escape_string($conn,(strip_tags($_POST['password-retype-password'])));
            $newPassword = md5($password);

            $sql = "UPDATE tbl_users SET user_password = '{$newPassword}' WHERE user_user_id = '{$id}' ";
            mysqli_query($conn, $sql);

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }
        }
    }

?>