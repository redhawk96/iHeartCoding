<?php ob_start(); ?>

<?php
// Including Database model
include '../models/db.php';

// Including User model
include '../models/user.php';

// Creating a object of USer class
$user = new User();

// To add user
if(isset($_POST['add_user'])){

    $u_first_name = $_POST['u_firstName'];
    $u_last_name = $_POST['u_lastName'];
    $u_email = $_POST['u_mail'];
    $u_role = $_POST['u_type'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Getting image name 
    $u_image = $_FILES["u_image"]["name"];

    // Getting temporay image name
    $u_image_temp = $_FILES['u_image']['tmp_name'];

    // Getting image extention
    $u_image_extension = end(explode(".", $u_image));

    // Renaming the image with unique number and changing the imge extention to png
    $u_image_final = round(microtime(true)) ."."."png";


    if($u_first_name == "" || empty($u_first_name) || $u_last_name == "" || empty($u_last_name) || $u_email == "" || empty($u_email) || $username == "" || empty($username) || $password == "" || empty($password)){
    
        header('Location: ../Admin/users?add_user=false');
    
    }else{

        $addUser = $user->addUser($username, $password, $u_first_name, $u_last_name, $u_email, $u_image_final, $u_role);

        if(!$addUser){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            // If insert query was successful then image will be moved into the server location
            move_uploaded_file($u_image_temp, "../public/upload/users/$u_image_final");
            header('Location: ../Admin/users');
        }
    }
}

// To update existing user
if(isset($_POST['edit_user'])){

    $u_id = $_POST['edit_user'];
    $u_first_name = $_POST['u_firstName'];
    $u_last_name = $_POST['u_lastName'];
    $u_email = $_POST['u_mail'];
    $u_role = $_POST['u_type'];
    $username = $_POST['username'];
    $u_image_name = $_POST['u_image_name'];

    // Getting image name 
    $u_image = $_FILES["u_image"]["name"];

    // Getting temporay image name
    $u_image_temp = $_FILES['u_image']['tmp_name'];

    // Getting image extention
    $u_image_extension = end(explode(".", $u_image));

    // Renaming the image with unique number and changing the imge extention to png
    $u_image_final = $u_image_name;


    if($u_first_name == "" || empty($u_first_name) || $u_last_name == "" || empty($u_last_name) || $u_email == "" || empty($u_email) || $username == "" || empty($username)){
    
        header('Location: ../Admin/users?edit_user='.$u_id.'&u=false');
    
    }else{

        $updateUser = $user->updateUser($username, $u_first_name, $u_last_name, $u_email, $u_image_final, $u_role, $u_id);
       
        if(!$updateUser){

            die('QUERY FAILED '. mysqli_error($serverConnection));
            
        }else{
            // If update query was successful then image will be moved into the server
            move_uploaded_file($u_image_temp, "../public/upload/users/$u_image_final");
            
            header('Location: ../Admin/users');
        }
    }
}

// To activate user
if(isset($_POST['activate_user'])){

    $u_id = $_POST['activate_user'];

        if($u_id == "" || empty($u_id)){
        
             // su=false -> status update failed
            header('Location: ../Admin/users?su=false');
        
        }else{

        $activateUser = $user->activateUser($u_id);

        if(!$activateUser){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/users');
        }
    }
}

// To disable user
if(isset($_POST['disable_user'])){

    $u_id = $_POST['disable_user'];

        if($u_id == "" || empty($u_id)){
        
            // su=false -> status update failed
            header('Location: ../Admin/users?su=false');
        
        }else{

        $disableUser = $user->disableUser($u_id);

        if(!$disableUser){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            header('Location: ../Admin/users');
        }
    }
}

// To delete existing user
if(isset($_POST['delete_user'])){
    
    $u_id = $_POST['delete_user'];
    $u_image_name = $_POST['u_image_name'];
    
    $deleteUser = $user->deleteUser($u_id);

    if(!$deleteUser){
        
        die('QUERY FAILED '. mysqli_error($serverConnection));
    }else{
        // Deleting image from the server for the specific user
        unlink("../public/upload/users/".$u_image_name);
        header('Location: ../Admin/users');
    }
}

// To apply bulk selection [approve / dismiss / delete]
if(isset($_POST['bulk_apply'])){

    $bulk_option = $_POST['bulk_option'];

    $userIds = $_POST['userIdCheckBoxArray'];
    $userImages = $_POST['userImagCheckBoxArray'];

    switch ($bulk_option) {
        case 'Activate':
            foreach($userIds as  $userId) {
                $user->activateUser($userId);
            }
            break;
        
        case 'Disable':
            foreach($userIds as  $userId) {
                $user->disableUser($userId);
            }
            break;

        case 'Delete':
            foreach($userIds as $index => $userIds ) {
                $user->deleteUser($userIds);
                unlink("../public/upload/users/".$userImages[$index]);
            }
            break;
    }

    header('Location: ../Admin/users');
}
?>
