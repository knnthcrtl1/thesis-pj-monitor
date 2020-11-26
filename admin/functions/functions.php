<?php

function authPages($id="", $pageName="", $conn="") {
	
    $sql = "SELECT * FROM tbl_users WHERE user_user_id = '{$id}'";
    $result = mysqli_query($conn, $sql);

    // $userLevel = mysqli_fetch_array($result)['user_level'];
    $userLvl = mysqli_fetch_array($result, MYSQLI_BOTH);

    $userLevel = $userLvl['user_level'];

    $sql = "SELECT * FROM tbl_restriction_page WHERE restriction_page_user_level LIKE '%{$userLevel}%'";
    $result = mysqli_query($conn, $sql);

    $pages = [];

    while($row = mysqli_fetch_assoc($result)) {
        array_push($pages, $row["restriction_page_name"]);
    }

    return $pages;

}

function checkAuthPage($userAuthPages=[], $page="") {
    if ( !in_array($page, $userAuthPages) ) {
        header("Location: index.php");
    }
}

function authActions($id="", $actionName="", $conn="") {
	
    $sql = "SELECT * FROM tbl_users WHERE user_user_id = '{$id}'";
    $result = mysqli_query($conn, $sql);

    $userLevel = mysqli_fetch_array($result)['user_level'];

    $sql = "SELECT * FROM tbl_restriction_action WHERE restriction_action_user_level LIKE '%{$userLevel}%'";
    $result = mysqli_query($conn, $sql);

    $actions = [];

    while($row = mysqli_fetch_assoc($result)) {
        array_push($actions, $row["restriction_action_name"]);
    }

    return $actions;

}

function checkAuthAction($userAuthAction=[], $action="") {
    if ( in_array($action, $userAuthAction) ) {
        return true;
    } else{
        return false;
    }
}

// function auditTrail($userId="", $action, $conn="") {
		
//     $sql = "SELECT user_username FROM tbl_users WHERE user_id = {$userId}";
//     $userUserName = mysqli_fetch_assoc(mysqli_query($conn, $sql))['user_username'];

//     $sql = "INSERT INTO tbl_audit (audit_username,audit_action) VALUES ('{$userUserName}','{$action}')";
//     mysqli_query($conn, $sql);
    
// }   
function auditTrail($userId="", $action, $projectId, $taskId, $taskStatus, $clientId, $conn) {
		
    $sql = "SELECT user_username FROM tbl_users WHERE user_user_id = {$userId}";
    $userUserName = mysqli_fetch_assoc(mysqli_query($conn, $sql))['user_username'];
    
    if (!mysqli_query($conn, $sql)) {
        echo("Error description: " . mysqli_error($conn));
    }

    $sql = "INSERT INTO tbl_audit (audit_username,audit_action,audit_task_id,audit_project_id,audit_task_status,audit_client_id) VALUES ('{$userUserName}','{$action}','{$taskId}','{$projectId}','{$taskStatus}','{$clientId}')";

    if (!mysqli_query($conn, $sql)) {
        echo("Error description: " . mysqli_error($conn));
    }
    
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

function checkContractorIfExistInProjectData($conn, $userId) {
        
    $sql = "SELECT * FROM tbl_projects WHERE project_contractor_name = '{$userId}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    
    if($row == 1){
        echo $row;
        return false;
    }

    return true;

}

function checkEquipmentIfExistInProjectData($conn, $id) {
        
    $sql = "SELECT * FROM tbl_equipments WHERE equipment_project_id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    
    if($row > 0){
        echo $row;
        return false;
    }

    return true;

}



function getUsualPassword() {
    $usualPassword = "123456";
    return md5($usualPassword);
}



?>