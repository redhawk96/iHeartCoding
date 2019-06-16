<?php

class Activity
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


    // To record user first and last logged time to the database
    public static function recordLoggedActivity($u_id) {

        echo $u_id;

        $getUserActivityQuery = "SELECT * FROM user_activity WHERE user_id = '$u_id'";

        $getUserActivityQueryResult = mysqli_query(self::$serverConnection, $getUserActivityQuery);

        $getUserActivityRowCount = mysqli_num_rows($getUserActivityQueryResult);

        if($getUserActivityRowCount != 0){

            $updateLastUserActivityquery = "UPDATE user_activity SET  v_times = v_times + 1  WHERE user_id = '$u_id'";
            mysqli_query(self::$serverConnection, $updateLastUserActivityquery);

        }else{

            $addFirstUserActivityquery = "INSERT INTO user_activity (user_id) VALUES ('$u_id')";
            mysqli_query(self::$serverConnection, $addFirstUserActivityquery);
        }
    }

}


?>