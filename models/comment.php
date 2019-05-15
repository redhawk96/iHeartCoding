<?php

class Comment
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

    // To display all comments from the database
    public static function displayAllComments() {

        // All values from the databse in categories table will be returned
        $query = "SELECT * FROM comments ORDER BY comment_date DESC";

        // Executing query to get table values. First parameter is the mysqli object of server connection, second will be the query to be executed
        $queryResult = mysqli_query(self::$serverConnection, $query);

        // Method will return the instance to be called upon to display the tables values
        return $queryResult;
    }

    // To get all comment count from the database
    public static function displayAllCommentCount() {

        $query = "SELECT * FROM comments";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To get all approved comment count from the database
    public static function displayAllApprovedCommentCount() {

        $query = "SELECT * FROM comments WHERE comment_status = 'Approved'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To get all pending comment count from the database
    public static function displayAllPendingCommentCount() {

        $query = "SELECT * FROM comments WHERE comment_status = 'Pending'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To display all commets for a specific article from the database
    public static function displayAllArticleComments($a_id) {

        $query = "SELECT * FROM comments ORDER BY comment_date DESC";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display specific comment from the database
    public static function displaySingleComment($c_id) {

        $query = "SELECT * FROM comments WHERE comment_id = $c_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display all commets for a specific article from the database
    public static function displayApprovedArticleComments($a_id) {

        $query = "SELECT * FROM comments WHERE article_id = $a_id AND comment_status = 'Approved' AND parent_comment_id = 0 ORDER BY comment_date DESC";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To get comment count for a specific article from the database
    public static function displayApprovedArticleCommentCount($a_id) {

        $query = "SELECT * FROM comments WHERE article_id = $a_id AND comment_status = 'Approved' AND parent_comment_id = 0";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To display replies for a comment for a specific article from the database
    public static function displayArticleCommentReplies($a_id, $c_id) {

        $query = "SELECT * FROM comments WHERE article_id = $a_id AND parent_comment_id = $c_id AND comment_status = 'Approved'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To get reply count for a comment for a specific article from the database
    public static function displayArticleCommentRepyCount($a_id, $c_id) {

        $query = "SELECT * FROM comments WHERE article_id = $a_id AND parent_comment_id = $c_id AND comment_status = 'Approved'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To add new comment to the database
    public static function addComment($a_id, $parent_c_id, $c_author, $c_author_email, $c_content) {

        $query = "INSERT INTO comments(article_id, parent_comment_id, comment_author, comment_email, comment_content)";
        $query.= " VALUES ($a_id, '$parent_c_id', '$c_author', '$c_author_email', '$c_content')";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To update existing comment from the database
    public static function updateComment($c_id, $p_com_id, $a_id, $c_author, $c_mail, $c_content) {

        $query = "UPDATE comments SET ";
        $query .= "article_id = '$a_id',";
        $query .= "parent_comment_id = '$p_com_id',";
        $query .= "comment_author = '$c_author',";
        $query .= "comment_email = '$c_mail',";
        $query .= "comment_content = '$c_content'";
        $query .= "WHERE comments.comment_id = $c_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To approve existing comment status from the database
    public static function approveComment($c_id, $a_id) {

        $query = "UPDATE comments SET ";
        $query .= "comment_status = 'Approved'";
        $query .= "WHERE comments.comment_id = $c_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        // Updating article_comment_count to increment by 1
        $updateCountQuery = "UPDATE articles SET article_comment_count = article_comment_count + 1 WHERE article_id = $a_id";
        mysqli_query(self::$serverConnection, $updateCountQuery);

        return $queryResult;
    }

    // To dismiss existing comment status from the database
    public static function dismissComment($c_id, $a_id) {

        $query = "UPDATE comments SET ";
        $query .= "comment_status = 'Pending'";
        $query .= "WHERE comments.comment_id = $c_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        // Updating article_comment_count to decrement by 1
        $updateCountQuery = "UPDATE articles SET article_comment_count = article_comment_count - 1 WHERE article_id = $a_id";
        mysqli_query(self::$serverConnection, $updateCountQuery);

        return $queryResult;
    }

    // To delete existing comment from the database
    public static function deleteComment($c_id) {

        $query = "DELETE FROM comments WHERE comments.comment_id = $c_id";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }
}


?>