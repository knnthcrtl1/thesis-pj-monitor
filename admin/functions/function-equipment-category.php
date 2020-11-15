<?php

session_start();
include('../connection.php');
include('./functions.php');

if (isset($_POST['ajax'])) {
    $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-category-name'])));
    $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-category-description'])));


    if ($_POST["function-type"] === "add-equipment-category") {

        $equipmentTableFields = "equipment_category_name,equipment_category_description";
        $sql = "INSERT INTO tbl_equipment_categories ( {$equipmentTableFields} ) VALUES 
            ('{$equipmentName}','{$equipmentDescription}')";
        
        mysqli_query($conn, $sql);
        // auditTrail($_SESSION['user'], "Update Student", $conn);
        
        return false;
    }

    if ($_POST["function-type"] === "edit-equipment-category") {

        $equipmentId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-category-id'])));
        $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-category-name'])));
        $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-category-description'])));

        $sql = "UPDATE tbl_equipment_categories SET equipment_category_name = '{$equipmentName}' , equipment_category_description = '{$equipmentDescription}' WHERE equipment_category_id = '{$equipmentId}' ";
        mysqli_query($conn, $sql);

  

    }

}



?>