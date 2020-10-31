<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_projects WHERE project_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>