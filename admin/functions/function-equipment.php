<?php
    session_start();
    include('../connection.php');
    include('./functions.php');
    
    if (isset($_POST['ajax'])) {
        $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-name'])));
        $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-description'])));
        $equipmentCategory = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-category'])));
        $equipmentCount = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-count'])));

        if ($_POST["function-type"] === "add-equipment") {

            $equipmentTableFields = "equipment_name,equipment_description,equipment_category_id,equipment_count";
            $sql = "INSERT INTO tbl_equipments ( {$equipmentTableFields} ) VALUES 
                ('{$equipmentName}','{$equipmentDescription}','{$equipmentCategory}','{$equipmentCount}')";
            
           mysqli_query($conn, $sql);
            // auditTrail($_SESSION['user'], "Update Student", $conn);
            
            return false;
        }
        
        if ($_POST["function-type"] === "edit-equipment") {
            $equipmentId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-id'])));

            $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-name'])));
            $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-description'])));
            $equipmentCategory = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-category'])));
            $equipmentCount = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-count'])));

			$sql = "UPDATE tbl_equipments SET equipment_name = '{$equipmentName}' , equipment_description = '{$equipmentDescription}', equipment_category_id = '{$equipmentCategory}', equipment_count = '{$equipmentCount}' WHERE equipment_id = '{$equipmentId}' ";
            mysqli_query($conn, $sql);
        }
    }



?>