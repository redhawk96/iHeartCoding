<?php

class Access
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

     // To get logged user device and location information
    public static function getAccessActivityInfo(){

        $u_agent = $_SERVER['HTTP_USER_AGENT']; 
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $referrer = $_SERVER['HTTP_REFERER'];
        $bname = 'Unknown';
        $platform = 'Unknown';

        //First get the platform
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'Linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'Mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'Windows';
        }
        
        // Next get the name of the useragent seperately
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        } 
        elseif(preg_match('/Firefox/i',$u_agent)) 
        { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        } 
        elseif(preg_match('/Chrome/i',$u_agent)) 
        { 
            $bname = 'Google Chrome'; 
            $ub = "Chrome"; 
        } 
        elseif(preg_match('/Safari/i',$u_agent)) 
        { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        } 
        elseif(preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Opera'; 
            $ub = "Opera"; 
        } 
        elseif(preg_match('/Netscape/i',$u_agent)) 
        { 
            $bname = 'Netscape'; 
            $ub = "Netscape"; 
        } 

        function multiexplode ($delimiters,$string) {
        
            $ready = str_replace($delimiters, $delimiters[0], $string);
            $launch = explode($delimiters[0], $ready);
            return  $launch;
        }
        
        $useragetplatform = multiexplode(array("(",")",";","like","CPU"),$u_agent);

        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipaddress"));
        $country = $geo["geoplugin_countryName"];
        $city = $geo["geoplugin_city"];
        $regionName = $geo["geoplugin_regionName"];

        return array(
            'name'      => $bname,
            'platform'  => $platform,
            'os'        => $useragetplatform[1],
            'version'   => $useragetplatform[3],
            'ip'        => $ipaddress,
            'referrer'  => $referrer,
            'city'      => $city,
            'region'    => $regionName,
            'country'   => $country
        );
    }

    // To record logged user device and location information in to the database
    public static function recordAccessActivityInfo($user_id){

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

    public static function getAccessedDeviceCount($platform){

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

}


?>