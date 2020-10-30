<?php

// function auditTrail($userId="", $action, $conn="") {
		
//     $sql = "SELECT user_username FROM tbl_users WHERE user_id = {$userId}";
//     $userUserName = mysqli_fetch_assoc(mysqli_query($conn, $sql))['user_username'];

//     $sql = "INSERT INTO tbl_audit (audit_username,audit_action) VALUES ('{$userUserName}','{$action}')";
//     mysqli_query($conn, $sql);
    
// }   

function checkEmailExist($conn, $email) {
        
    $sql2 = "SELECT * FROM tbl_engineers WHERE engineer_email = '{$email}'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_num_rows($result2);
    
    if($row2 == 1){
         echo $row2;
        return false;
    }

    return true;

}

?>