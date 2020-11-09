<?php
    include('./connection.php');
    include('./functions/functions.php');

    if (isset($_POST['id'])) {
      
        if(!checkEquipmentIfExistInProjectData($conn, $_POST['id'])) return false;

        $sql = "DELETE FROM tbl_projects WHERE project_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>