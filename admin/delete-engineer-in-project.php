<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_user_handled_projects WHERE user_handled_project_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>