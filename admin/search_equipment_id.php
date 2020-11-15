
<?php
include('./connection.php');

if (isset($_POST['id'])) {
    $sql = "SELECT * FROM tbl_equipments WHERE equipment_id = '{$_POST['id']}'";
    $result = mysqli_query($conn, $sql);
    $json = array();
    while($row = mysqli_fetch_array ($result))     

        {

            $json = array();
            $data = array(
                'id' => $row['equipment_id'],
                'price' => $row['equipment_price'],
                'count' => $row['equipment_count'],
                'name' => $row['equipment_name'],
                'um' => $row['equipment_description']
            );

            array_push($json, $data);
        }

    $jsonstring = json_encode($json);
    echo $jsonstring;
    die();
}

?>