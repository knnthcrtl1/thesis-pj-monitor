<?php

    include('../connection.php');

    $sql = "SELECT * FROM tbl_equipments";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['equipment_id'] ?></td>
            <td><?php echo $row['equipment_name'] ?></td>
            <td><?php echo $row['equipment_description'] ?></td>
            <td><?php echo $row['equipment_count'] ?></td>
            <td><?php echo "PHP " . number_format($row['equipment_price'], 2); ?></td>
            <?php 
              $totalPrice =  $row['equipment_count'] * $row['equipment_price'];
            ?>
            <td><?php echo "PHP " . number_format($totalPrice, 2);  ?></td>
            <td>
              <a class="btn btn-success" href="edit_equipment.php?id=<?php echo $row['equipment_id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
            &nbsp;
            <span id="delete-equipment" class="btn btn-danger" delete-id="<?php echo $row['equipment_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
          </tr>
        <?php
        }
    }
?>
    