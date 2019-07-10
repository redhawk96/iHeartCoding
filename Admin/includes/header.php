<?php 
ob_start(); 

include "../models/db.php";

// Including models
include '../models/article.php';
include '../models/category.php';
include '../models/comment.php';
include '../models/user.php';
include '../models/activity.php';
include '../models/statistics.php';

// Creating a object of model classes
$article = new Article();
$category = new Category();
$comment= new Comment();
$user = new User();
$activity = new Activity();
$stat = new Satistics();

//Redirecting non-administrators to the home pagez
if(isset($_SESSION['u_type'])){
   
   $user_type = $_SESSION['u_type'];

   switch($user_type){
      case 'Administrator' : break;
      case 'Moderator' : header('Location: /iHeartCoding/Mod/'); break;
      default : header('Location: /iHeartCoding/'); break;
   }
    
}else{
   header('Location: /iHeartCoding/');
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
      <title>iHeartCoding | Admin</title>
      <meta content="Admin Dashboard" name="description">
      <meta content="Themesbrand" name="author">
      <link rel="shortcut icon" href="../assets/images/favicon.ico">
      <!-- Summernote Editor -->
      <link rel="stylesheet" href="/iHeartCoding/public/admin/plugins/summernote/summernote-bs4.css">
      <!-- Sweet Alert -->
      <link href="/iHeartCoding/public/admin/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">   
      <!-- Magnific popup -->
      <link href="/iHeartCoding/public/admin/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
      <!-- DataTables -->
      <link href="/iHeartCoding/public/admin/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
      <link href="/iHeartCoding/public/admin/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
      <!--Chartist Chart CSS -->
      <link rel="stylesheet" href="/iHeartCoding/public/admin/plugins/chartist/css/chartist.min.css">
      <link href="/iHeartCoding/public/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="/iHeartCoding/public/admin/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
      <link href="/iHeartCoding/public/admin/assets/css/icons.css" rel="stylesheet" type="text/css">
      <link href="/iHeartCoding/public/admin/assets/css/style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <!-- Begin page -->
      <div id="wrapper">