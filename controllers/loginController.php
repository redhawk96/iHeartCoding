<?php ob_start(); ?>

<?php
// Including Database model
include '../models/db.php';

// Including User model
include '../models/user.php';

// Creating a object of USer class
$user = new User();

// To add user
if(isset($_POST['register_user'])){

    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "Subscriber";

    // Generating a unique name for the user image
    $image_name = round(microtime(true))."."."png";


    if($username == "" || empty($username) || $first_name == "" || empty($first_name) || $last_name == "" || empty($last_name) || $email == "" || empty($email) || $password == "" || empty($password)){
    
        header('Location: ../Login?r=false');
    
    }else{

        $addUser = $user->addUser($username, $password, $first_name, $last_name, $email, $image_name, $role);

        if(!$addUser){
            die('QUERY FAILED '. mysqli_error($serverConnection));
        }else{
            // If registration was successful then copy of the default avatar will be made with a new name in the server directory
            copy("../public/upload/users/avatar6.png", "../public/upload/users/".$image_name);
            header('Location: /iHeartCoding/');
        }
    }
}

// To login user
if(isset($_POST['login_user'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $validateUser = $user->validateUser($username, $password);
        
    if($validateUser !=0 ){

        

        switch($_SESSION['u_type']){
            case 'Subscriber' : header('Location: ../'); break;
            case 'Moderator' : header('Location: ../Admin'); break;
            case 'Administrator' : header('Location: ../Admin/'); break;
        }

    }else{
        header('Location: ../Login?login=false');
    }
}

// To check username availability 
if(isset($_POST['search_username'])){

    $username = $_POST['search_username'];

    $checkUsernameAvailability = $user->checkUsernameAvailability($username);
        
    if($checkUsernameAvailability >=1){
        echo "<span class='lnr lnr-cross-circle' style='right: 0;color: red;'></span><span class='tooltiptext'>Username taken</span>";
    }else{
        echo "<span class='lnr lnr-checkmark-circle' style='right: 0;color: green;'></span><span class='tooltiptext'>Username avaliable</span>";
    }
}

// To check username availability 
if(isset($_POST['search_email'])){

    $email = $_POST['search_email'];

    $checkEmailAvailability = $user->checkEmailAvailability($email);
        
    if($checkEmailAvailability >=1){
        echo "<span class='lnr lnr-cross-circle' style='right: 0;color: red;'></span><span class='tooltiptext'>Email taken</span>";
    }else{
        echo "<span class='lnr lnr-checkmark-circle' style='right: 0;color: green;'></span><span class='tooltiptext'>Email avaliable</span>";
    }
}



?>
