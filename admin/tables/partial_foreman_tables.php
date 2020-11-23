<?php

    include('../connection.php');

    $sql = "SELECT * FROM tbl_foreman";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['foreman_id'] ?></td>
            <td><?php echo $row['foreman_firstname'] ?></td>
            <td><?php echo $row['foreman_middlename'] ?></td>
            <td><?php echo $row['foreman_lastname'] ?></td>
            <td><?php echo $row['foreman_age'] ?></td>
            <td><?php echo $row['foreman_birthdate'] ?></td>
            <td><?php echo $row['foreman_email'] ?></td>
            <td><?php echo $row['foreman_contact_number'] ?></td>
            <td><?php echo $row['foreman_gender'] ?></td>
            <td><?php echo "PHP " . number_format($row['foreman_salary'], 2); ?></td>
            <td style="display:flex;flex-direction:row">
              <a class="btn btn-success" href="edit_foreman.php?id=<?php echo $row['foreman_id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
            &nbsp;
            <span id="delete-foreman" class="btn btn-danger" delete-id="<?php echo $row['foreman_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
          </tr>
        <?php
        }
    }
?>
    