<?php

    include('../connection.php');
    session_start();

    if (isset($_POST['projectId'])) {


        $sql = "SELECT * FROM tbl_equipment_handled_projects where equipment_handled_project_project_id = '{$_POST['projectId']}' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0){
            while($row = mysqli_fetch_assoc($result)) { 

                $sql2 = "SELECT * FROM tbl_equipments where equipment_id = '{$row['equipment_handled_project_equipment_id']}' ";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $totalPrice =  $row['equipment_handled_project_equipment_count'] * $row2['equipment_price'];
              
            ?>
            
            <tr class="equipmentTotalPrice[]" testValue="<?php echo $totalPrice; ?>">
                <td><?php echo $row2['equipment_id'] ?></td>
                <td><?php echo $row2['equipment_name'] ?></td>
                <td><?php echo $row2['equipment_description'] ?></td>
                <td><?php echo $row['equipment_handled_project_equipment_count'] ?></td>
                <td><?php echo "₱ " . number_format($row2['equipment_price'], 2); ?></td>
               
                <td i><?php echo "₱ " . number_format($totalPrice, 2);  ?></td>
            </tr>
            <?php
            }
        }
    }

?>
    