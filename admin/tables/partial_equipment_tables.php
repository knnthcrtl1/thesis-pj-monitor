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
            <td><?php 
              $sql2 = "SELECT * FROM tbl_equipment_categories WHERE equipment_category_id = '{$row['equipment_category_id']}'";
              $result2 = mysqli_query($conn, $sql2);
              if (mysqli_num_rows($result2) != 0){
                while($row2 = mysqli_fetch_assoc($result2)) { 
                  echo $row2['equipment_category_name'];
                }
              }
              ?>
            </td>
            <td><?php echo $row['equipment_count'] ?></td>
            <td>
              <a class="btn btn-success" href="edit_equipment.php?id=<?php echo $row['equipment_id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
            &nbsp;
            <span id="delete-equipment" class="btn btn-danger" delete-id="<?php echo $row['equipment_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
          </tr>
        <?php
        }
    }
?>
    