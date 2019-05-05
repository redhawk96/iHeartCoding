<?php ob_start(); ?>

<?php

class DBConnect{

    public static $instance;
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "codeblog";

    public function __construct() {

        $connection = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);

        if($connection){
            return static::$instance = $connection;
        }else{
            header('Location: ./error.php');
            die();
        }
    }

    public static function serverInstance()
    {
        return static::$instance;
    }
}
?>
