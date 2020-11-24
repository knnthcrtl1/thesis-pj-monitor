<?php
    include('./connection.php');
    include('./functions/functions.php');

    if (isset($_POST['id'])) {

        $sql = "DELETE FROM tbl_worker_handled_projects WHERE worker_handled_project_id = '{$_POST['id']}'";
        
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
        }
        
    }

?>