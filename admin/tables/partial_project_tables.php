<?php

    include('../connection.php');

    $sql = "SELECT * FROM tbl_projects ORDER BY project_id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0){
        while($row = mysqli_fetch_assoc($result)) { 
          ?>
          <tr>
            <td><?php echo $row['project_id'] ?></td>
            <td><?php echo $row['project_contractor_name'] ?></td>
            <td><?php echo $row['project_address'] ?></td>
            <td><?php echo $row['project_telephone'] ?></td>
            <td><?php echo $row['project_work_location'] ?></td>
            <td><?php echo $row['project_issuing_office'] ?></td>
            <td><?php echo $row['project_issuing_addres'] ?></td>
            <td><?php echo $row['project_start_date'] ?></td>
            <td><?php echo $row['project_end_date'] ?></td>
            <td><?php echo $row['project_client_owner'] ?></td>
            <td style="display:flex;flex-direction:row">
              <a class="btn btn-success" href="edit_project.php?id=<?php echo $row['project_id']; ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>
            &nbsp;
            <span id="delete-project" class="btn btn-danger" delete-id="<?php echo $row['project_id'] ?>"><i class="fas fa-fw fa-trash"></i> Delete</span></td>
          </tr>
        <?php
        }
    }
?>
    