<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_equipment_handled_projects WHERE equipment_handled_project_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>