<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
   header('location:login.php');
   die();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <!--<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"> 
  </script>
  <link rel="stylesheet" href="style.css">
  <script>
       function openSlideMenu(){
         document.getElementById('menu').style.width = '250px';
         document.getElementById('content').style.marginLeft = '250px';
       }
  </script>-->
  <style>

       *{
        box-sizing: border-box;
       }
       .header{
         background-color: coral;
         color: black;
         padding: 1% 5%;
         text-align: right;
         height: 70px;
       }

       .header h2{
         text-align: center;
         vertical-align: middle;
         cursor: pointer;
       }

       .header h2:hover{
         color: white;
         transition: 0.4s;
       }

       .nav-menu{
         padding: 1% 5%;
         background-color: #39a4ac
       }

       .nav-menu a{
         text-decoration: none;
         display: block;
         padding: 20px 20px;
         color:white;
         font-weight: bold;
       }

       .nav-menu a:hover{
         color: blue;
         transition: 0.5s;
       }

       .nav-menu h3{
         margin-left: 20px;
       }

       .main{
         background-color:cornflowerblue;
       }

       .addCategoryPage{
         background-color: cornsilk;
         color: black;
         width: 100%;
       }

       .main .addCategoryPage a{
         cursor: pointer;
       }

       .addCategoryPage h2{
         padding: 20px 20px;
       }

       .addCategoryPage a{
         padding-left: 20px;
         padding-right: 20px;
         padding-bottom: 15px;
       }

       .table{
         
       
         border-collapse: collapse;
         width: 100%;
       }

       td{
         border:2px solid black;
         padding: 5px 150px;
         padding-left: 10px;
         background-color: white;
       }

       th{
         background-color: darkgreen;
         color: white;
         height:30px;
         text-align: left;
         border-collapse: collapse;
       }

       input[type="button1"], input[type="button2"], input[type="button3"]{
            width: 50px;
            border: none;
            background-color:lawngreen;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
       }

       input[type="button2"]{
            width: 50px;
            border: none;
            background-color:blue;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
       }

       input[type="button3"]{
            width: 50px;
            border: none;
            background-color:red;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
       }

       .col-1{width: 8.33%;}
       .col-2{width: 16.66%;}
       .col-3{width: 25%;}
       .col-4{width: 33.33%;}
       .col-5{width: 41.66%;}
       .col-6{width: 50%;}
       .col-7{width: 58.33%;}
       .col-8{width: 66.66%;}
       .col-9{width: 75%;}
       .col-10{width: 83.33%;}
       .col-11{width: 91.66%;}
       .col-12{width: 100%;}

       [class*="col-"]{
         float: left;
         padding: 10px;
       }

       .row::after{
         content: '';
         clear: both;
         display: table;
       }


  </style>
</head>
<body>
  <div class="header">
      <!--<span class="slide">
        <a href="#" onclick="openSlideMenu()">
           <i class="fas fa-bars"></i>
        </a>
      </span>-->
      <h2>Welcome Admin</h2>
  </div>

  <div class="row">
    <div class="nav-menu col-2">
      <!--<a href="#" class="close" onclick="closeSlideMenu()">
          <i class="fas fa-times"></i>
      </a>-->
      <h3>Menu</h3><br>
      <a href="index.php">Dashboard</a>
      <a href="categories.php" > Categories Master</a>
      <a href="product.php" > Product Master</a>
      <a href="order_master.php" > Order Master</a>
      <a href="users.php" > User Master</a>
      <a href="contact_us.php" > Contact Us</a>
      <a href="logout.php" >Log Out</a>
    </div>