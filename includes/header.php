<?php ob_start(); 
?>
<?php
include "models/db.php";

// Including models
include 'models/article.php';
include 'models/category.php';
include 'models/comment.php';
include 'models/user.php';

// Creating a object of model classes
$article = new Article();
$category = new Category();
$comment = new Comment();
$user = new User();

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>iHeartCoding</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
    <link href="./public/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/bootstrap.min.css"  media="screen">
    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/jquery.bxslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/font-awesome.css"  media="screen">
    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/magnific-popup.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/owl.theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/ticker-style.css" />
    <link rel="stylesheet" type="text/css" href="/iHeartCoding/public/css/style.css" media="screen">
</head>

<body>

<!-- Container -->
<div id="container">