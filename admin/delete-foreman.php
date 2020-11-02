<?php
    include('./connection.php');
    include('./functions/functions.php');

    if (isset($_POST['id'])) {

        if(!checkUserIfExistInProjectData($conn, $_POST['id'])) return false;

        $sql = "DELETE FROM tbl_foreman WHERE foreman_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>