<?php

    include('../connection.php');

    $sql = "SELECT * FROM tbl_engineers";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['engineer_id'] ?></td>
            <td><?php echo $row['engineer_firstname'] ?></td>
            <td><?php echo $row['engineer_middlename'] ?></td>
            <td><?php echo $row['engineer_lastname'] ?></td>
            <td><?php echo $row['engineer_age'] ?></td>
            <td><?php echo $row['engineer_birthdate'] ?></td>
            <td><?php echo $row['engineer_email'] ?></td>
            <td><?php echo $row['engineer_contact_number'] ?></td>
            <td><?php echo $row['engineer_gender'] ?></td>
            <td><?php echo "PHP " . number_format($row['engineer_salary'], 2); ?></td>
            <td style="display:flex;flex-direction:row">
              <a class="btn btn-success" href="edit_engineer.php?id=<?php echo $row['engineer_id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
            &nbsp;
            <span id="delete-engineer" class="btn btn-danger" delete-id="<?php echo $row['engineer_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
          </tr>
        <?php
        }
    }
?>
    