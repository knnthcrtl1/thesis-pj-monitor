<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_project_tasks WHERE project_task_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>