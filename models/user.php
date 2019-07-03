<?php
// User model has the only session_start() function to initiate sessions in the server
session_start();

class User
{
    public static $serverConnection;
    
    // Initializes the server connection with the creation of new object
    public function __construct(){

        // If the connection to server has already been made this will return a instance without creating a new connection to the server
        if(!isset(static::$serverConnection)) {

            // If connection to server is not established, new connection will be made and instance will be stored in $serverConnection property
            $dbConnection = new DBConnect();
            global $serverConnection;
            static::$serverConnection = $dbConnection->serverInstance();
        }

        // Will return the instance of the database aka server connection
        return static::$serverConnection;
    }

    // To display all users from the database
    public static function displayAllUsers() {

        // All values from the databse in categories table will be returned
        $query = "SELECT * FROM users";

        // Executing query to get table values. First parameter is the mysqli object of server connection, second will be the query to be executed
        $queryResult = mysqli_query(self::$serverConnection, $query);

        // Method will return the instance to be called upon to display the tables values
        return $queryResult;
    }

    // To get all user count from the database
    public static function displayUserCount() {

        $query = "SELECT * FROM users";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To get all active user count from the database
    public static function displayActiveUserCount() {

        $query = "SELECT * FROM users WHERE user_status = 'Active'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To get all disabled user count from the database
    public static function displayDisabledUserCount() {

        $query = "SELECT * FROM users WHERE user_status = 'Disabled'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To get user_id form an user from the database
    public static function getUserId($username){

        $username = mysqli_real_escape_string(self::$serverConnection, $username);

        $query = "SELECT user_id FROM users WHERE username = '$username'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $u_id = null;

        while($row = mysqli_fetch_assoc($queryResult)){
            $u_id = $row['user_id'];
        }

        return $u_id;

    }

    // To display specific user from the database
    public static function displaySingleUser($u_id) {

        $u_id = mysqli_real_escape_string(self::$serverConnection, $u_id);

        $query = "SELECT * FROM users WHERE user_id = '$u_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To add new user to the database
    public static function addUser($username, $password, $u_first_name, $u_last_name, $u_email, $u_avatar, $u_role) {

        $u_id =  uniqid();
        $username = mysqli_real_escape_string(self::$serverConnection, $username);
        $password = mysqli_real_escape_string(self::$serverConnection, $password);
        $u_first_name = mysqli_real_escape_string(self::$serverConnection, $u_first_name);
        $u_last_name = mysqli_real_escape_string(self::$serverConnection, $u_last_name);
        $u_email = mysqli_real_escape_string(self::$serverConnection, $u_email);
        $u_avatar = mysqli_real_escape_string(self::$serverConnection, $u_avatar);
        $u_role = mysqli_real_escape_string(self::$serverConnection, $u_role);

        $password = self::encryptUser($password);

        $query = "INSERT INTO users(user_id,username, user_password, user_firstName, user_lastName, user_email, user_image, user_role) ";
        $query.= " VALUES ('$u_id', '$username', '$password', '$u_first_name', '$u_last_name', '$u_email', '$u_avatar', '$u_role')";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To update existing user from the database
    public static function updateUser($username, $u_first_name, $u_last_name, $u_email, $u_image, $u_role, $u_id) {

        $username = mysqli_real_escape_string(self::$serverConnection, $username);
        $u_first_name = mysqli_real_escape_string(self::$serverConnection, $u_first_name);
        $u_last_name = mysqli_real_escape_string(self::$serverConnection, $u_last_name);
        $u_email = mysqli_real_escape_string(self::$serverConnection, $u_email);
        $u_image = mysqli_real_escape_string(self::$serverConnection, $u_image);
        $u_role = mysqli_real_escape_string(self::$serverConnection, $u_role);
        $u_id = mysqli_real_escape_string(self::$serverConnection, $u_id);

        
        $query = "UPDATE users SET ";
        $query .= "username = '$username',";
        $query .= "user_firstName = '$u_first_name',";
        $query .= "user_lastName = '$u_last_name',";
        $query .= "user_email = '$u_email',";
        $query .= "user_image = '$u_image',";
        $query .= "user_role = '$u_role'";
        $query .= "WHERE user_id = '$u_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To activate access for a existing user from the database
    public static function activateUser($u_id) {

        $u_id = mysqli_real_escape_string(self::$serverConnection, $u_id);

        $query = "UPDATE users SET ";
        $query .= "user_status = 'Active'";
        $query .= "WHERE users.user_id = '$u_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To disable access for an existing user from the database
    public static function disableUser($u_id) {

        $u_id = mysqli_real_escape_string(self::$serverConnection, $u_id);

        $query = "UPDATE users SET ";
        $query .= "user_status = 'Disabled'";
        $query .= "WHERE users.user_id = '$u_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To delete existing user from the database
    public static function deleteUser($u_id) {

        $query = "DELETE FROM users WHERE users.user_id = '$u_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To check user credientials from the database against login credentials
    public static function validateUser($username, $password) {

        include 'activity.php';
        $activity = new Activity();

        $username = mysqli_real_escape_string(self::$serverConnection, $username);
        $password = mysqli_real_escape_string(self::$serverConnection, $password);

        $password = self::encryptUser($password);

        $query = "SELECT * FROM users WHERE (username = '$username' OR user_email = '$username') AND user_password = '$password' AND user_status = 'Active'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        if($queryRowCount != 0){

            while($row = mysqli_fetch_assoc($queryResult)){

                $_SESSION['u_id'] = $row['user_id'];
                $activity->recordLoggedActivity($row['user_id']);
                $activity->recordAccessActivityInfo($row['user_id']);
                $_SESSION['username'] = $row['username'];
                $_SESSION['u_f_name'] = $row['user_firstName'];
                $_SESSION['u_l_name'] = $row['user_lastName'];
                $_SESSION['u_mail'] = $row['user_email'];
                $_SESSION['u_avatar'] = $row['user_image'];
                $_SESSION['u_type'] = $row['user_role'];
                $_SESSION['u_reg_date'] = $row['user_reg_date'];
                $_SESSION['s_id'] = uniqid();
            
            }

            return $queryResult;

        }else{
            
            return 0;
        }
    }

    // To encrypt user password
    public static function encryptUser($password){
        
        $password = mysqli_real_escape_string(self::$serverConnection, $password);

        $new_password = null;

        for($i = 0; $i<=10; $i++){
            global $new_password;
            $new_password = hash('ripemd320', $i*(0.3+2).$password.$i*2);
        }
        
        return $new_password;
    }

    // To reset user password
    public static function resetUserPassword($password, $user_id){

        // $user_id = mysqli_real_escape_string(self::$serverConnection, $user_id);
        $password = mysqli_real_escape_string(self::$serverConnection, $password);

        $new_password = self::encryptUser($password);

        $updateCurrentPasswordQuery = mysqli_prepare(self::$serverConnection, "UPDATE users SET user_password=? WHERE users.user_id=?");

        mysqli_stmt_bind_param($updateCurrentPasswordQuery, "ss", $new_password, $user_id);
        
        mysqli_stmt_execute($updateCurrentPasswordQuery);

        if(!$updateCurrentPasswordQuery){
            die('QUERY FAILED : '. mysqli_error(self::$serverConnection));
        }else{
            return $updateCurrentPasswordQuery;
        }
    }

    // To check username avaliability form database for new users
    public static function checkUsernameAvailability($username) {

        $username = mysqli_real_escape_string(self::$serverConnection, $username);

        $query = "SELECT username FROM users WHERE username = '$username'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        return mysqli_num_rows($queryResult);
    }

    // To check email avaliability form database for new users
    public static function checkEmailAvailability($email) {

        $email = mysqli_real_escape_string(self::$serverConnection, $email);

        $query = "SELECT user_email FROM users WHERE user_email = '$email'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        return mysqli_num_rows($queryResult);
    }

}


?>