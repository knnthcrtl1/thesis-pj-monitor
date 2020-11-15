<?php
    session_start();
    include('../connection.php');
    include('./functions.php');
    
    if (isset($_POST['ajax'])) {
      

        if ($_POST["function-type"] === "add-equipment") {

            $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-name'])));
            $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-description'])));
       
            $equipmentPrice = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-price'])));
            $equipmentCount = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-count'])));

            $equipmentTableFields = "equipment_name,equipment_description,equipment_price,equipment_count";
            $sql = "INSERT INTO tbl_equipments ( {$equipmentTableFields} ) VALUES 
                ('{$equipmentName}','{$equipmentDescription}','{$equipmentPrice}','{$equipmentCount}')";
            
           mysqli_query($conn, $sql);
            // auditTrail($_SESSION['user'], "Update Student", $conn);
            
            return false;
        }
        
        if ($_POST["function-type"] === "edit-equipment") {
            $equipmentId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-id'])));

            $equipmentName = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-name'])));
            $equipmentDescription = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-description'])));
            $equipmentPrice = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-price'])));
            $equipmentCount = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-count'])));

			$sql = "UPDATE tbl_equipments SET equipment_name = '{$equipmentName}' , equipment_description = '{$equipmentDescription}', equipment_price = '{$equipmentPrice}' , equipment_count = '{$equipmentCount}' WHERE equipment_id = '{$equipmentId}' ";
            mysqli_query($conn, $sql);
        }

        if ($_POST["function-type"] === "add-equipment-handled-project") {

            $equipmentRequiredId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipmentRequiredId'])));
            $equipmentProjectId = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-project-id'])));
            $equipmentCount = mysqli_real_escape_string($conn,(strip_tags($_POST['equipment-count'])));
            
            $sql = "SELECT * FROM tbl_equipments where equipment_id = '{$equipmentRequiredId}' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $updatedValue =  $row['equipment_count'] - $equipmentCount;  

            $sql = "UPDATE tbl_equipments SET equipment_count = '{$updatedValue}' WHERE equipment_id = '{$equipmentRequiredId}' ";
            mysqli_query($conn, $sql);

            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

            $equipmentTableFields = "equipment_handled_project_equipment_id, equipment_handled_project_equipment_count, equipment_handled_project_project_id";
            $sql = "INSERT INTO  tbl_equipment_handled_projects ( {$equipmentTableFields} ) VALUES 
                ('{$equipmentRequiredId}','{$equipmentCount}','{$equipmentProjectId}')";
            
            if (!mysqli_query($conn, $sql)) {
                echo("Error description: " . mysqli_error($conn));
            }

           
            
            return false;
        }
    }



?>