<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
ob_start();
function err_hand($eno, $emsg){    
}
set_error_handler("err_hand");
session_start();
date_default_timezone_set("asia/kolkata");
$today=date("Y-m-d");
?>
<?php require_once 'include/const.php';?>
<?php require_once 'include/db.php';?>
<?php require_once 'include/my_mail.php';?>
<?php require_once 'include/myfun.php';?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Our Experts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<LINK REL="SHORTCUT ICON" HREF="images/logo.jpg"/>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
         <?php
         if($page=="home"){
             echo "<li class='active'><a href='index.php'><span>Home Page</span></a></li>";
         }   
         else {
             echo "<li><a href='index.php'><span>Home Page</span></a></li>";             
         }
          if(is_login()){
              $cls ="";
              if($page=="our expert"){
              $cls =" class = 'active' ";                  
              }
              echo "<li $cls><a href='expert_list.php'><span>Our Experts</span></a></li>";
            if(is_expert()){
              $cls ="";
              if($page=="expert"){
              $cls =" class = 'active' ";                  
              }
              echo "<li $cls><a href='expert.php'><span>Expert</span></a></li>";
            }
            if(is_admin()){
              $cls ="";
              if($page=="admin"){
              $cls =" class = 'active' ";                  
              }
              echo "<li $cls><a href='admin.php'><span>Admin</span></a></li>";                
            }  
              echo "<li><a href='logout.php'><span>Logout</span></a></li>";
          }
          else {
              $cls ="";
              if($page=="login"){
              $cls =" class = 'active' ";                  
              }
              echo "<li $cls><a href='login.php'><span>Login</span></a></li>";              
              $cls ="";
              if($page=="reg"){
              $cls =" class = 'active' ";                  
              }
              echo "<li $cls><a href='reg.php'><span>Register</span></a></li>";
          }
         if($page=="about"){
             echo "<li class='active'><a href='about.php'><span>About Us</span></a></li>";
         }   
         else {
             echo "<li><a href='about.php'><span>About Us</span></a></li>";             
         }
         if($page=="contact"){
             echo "<li class='active'><a href='contact.php'><span>Contact Us</span></a></li>";
         }   
         else {
             echo "<li><a href='contact.php'><span>Contact Us</span></a></li>";             
         }          
          ?>
        </ul>
      </div>
      <div class="logo">
        <h1><a href="index.php">Our<span>Experts</span> <br/><small>Please ask your queries.....</small></a></h1>
      </div>
      <div class="clr"></div>
      <?php
      if(is_login()){
       echo  "<p style='float: left; font-weight: 900;'>Welcome $_SESSION[uname]</p>";
       echo  "<p style='float: right;'><a style='color:blue;' href='chpass.php'>Change Password</a></p>";
      }
      ?>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="940" height="310" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="940" height="310" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="940" height="310" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
            <br/>
            <br/>
            <br/>
            <br/>
            