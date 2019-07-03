<?php
include "../models/db.php";

include '../models/user.php';

$user = new User();

$user_data = array();

$displayAllUsers = $user->displayAllUsers();

while($row = mysqli_fetch_assoc($displayAllUsers)){
    $u_id = $row['user_id'];
    $username = $row['username'];
    $u_first_name = $row['user_firstName'];
    $u_last_name = $row['user_lastName'];
    $u_email = $row['user_email'];
    $u_image = $row['user_image'];
    $u_role = $row['user_role'];
    $u_status = $row['user_status'];
    
    $action = "activate-user";
    $icon = "unlock";
    $btn_name = "Activate";
    $btn_color = "success";

    if($u_status == 'Active') {
        $action = "disable-user";
        $icon = "lock";
        $btn_name = "Disable";
        $btn_color = "secondary";
    }

    $user_data[] = array(
        'Id' =>  "<input class='checkBoxes' type='checkbox' name='userIdCheckBoxArray[]' value='$u_id'>",
        'Avatar' => "<a class='image-popup-no-margins pr-3' href='/iHeartCoding/public/upload/users/$u_image'><img class='img-fluid rounded-circle' alt='$u_image' src='/iHeartCoding/public/upload/users/$u_image' width='35'></a><input class='checkBoxes' type='checkbox' name='userImagCheckBoxArray[]' value='$u_image' checked hidden>",
        'First_Name' => "$u_first_name",
        'Last_Name' =>  "$u_last_name",
        'Email' => "$u_email",
        'Username' => "$username",
        'Role' => "$u_role",
        'Status' => "$u_status",
        'Account' => "<button type='button' class='btn btn-outline-$btn_color btn-sm sa-$action' id_ref='$u_id'><i class='ti-$icon'></i> $btn_name</button>",
        'View' => "<a href='/iHeartCoding/Admin/User/View/$u_id' class='btn btn-outline-info btn-sm'><i class='ti-view-list-alt pr-1'></i> View</a>",
        'Delete' => "<button type='button' class='btn btn-outline-danger btn-sm sa-delete-user' id_ref='$u_id' img_ref='$u_image'><i class='ti-trash pr-1'></i> Delete</button>"
    );
}

$myJSON = json_encode(array('data' => $user_data));

echo $myJSON;

?>
