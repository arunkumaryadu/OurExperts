<?php
require_once 'include/const.php';

$con = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or exit(mysql_error());
echo "db connected<br>";

$query = "drop schema if exists $dbname";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "db dropped<br>";

$query = "create schema $dbname";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "db created<br>";

mysql_select_db($dbname);

$query = "CREATE  TABLE `app_users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_name` VARCHAR(45) NULL ,
  `email` VARCHAR(100) NULL ,
  `pass` VARCHAR(45) NULL ,
  `phone_no` VARCHAR(45) NULL ,
  `sec_q` VARCHAR(200) NULL ,
  `sec_a` VARCHAR(100) NULL ,
  `role` VARCHAR(45) NULL ,
  `status` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) );";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "table created<br>";

$query = "INSERT INTO `app_users` 
    (`user_name`, `email`, `pass`, `phone_no`, 
    `sec_q`, `sec_a`, `role`, `status`) 
    VALUES ('admin', 'admin', 'admin', 'admin', 
    'admin', 'admin', 'admin', 'approved');";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "user inserted<br>";

$query = "CREATE  TABLE `exp_profile` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(45) NULL ,
  `e_department` VARCHAR(45) NULL ,
  `e_subjects` VARCHAR(100) NULL ,
  `e_desc` TEXT NULL ,
  PRIMARY KEY (`id`) );
";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "table created<br>";

$query = "CREATE  TABLE `dept` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dept_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) );

";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "table created<br>";

$r = mysql_query("INSERT INTO `dept` (`dept_name`) VALUES ('CS')", $con) or exit(mysql_error());
$r = mysql_query("INSERT INTO `dept` (`dept_name`) VALUES ('IT')", $con) or exit(mysql_error());
$r = mysql_query("INSERT INTO `dept` (`dept_name`) VALUES ('ET')", $con) or exit(mysql_error());
$r = mysql_query("INSERT INTO `dept` (`dept_name`) VALUES ('Mech')", $con) or exit(mysql_error());
$r = mysql_query("INSERT INTO `dept` (`dept_name`) VALUES ('Civil')", $con) or exit(mysql_error());

$query = "CREATE  TABLE `ques` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ask_email` VARCHAR(45) NULL ,
  `exp_email` VARCHAR(45) NULL ,
  `ques` Text NULL ,
  `ans` Text NULL ,
  PRIMARY KEY (`id`) );
";
$r = mysql_query($query, $con) or exit(mysql_error());
echo "table created<br>";
?>
