<?php
    include('./connection.php');
    include('./functions/functions.php');

    if (isset($_POST['id'])) {

        if(!checkUserIfExistInProjectData($conn, $_POST['id'])) return false;

        $sql = "DELETE FROM tbl_foreman WHERE foreman_id = '{$_POST['id']}'";

        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
        }

        $sql = "DELETE FROM tbl_users WHERE user_user_id = '{$_POST['id']}'";

        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
        }
    }

?>