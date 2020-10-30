<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_engineers WHERE engineer_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>