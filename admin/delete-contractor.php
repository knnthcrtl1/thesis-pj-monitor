<?php
    include('./connection.php');
    include('./functions/functions.php');

    if (isset($_POST['id'])) {

        if(!checkContractorIfExistInProjectData($conn, $_POST['id'])) return false;
        
        $sql = "DELETE FROM tbl_contractors WHERE contractor_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>