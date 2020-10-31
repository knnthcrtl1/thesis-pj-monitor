<?php

    include('../connection.php');

    $sql = "SELECT * FROM tbl_clients";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['client_id'] ?></td>
            <td><?php echo $row['client_name'] ?></td>
            <td><?php echo $row['client_email'] ?></td>
            <td><?php echo $row['client_telephone'] ?></td>
            <td><?php echo $row['client_address'] ?></td>
            <td style="display:flex;flex-direction:row">
              <a class="btn btn-success" href="edit_client.php?id=<?php echo $row['client_id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
            &nbsp;
            <span id="delete-client" class="btn btn-danger" delete-id="<?php echo $row['client_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
          </tr>
        <?php
        }
    }
?>
    