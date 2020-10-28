<?php
    include('./connection.php');

    if (isset($_POST['id'])) {
        $sql = "DELETE FROM tbl_equipment_categories WHERE equipment_category_id = '{$_POST['id']}'";
        mysqli_query($conn, $sql);
    }

?>