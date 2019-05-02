<?php

class DBConnect
{
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "codeblog";

    function connectToServer() {
        $connection = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);

        if($connection){
            return $connection;
        }else{
            header('Location: ./504.php');
            die();
        }

    }
}

?>
