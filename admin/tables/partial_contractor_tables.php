<?php

    include('../connection.php');

    $sql = "SELECT * FROM tbl_contractors";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['contractor_id'] ?></td>
            <td><?php echo $row['contractor_name'] ?></td>
            <td><?php echo $row['contractor_email'] ?></td>
            <td><?php echo $row['contractor_telephone'] ?></td>
            <td><?php echo $row['contractor_address'] ?></td>
            <td style="display:flex;flex-direction:row">
              <a class="btn btn-success" href="edit_contractor.php?id=<?php echo $row['contractor_id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
            &nbsp;
            <span id="delete-contractor" class="btn btn-danger" delete-id="<?php echo $row['contractor_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
          </tr>
        <?php
        }
    }
?>
    