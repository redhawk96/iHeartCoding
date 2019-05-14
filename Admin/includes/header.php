<?php ob_start(); 

include "../models/db.php";

// Including models
include '../models/article.php';
include '../models/category.php';
include '../models/comment.php';
include '../models/user.php';

// Creating a object of model classes
$article = new Article();
$category = new Category();
$comment= new Comment();
$user = new User();

//Redirecting non-administrators to the home page
if($_SESSION['u_type'] != 'Administrator'){
    header('Location: /iHeartCoding/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | iHeartCoding</title>

    <!-- Bootstrap Core CSS -->
    <link href="../public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../public/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- jQuery DataTable CSS (Customized to bootstrap) -->
    <link href="../public/admin/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">