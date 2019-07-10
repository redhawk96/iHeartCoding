<?php

class Satistics
{
    private static $serverConnection;
    private static $lastMonthArticleCount = null;
    private static $currentMonthArticleCount = null;
    private static $lastMonthPublishedArticleCount = null;
    private static $currentMonthPublishedArticleCount = null;
    private static $lastMonthCommentCount = null;
    private static $currentMonthCommentCount = null;
    private static $lastMonthMemberCount = null;
    private static $currentMonthMemberCount = null;

    
    // Initializes the server connection with the creation of new object
    public function __construct(){

        // If the connection to server has already been made this will return a instance without creating a new connection to the server
        if(!isset(static::$serverConnection)) {

            // If connection to server is not established, new connection will be made and instance will be stored in $serverConnection property
            $dbConnection = new DBConnect();
            static::$serverConnection = $dbConnection->serverInstance();
        }

        self::getLastMonthArticleCount();
        self::getCurrentMonthArticleCount();
        self::getLastMonthPublishedArticleCount();
        self::getCurrentMonthPublishedArticleCount();
        self::getCurrentMonthCommentCount();
        self::getLastMonthCommentCount();
        self::getLastMonthMemberCount();
        self::getCurrentMonthMemberCount();

        // Will return the instance of the database aka server connection
        return static::$serverConnection;
    }


    /* ----------------------------------------------------------------
    Common Methods */

    // To set icon according to the comparision 
    public static function setComparisonStatus($comparisonResult){
    
        if($comparisonResult >= 0){
            return "mdi mdi-arrow-up text-success";
        }else{
            return "mdi mdi-arrow-down text-danger";
        }
    }

    /* ----------------------------------------------------------------
    End Common Methods */



    /* ----------------------------------------------------------------
    Article Statistics */

    // To get current month article count from the database
    public static function getCurrentMonthArticleCount() {

        $getCurrentMonthArticleCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'A_COUNT' FROM articles WHERE MONTH(article_date) = MONTH(CURDATE())");
        
        mysqli_stmt_execute($getCurrentMonthArticleCountQuery);

        mysqli_stmt_bind_result($getCurrentMonthArticleCountQuery, $A_COUNT);

        while(mysqli_stmt_fetch($getCurrentMonthArticleCountQuery)):

            self::$currentMonthArticleCount = $A_COUNT;

        endwhile;
    }

    // To get last month article count from the database
    public static function getLastMonthArticleCount() {

        $getLastMonthArticleCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'A_COUNT' FROM articles WHERE MONTH(article_date) = (MONTH(CURDATE())-1)");
        
        mysqli_stmt_execute($getLastMonthArticleCountQuery);

        mysqli_stmt_bind_result($getLastMonthArticleCountQuery, $A_COUNT);

        while(mysqli_stmt_fetch($getLastMonthArticleCountQuery)):

            self::$lastMonthArticleCount = $A_COUNT;

        endwhile;
    }

    // To get article comparison from the database
    public static function getArticleCountComparison(){

        if(self::$lastMonthArticleCount == 0){
            return ((self::$currentMonthArticleCount - self::$lastMonthArticleCount)/1)*10;
        }else{
            return ((self::$currentMonthArticleCount - self::$lastMonthArticleCount)/self::$lastMonthArticleCount)*10;
        }
    }

    // To get current month published article count from the database
    public static function getCurrentMonthPublishedArticleCount() {

        $getCurrentMonthPublishedArticleCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'A_COUNT' FROM articles WHERE MONTH(article_date) = MONTH(CURDATE()) AND article_status = 'Published'");
        
        mysqli_stmt_execute($getCurrentMonthPublishedArticleCountQuery);

        mysqli_stmt_bind_result($getCurrentMonthPublishedArticleCountQuery, $A_COUNT);

        while(mysqli_stmt_fetch($getCurrentMonthPublishedArticleCountQuery)):

            self::$currentMonthPublishedArticleCount = $A_COUNT;

        endwhile;
    }

    // To get last month published article count from the database
    public static function getLastMonthPublishedArticleCount() {

        $getLastMonthPublishedArticleCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'A_COUNT' FROM articles WHERE MONTH(article_date) = (MONTH(CURDATE())-1) AND article_status = 'Published'");
        
        mysqli_stmt_execute($getLastMonthPublishedArticleCountQuery);

        mysqli_stmt_bind_result($getLastMonthPublishedArticleCountQuery, $A_COUNT);

        while(mysqli_stmt_fetch($getLastMonthPublishedArticleCountQuery)):

            self::$lastMonthPublishedArticleCount = $A_COUNT;

        endwhile;
    }

    // To get published article comparison from the database
    public static function getPublishedArticleCountComparison(){

        if(self::$lastMonthPublishedArticleCount == 0){
            return ((self::$currentMonthPublishedArticleCount - self::$lastMonthPublishedArticleCount)/1)*10;
        }else{
            return ((self::$currentMonthPublishedArticleCount - self::$lastMonthPublishedArticleCount)/self::$lastMonthPublishedArticleCount)*10;
        }
    }

    /* ----------------------------------------------------------------
    End Article Statistics */



    /* ----------------------------------------------------------------
    Comment Statistics */

    // To get current month comment count from the database
    public static function getCurrentMonthCommentCount() {

        $getCurrentMonthCommentCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'C_COUNT' FROM comments WHERE MONTH(comment_date) = MONTH(CURDATE())");
        
        mysqli_stmt_execute($getCurrentMonthCommentCountQuery);

        mysqli_stmt_bind_result($getCurrentMonthCommentCountQuery, $C_COUNT);

        while(mysqli_stmt_fetch($getCurrentMonthCommentCountQuery)):

            self::$currentMonthCommentCount = $C_COUNT;

        endwhile;
    }

    // To get last month comment count from the database
    public static function getLastMonthCommentCount() {

        $getLastMonthCommentCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'C_COUNT' FROM comments WHERE MONTH(comment_date) = (MONTH(CURDATE())-1)");
        
        mysqli_stmt_execute($getLastMonthCommentCountQuery);

        mysqli_stmt_bind_result($getLastMonthCommentCountQuery, $C_COUNT);

        while(mysqli_stmt_fetch($getLastMonthCommentCountQuery)):

            self::$lastMonthCommentCount = $C_COUNT;

        endwhile;
    }

    // To get comment comparison from the database
    public static function getCommentCountComparison(){

        if(self::$lastMonthCommentCount == 0){
            return ((self::$currentMonthCommentCount - self::$lastMonthCommentCount)/1)*10;
        }else{
            return ((self::$currentMonthCommentCount - self::$lastMonthCommentCount)/self::$lastMonthCommentCount)*10;
        }
    }

    /* ----------------------------------------------------------------
    End Comment Statistics */



    /* ----------------------------------------------------------------
    Member Statistics */

    // To get current month member count from the database
    public static function getCurrentMonthMemberCount() {

        $getCurrentMonthMemberCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'M_COUNT' FROM users WHERE MONTH(user_reg_date) = MONTH(CURDATE())");
        
        mysqli_stmt_execute($getCurrentMonthMemberCountQuery);

        mysqli_stmt_bind_result($getCurrentMonthMemberCountQuery, $M_COUNT);

        while(mysqli_stmt_fetch($getCurrentMonthMemberCountQuery)):

            self::$currentMonthMemberCount = $M_COUNT;

        endwhile;
    }

    // To get last month member count from the database
    public static function getLastMonthMemberCount() {

        $getLastMonthMemberCountQuery = mysqli_prepare(self::$serverConnection, "SELECT COUNT(*) AS 'M_COUNT' FROM users WHERE MONTH(user_reg_date) = (MONTH(CURDATE())-1)");
        
        mysqli_stmt_execute($getLastMonthMemberCountQuery);

        mysqli_stmt_bind_result($getLastMonthMemberCountQuery, $M_COUNT);

        while(mysqli_stmt_fetch($getLastMonthMemberCountQuery)):

            self::$lastMonthMemberCount = $M_COUNT;

        endwhile;
    }

    // To get member comparison from the database
    public static function getMemberCountComparison(){

        if(self::$lastMonthCommentCount == 0){
            return ((self::$currentMonthMemberCount - self::$lastMonthMemberCount)/1)*10;
        }else{
            return ((self::$currentMonthMemberCount - self::$lastMonthMemberCount)/self::$lastMonthMemberCount)*10;
        }
    }

    /* ----------------------------------------------------------------
    End Member Statistics */
}

   


?>