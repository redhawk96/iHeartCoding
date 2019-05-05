<?php
include "db.php";

class Category
{
    public static $serverConnection;
    
    // Initializes the server connection
    public function connectToServer(){

        // If the connection to server has already been made this will return a instance without creating a new connection to the server
        if(!isset(static::$serverConnection)) {

            // If connection to server is not established, new connection will be made and instance will be stored in $serverConnection property
            $dbConnection = new DBConnect();
            static::$serverConnection = $dbConnection->serverInstance();
        }

        // Will return the instance of the database aka server connection
        return static::$serverConnection;
    }

    // To display all categories from the database
    public static function displayAllCategories() {

        // Calling to connectToServer method to get an instance of the server connection
        self::connectToServer();

        // All values from the databse in categories table will be returned
        $query = "SELECT * FROM categories";

        // Executing query to get table values. First parameter is the mysqli object of server connection, second will be the query to be executed
        $queryResult = mysqli_query(self::$serverConnection, $query);

        // Method will return the instance to be called upon to display the tables values
        return $queryResult;
    }

    // To display specific category from the database
    public static function displayOneCategory($cat_id) {

        self::connectToServer();

        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To add new category to the database
    public static function addCategory($cat_title) {

        self::connectToServer();

        $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To update existing category from the database
    public static function updateCategory($cat_id, $cat_title) {

        self::connectToServer();

        $query = "UPDATE categories SET cat_title = '$cat_title' WHERE categories.cat_id = $cat_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To delete existing category from the database
    public static function deleteCategory($cat_id) {

        self::connectToServer();

        $query = "DELETE FROM categories WHERE categories.cat_id = $cat_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }
}


?>