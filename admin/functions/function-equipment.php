<?php
    session_start();
    include('../connection.php');
    include('./functions.php');
    
    if (isset($_POST['ajax'])) {
      

        if ($_POST["function-type"] === "add-equipment") {

            $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-name'])));
            $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-description'])));
            $equipmentProjectId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-project-id'])));
            $equipmentPrice = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-price'])));
            $equipmentCount = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-count'])));

            $equipmentTableFields = "equipment_name,equipment_description,equipment_project_id,equipment_price,equipment_count";
            $sql = "INSERT INTO tbl_equipments ( {$equipmentTableFields} ) VALUES 
                ('{$equipmentName}','{$equipmentDescription}','{$equipmentProjectId}','{$equipmentPrice}','{$equipmentCount}')";
            
           mysqli_query($conn, $sql);
            // auditTrail($_SESSION['user'], "Update Student", $conn);
            
            return false;
        }
        
        if ($_POST["function-type"] === "edit-equipment") {
            $equipmentId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-id'])));

            $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-name'])));
            $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-description'])));
            $equipmentProjectId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-project-id'])));
            $equipmentPrice = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-price'])));
            $equipmentCount = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-count'])));

			$sql = "UPDATE tbl_equipments SET equipment_name = '{$equipmentName}' , equipment_description = '{$equipmentDescription}', equipment_project_id = '{$equipmentProjectId}', equipment_price = '{$equipmentPrice}' , equipment_count = '{$equipmentCount}' WHERE equipment_id = '{$equipmentId}' ";
            mysqli_query($conn, $sql);
        }
    }



?>