<?php
    include('./connection.php');
    include('./functions/functions.php');

    if (isset($_POST['id'])) {

        if(!checkClientIfExistInProjectData($conn, $_POST['id'])) return false;
        
        $sql = "DELETE FROM tbl_clients WHERE client_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>