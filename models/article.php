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

    // To get all article count from the database
    public static function displayAllArticleCount() {

        $query = "SELECT * FROM articles";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To get all drafted article count from the database
    public static function displayAllDraftedArticleCount() {

        $query = "SELECT * FROM articles WHERE article_status = 'Drafted'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To display all published articles from the database
    public static function displayAllPublishedArticles() {

        $query = "SELECT * FROM articles WHERE article_status = 'Published' ORDER BY article_date DESC";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display all published articles from the database
    public static function displayAllPublishedArticleCount() {

        $query = "SELECT * FROM articles WHERE article_status = 'Published'";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To display all latest published articles from the database
    public static function displayAllLatestPublishedArticles() {

        $query = "SELECT * FROM articles WHERE article_status = 'Published' ORDER BY article_date DESC LIMIT 3";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display all published articles with pagination from the database
    public static function displayAllPublishedArticlesWithPagination($start_from, $per_page) {

        $start_from = mysqli_real_escape_string(self::$serverConnection, $start_from);
        $per_page = mysqli_real_escape_string(self::$serverConnection, $per_page);

        $query = "SELECT * FROM articles WHERE article_status = 'Published' ORDER BY article_date DESC LIMIT $start_from, $per_page";

        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display specific published article from the database
    public static function displayPublishedSingleArticle($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        // Constructing query as a prepared statement
        $getSingleArticleQuery = mysqli_prepare(self::$serverConnection, "SELECT article_id, article_category_id, article_title, article_author, author_id, article_date, article_image, article_content, article_tags, article_comment_count, article_status, article_view_count FROM articles WHERE article_id = ? AND article_status = ?");
        
        // Only variables can be passed into a prepared statement
        $articleType = 'Published';

        // s -> string
        mysqli_stmt_bind_param($getSingleArticleQuery, "ss", $a_id, $articleType);
        
        // Executing prepared statement
        mysqli_stmt_execute($getSingleArticleQuery);

        if(!$getSingleArticleQuery){
            die('QUERY FAILED : '. mysqli_error(self::$serverConnection));
        }else{
            // Returning mysqli_stmt Object (Results of the query execution)
            return $getSingleArticleQuery;
        }
    }

    // To display specific published/unpublished article from the database
    public static function displaySingleArticle($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        // Constructing query as a prepared statement
        $getSingleArticleQuery = mysqli_prepare(self::$serverConnection, "SELECT article_id, article_category_id, article_title, article_author, author_id, article_date, article_image, article_content, article_tags, article_comment_count, article_status, article_view_count FROM articles WHERE article_id = ?");
        
        // s -> string
        mysqli_stmt_bind_param($getSingleArticleQuery, "s", $a_id);
        
        // Executing prepared statement
        mysqli_stmt_execute($getSingleArticleQuery);

        if(!$getSingleArticleQuery){
            die('QUERY FAILED : '. mysqli_error(self::$serverConnection));
        }else{
            // Returning mysqli_stmt Object (Results of the query execution)
            return $getSingleArticleQuery;
        }
    }    

    // To display all articles for a specific author from the database
    public static function displayAuthorArticles($auth_id) {

        $auth_id = mysqli_real_escape_string(self::$serverConnection, $auth_id);

        $query = "SELECT * FROM articles WHERE author_id = '$auth_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display published articles form a specific author from the database
    public static function displayPublishedAuthorArticles($auth_id) {

        $auth_id = mysqli_real_escape_string(self::$serverConnection, $auth_id);

        $query = "SELECT * FROM articles WHERE author_id = '$auth_id' AND article_status = 'Published'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To get article count form a specific author from the database
    public static function displayAuthorArticleCount($auth_id) {

        $auth_id = mysqli_real_escape_string(self::$serverConnection, $auth_id);

        $query = "SELECT * FROM articles WHERE author_id = '$auth_id' AND article_status = 'Published'";
        
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To display all categories related to a specific author from the database
    public static function displayAuthorCategories($auth_id) {

        $auth_id = mysqli_real_escape_string(self::$serverConnection, $auth_id);

        $query = "SELECT article_tags FROM articles WHERE author_id = '$auth_id'  AND article_status = 'Published' GROUP BY article_tags";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display specific article for editing from the database
    public static function displaySingleArticleToEdit($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        // Constructing query as a prepared statement
        $displaySingleArticleToEdit = mysqli_prepare(self::$serverConnection, "SELECT article_id, article_category_id, article_title, article_author, author_id, article_date, article_image, article_content, article_tags, article_comment_count, article_status, article_view_count FROM articles WHERE article_id = ?");
        
        // s -> string
        mysqli_stmt_bind_param($displaySingleArticleToEdit, "s", $a_id);
        
        // Executing prepared statement
        mysqli_stmt_execute($displaySingleArticleToEdit);

        if(!$displaySingleArticleToEdit){
            die('QUERY FAILED : '. mysqli_error(self::$serverConnection));
        }else{
            // Returning mysqli_stmt Object (Results of the query execution)
            return $displaySingleArticleToEdit;
        }
    }

    // To display specific article title from the database
    public static function displaySingleArticleTitle($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        $query = "SELECT article_title FROM articles WHERE article_id = '$a_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $a_title = "";

        while($row = mysqli_fetch_assoc($queryResult)){
            $a_title = $row['article_title'];
        }

        return $a_title;
    }

    // To get article category count from the database
    public static function getArticleCategoryCount($cat_title){

        $cat_title = mysqli_real_escape_string(self::$serverConnection, $cat_title);

        $query = "SELECT COUNT(*) AS 'count' FROM articles WHERE article_tags = '$cat_title'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $tag_count = null;

        while($row = mysqli_fetch_assoc($queryResult)){
            $tag_count = $row['count'];
        }

        return $tag_count;

    }

    // To display searched article from the database
    public static function displaySearchedeArticles($s_keyword) {

        $s_keyword = mysqli_real_escape_string(self::$serverConnection, $s_keyword);

        $query = "SELECT * FROM articles WHERE article_status = 'Published' AND article_tags LIKE '%$s_keyword%' ORDER BY articles.article_date";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To display searched article count from the database
    public static function displaySearchedeArticleCount($s_keyword) {

        $s_keyword = mysqli_real_escape_string(self::$serverConnection, $s_keyword);

        $query = "SELECT * FROM articles WHERE article_status = 'Published' AND article_tags LIKE '%$s_keyword%'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $queryRowCount = mysqli_num_rows($queryResult);

        return $queryRowCount;
    }

    // To add new article to the database
    public static function addArticle($a_cat_id, $a_title, $a_author, $a_image, $a_content, $a_tags, $a_status) {

        $a_cat_id = mysqli_real_escape_string(self::$serverConnection, $a_cat_id);
        $a_title = mysqli_real_escape_string(self::$serverConnection, $a_title);
        $a_author = mysqli_real_escape_string(self::$serverConnection, $a_author);
        $a_image = mysqli_real_escape_string(self::$serverConnection, $a_image);
        $a_content = mysqli_real_escape_string(self::$serverConnection, $a_content);
        $a_tags = mysqli_real_escape_string(self::$serverConnection, $a_tags);
        $a_status = mysqli_real_escape_string(self::$serverConnection, $a_status);

        $query = "INSERT INTO articles(article_category_id, article_title, article_author, article_image, article_content, article_tags, article_status)";
        $query.= " VALUES ($a_cat_id, '$a_title', '$a_author', '$a_image', '$a_content', '$a_tags', '$a_status')";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To update existing article from the database
    public static function updateArticle($a_id, $a_cat_id, $a_title, $a_author, $a_image, $a_content, $a_tags, $a_status) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);
        $a_cat_id = mysqli_real_escape_string(self::$serverConnection, $a_cat_id);
        $a_title = mysqli_real_escape_string(self::$serverConnection, $a_title);
        $a_author = mysqli_real_escape_string(self::$serverConnection, $a_author);
        $a_image = mysqli_real_escape_string(self::$serverConnection, $a_image);
        $a_content = mysqli_real_escape_string(self::$serverConnection, $a_content);
        $a_tags = mysqli_real_escape_string(self::$serverConnection, $a_tags);
        $a_status = mysqli_real_escape_string(self::$serverConnection, $a_status);

        $query = "UPDATE articles SET ";
        $query .= "article_category_id = '$a_cat_id',";
        $query .= "article_title = '$a_title',";
        $query .= "article_author = '$a_author',";
        $query .= "article_image = '$a_image',";
        $query .= "article_content = '$a_content',";
        $query .= "article_tags = '$a_tags',";
        $query .= "article_status = '$a_status' ";
        $query .= "WHERE article_id = '$a_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To update existing article view count from the database
    public static function updateArticleViews($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        $updateArticleViewsQuery = mysqli_prepare(self::$serverConnection, "UPDATE articles SET article_view_count = article_view_count + 1 WHERE article_id = ?");

        mysqli_stmt_bind_param($updateArticleViewsQuery, "s", $a_id);
        
        mysqli_stmt_execute($updateArticleViewsQuery);

        if(!$updateArticleViewsQuery){
            die('QUERY FAILED : '. mysqli_error(self::$serverConnection));
        }else{
            return $updateArticleViewsQuery;
        }
    }

    // To rest existing article view count from the database
    public static function resetArticleViews($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        $query = "UPDATE articles SET article_view_count = 0 WHERE article_id = '$a_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To publish existing article from the database
    public static function publishArticle($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        $query = "UPDATE articles SET ";
        $query .= "article_status = 'Published'";
        $query .= "WHERE articles.article_id = '$a_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To draft existing article from the database
    public static function draftArticle($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        $query = "UPDATE articles SET ";
        $query .= "article_status = 'Drafted'";
        $query .= "WHERE articles.article_id = '$a_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        return $queryResult;
    }

    // To delete existing article from the database
    public static function deleteArticle($a_id) {

        $a_id = mysqli_real_escape_string(self::$serverConnection, $a_id);

        $query = "DELETE FROM articles WHERE articles.article_id = '$a_id'";
        $queryResult = mysqli_query(self::$serverConnection, $query);

        $deleteCommentsQuery = "DELETE FROM comments WHERE comments.article_id = '$a_id'";
        mysqli_query(self::$serverConnection, $deleteCommentsQuery);

        return $queryResult;
    }
}


?>