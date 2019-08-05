<?php

class Error
{
    public static $serverConnection;
    
    // Initializes the server connection with the creation of new object
    public function __construct(){

        // If the connection to server has already been made this will return a instance without creating a new connection to the server
        if(!isset(static::$serverConnection)) {

            // If connection to server is not established, new connection will be made and instance will be stored in $serverConnection property
            $dbConnection = new DBConnect();
            static::$serverConnection = $dbConnection->serverInstance();
        }

        // Will return the instance of the database aka server connection
        return static::$serverConnection;
    }

    // To record logged user device and location information in to the database
    public static function recordError($u_id, $error){

        $user_id = mysqli_real_escape_string(self::$serverConnection, $user_id);

        $accessInfo = self::getAccessActivityInfo();

        $page_reffer = $accessInfo['referrer'];
        $platform = $accessInfo['platform'];
        $os = $accessInfo['os'];
        $version = $$accessInfo['version'];
        $browser_name = $accessInfo['name']; 
        $ip = $accessInfo['ip'];
        $city = $accessInfo['city'];
        $region = $$accessInfo['region'];
        $country = $accessInfo['country'];

        $recordAccessActivityQuery = mysqli_prepare(self::$serverConnection, "INSERT INTO logged_info(`user_id`, page_referrer, logged_platform, device_os, os_version, logged_device_browser, logged_ip, logged_city, logged_region, logged_country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param($recordAccessActivityQuery, "ssssssssss", $user_id, $page_reffer, $platform, $os, $version, $browser_name, $ip, $city, $region, $country );
        
        mysqli_stmt_execute($recordAccessActivityQuery);

        if(!$recordAccessActivityQuery){
            die('QUERY FAILED : '. mysqli_error(self::$serverConnection));
        }else{
            return $recordAccessActivityQuery;
        }
    }

    public static function getUnresolvedErrors(){

        $platform = mysqli_real_escape_string(self::$serverConnection, $platform);

        $cccessedDeviceCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(logged_platform) AS 'P_COUNT' FROM logged_info WHERE logged_platform = ?");

        mysqli_stmt_bind_param($cccessedDeviceCountQuery, "s", $platform);
        
        mysqli_stmt_execute($cccessedDeviceCountQuery);

        mysqli_stmt_bind_result($cccessedDeviceCountQuery, $l_platform);

        $logged_platform = null; 

        while(mysqli_stmt_fetch($cccessedDeviceCountQuery)):

            $logged_platform = $l_platform; 

        endwhile;

        return $logged_platform;
    }

    public static function getResolvedErrors(){

        $platform = mysqli_real_escape_string(self::$serverConnection, $platform);

        $cccessedDeviceCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(logged_platform) AS 'P_COUNT' FROM logged_info WHERE logged_platform = ?");

        mysqli_stmt_bind_param($cccessedDeviceCountQuery, "s", $platform);
        
        mysqli_stmt_execute($cccessedDeviceCountQuery);

        mysqli_stmt_bind_result($cccessedDeviceCountQuery, $l_platform);

        $logged_platform = null; 

        while(mysqli_stmt_fetch($cccessedDeviceCountQuery)):

            $logged_platform = $l_platform; 

        endwhile;

        return $logged_platform;
    }

    public static function updateErrorStatus($e_id){

        $platform = mysqli_real_escape_string(self::$serverConnection, $platform);

        $cccessedDeviceCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(logged_platform) AS 'P_COUNT' FROM logged_info WHERE logged_platform = ?");

        mysqli_stmt_bind_param($cccessedDeviceCountQuery, "s", $platform);
        
        mysqli_stmt_execute($cccessedDeviceCountQuery);

        mysqli_stmt_bind_result($cccessedDeviceCountQuery, $l_platform);

        $logged_platform = null; 

        while(mysqli_stmt_fetch($cccessedDeviceCountQuery)):

            $logged_platform = $l_platform; 

        endwhile;

        return $logged_platform;
    }

    public static function deleteError($e_id){

        $user_id = mysqli_real_escape_string(self::$serverConnection, $user_id);

        $accessInfo = self::getAccessActivityInfo();

        $page_reffer = $accessInfo['referrer'];
        $platform = $accessInfo['platform'];
        $os = $accessInfo['os'];
        $version = $$accessInfo['version'];
        $browser_name = $accessInfo['name']; 
        $ip = $accessInfo['ip'];
        $city = $accessInfo['city'];
        $region = $$accessInfo['region'];
        $country = $accessInfo['country'];

        $recordAccessActivityQuery = mysqli_prepare(self::$serverConnection, "INSERT INTO logged_info(`user_id`, page_referrer, logged_platform, device_os, os_version, logged_device_browser, logged_ip, logged_city, logged_region, logged_country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param($recordAccessActivityQuery, "ssssssssss", $user_id, $page_reffer, $platform, $os, $version, $browser_name, $ip, $city, $region, $country );
        
        mysqli_stmt_execute($recordAccessActivityQuery);

        if(!$recordAccessActivityQuery){
            die('QUERY FAILED : '. mysqli_error(self::$serverConnection));
        }else{
            return $recordAccessActivityQuery;
        }
    }   

}


?>