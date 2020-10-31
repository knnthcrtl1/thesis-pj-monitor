<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_clients WHERE client_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>