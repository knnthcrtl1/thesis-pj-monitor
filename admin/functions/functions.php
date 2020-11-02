<?php

// function auditTrail($userId="", $action, $conn="") {
		
//     $sql = "SELECT user_username FROM tbl_users WHERE user_id = {$userId}";
//     $userUserName = mysqli_fetch_assoc(mysqli_query($conn, $sql))['user_username'];

//     $sql = "INSERT INTO tbl_audit (audit_username,audit_action) VALUES ('{$userUserName}','{$action}')";
//     mysqli_query($conn, $sql);
    
// }   

function checkEmailExist($conn, $email) {
        
    $sql2 = "SELECT * FROM tbl_users WHERE user_username = '{$email}'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_num_rows($result2);
    
    if($row2 == 1){
         echo $row2;
        return false;
    }

    return true;

}

function checkEngineerExistInProject($conn, $projectId, $engineerId) {
        
    $sql = "SELECT * FROM tbl_user_handled_projects WHERE user_handled_project_project_id = '{$projectId}' AND user_handled_project_engineer_id = '{$engineerId}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    
    if($row == 1){
        echo $row;
        return false;
    }

    return true;

}

function checkUserIfExistInProjectData($conn, $userId) {
        
    $sql = "SELECT * FROM tbl_user_handled_projects WHERE user_handled_project_engineer_id = '{$userId}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    
    if($row == 1){
        echo $row;
        return false;
    }

    return true;

}

function checkClientIfExistInProjectData($conn, $userId) {
        
    $sql = "SELECT * FROM tbl_projects WHERE project_client_owner = '{$userId}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    
    if($row == 1){
        echo $row;
        return false;
    }

    return true;

}

?>