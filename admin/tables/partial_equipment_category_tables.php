<?php

    include('../connection.php');

    $sql = "SELECT * FROM tbl_equipment_categories";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['equipment_category_id'] ?></td>
            <td><?php echo $row['equipment_category_name'] ?></td>
            <td><?php echo $row['equipment_category_description'] ?></td>
            <td>
            <?php
            $sql2 = "SELECT * FROM tbl_equipments WHERE equipment_category_id = '{$row['equipment_category_id']}'";
            $result2 = mysqli_query($conn, $sql2);
            // echo $result2->num_rows;
            echo mysqli_num_rows($result2);
            ?>
            </td>
            <td>
              <a class="btn btn-success" href="edit_equipment_category.php?id=<?php echo $row['equipment_category_id']; ?>"><i class="fas fa-fw fa-edit"></i>  Edit</a>
             &nbsp;
            <span id="delete-equipment-category" class="btn btn-danger" delete-id="<?php echo $row['equipment_category_id'] ?>"><i class="fas fa-fw fa-trash"></i>  Delete</span>
            </td>
          </tr>
        <?php
        }
    }
?>
    