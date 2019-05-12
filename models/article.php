<?php

class Article
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

    // To display all published/drafts articles from the database
    public static function displayAllArticles() {

        // All values from the databse in categories table will be returned
        $query = "SELECT * FROM articles ORDER BY article_date DESC";

        // Executing query to get table values. First parameter is the mysqli object of server connection, second will be the query to be executed
        $queryResult = mysqli_query(self::$serverConnection, $query);

        // Method will return the instance to be called upon to display the tables values
        return $queryResult;
    }

    // To display all published articles from the database
    public static function displayAllPublishedArticles() {

        // All values from the databse in categories table will be returned
        $query = "SELECT * FROM articles WHERE article_status = 'Published' ORDER BY article_date DESC";

        // Executing query to get table values. First parameter is the mysqli object of server connection, second will be the query to be executed
        $queryResult = mysqli_query(self::$serverConnection, $query);

        // Method will return the instance to be called upon to display the tables values
        return $queryResult;
    }

    // To display all published articles from the database
    public static function displayAllPublishedArticleCount() {

        // All values from the databse in categories table will be returned
        $query = "SELECT * FROM articles WHERE article_status = 'Published'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To display specific article from the database
    public static function displaySingleArticle($a_id) {

        $query = "SELECT * FROM articles WHERE article_id = $a_id AND article_status = 'Published'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display specific article title from the database
    public static function displaySingleArticleTitle($a_id) {

        $query = "SELECT article_title FROM articles WHERE article_id = $a_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $a_title = "";

        while($row = mysqli_fetch_assoc($queryResult)){
            $a_title = $row['article_title'];
        }

        return $a_title;
    }

    // To display searched article from the database
    public static function displaySearchedeArticles($s_keyword) {

        $query = "SELECT * FROM articles WHERE article_status = 'Published' AND article_tags LIKE '%$s_keyword%' ORDER BY articles.article_date";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display searched article count from the database
    public static function displaySearchedeArticleCount($s_keyword) {

        $query = "SELECT * FROM articles WHERE article_status = 'Published' AND article_tags LIKE '%$s_keyword%'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To add new article to the database
    public static function addArticle($a_cat_id, $a_title, $a_author, $a_image, $a_content, $a_tags, $a_status) {

        $query = "INSERT INTO articles(article_category_id, article_title, article_author, article_image, article_content, article_tags, article_status)";
        $query.= " VALUES ($a_cat_id, '$a_title', '$a_author', '$a_image', '$a_content', '$a_tags', '$a_status')";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To update existing article from the database
    public static function updateArticle($a_id, $a_cat_id, $a_title, $a_author, $a_image, $a_content, $a_tags, $a_status) {

        $query = "UPDATE articles SET ";
        $query .= "article_category_id = '$a_cat_id',";
        $query .= "article_title = '$a_title',";
        $query .= "article_author = '$a_author',";
        $query .= "article_image = '$a_image',";
        $query .= "article_content = '$a_content',";
        $query .= "article_tags = '$a_tags',";
        $query .= "article_status = '$a_status' ";
        $query .= "WHERE article_id = $a_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To publish existing article from the database
    public static function publishArticle($a_id) {

        $query = "UPDATE articles SET ";
        $query .= "article_status = 'Published'";
        $query .= "WHERE articles.article_id = $a_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To draft existing article from the database
    public static function draftArticle($a_id) {

        $query = "UPDATE articles SET ";
        $query .= "article_status = 'Drafted'";
        $query .= "WHERE articles.article_id = $a_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To delete existing article from the database
    public static function deleteArticle($a_id) {

        $query = "DELETE FROM articles WHERE articles.article_id = $a_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $deleteCommentsQuery = "DELETE FROM comments WHERE comments.article_id = $a_id";
        mysqli_query(self::$serverConnection, $deleteCommentsQuery);

        return $queryResult;
    }
}


?>