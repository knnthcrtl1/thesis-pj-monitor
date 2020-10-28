<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_equipments WHERE equipment_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>