<?php  
 include('connection.php');


 if(isset($_POST["export_excel"]))  
 {  

      $output = '';  
      $sql = "SELECT * FROM tbl_projects ORDER BY project_id DESC";  
      $result = mysqli_query($conn, $sql);  
      if(mysqli_num_rows($result) > 0)  
      {  

      
           $output .= '  
                <table class="table" bordered="1">  
                     <tr>  
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Contractor Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Work Location</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Client owner</th>
                        <th>Project Timestamp</th>
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {    
                $sql3 = "SELECT * FROM tbl_contractors WHERE contractor_id = '{$row['project_contractor_name']}'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3);
        
                $sql4 = "SELECT * FROM tbl_clients WHERE client_id = '{$row['project_client_owner']}'";
                $result4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_array($result4);

                $output .= '  
                     <tr>  
                          <td>'.$row["project_id"].'</td>  
                          <td>'.$row["project_name"].'</td>  
                          <td>'.$row3["contractor_name"].'</td>
                          <td>'.$row["project_address"].'</td>  
                          <td>'.$row["project_telephone"].'</td>  
                          <td>'.$row["project_work_location"].'</td>  
                          <td>'.$row["project_start_date"].'</td>
                          <td>'.$row["project_end_date"].'</td>  
                          <td>'.$row4["client_name"].'</td>  
                          <td>'.$row["project_timestamp"].'</td>  
                     </tr>  
                ';
           }  
           $output .= '</table>';  
           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=project_records.xls");  
           echo $output;  
      }  
 }

 ?>