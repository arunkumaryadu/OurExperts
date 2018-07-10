<?php
require_once 'db.php';
function put_elipses($str, $noc){
    if(strlen($str)>$noc){
        $str = substr($str, 0, $noc-3). "...";
    }
    return $str;
}

function redirect($loc){
    header("location:$loc");
}
function is_login(){
    return isset($_SESSION["email"]);
}
function is_admin(){
    return is_login() && strcasecmp($_SESSION["role"],"admin")==0;
}
function is_expert(){
    return is_login() && strcasecmp($_SESSION["role"],"Expert")==0;
}

function check_login(){
    if(!is_login()){
        redirect("login.php");
    }
}
function check_admin(){
    if(!is_admin()){
        redirect("login.php");
    }
}
function check_exp(){
    if(!is_expert()){
        redirect("login.php");
    }
}

function check_pass($pass){
    $err= null;
    if(strlen($pass)<=7){
        $err= "Password must be 8 char long!";
    }
    else if(preg_match("/\d{1}/", $pass)==false){
        $err= "Password must contain one digit!";
    }
    else if(preg_match("/[a-z, A-Z]{1}/", $pass)==false){
        $err= "Password must contain one alphabet!";
    }
    return $err;
}

function is_exist($email){
    $res = false;
    $query = "select * from app_users 
    where email = '$email'"; 
    $r = run_sql($query);    
    if(mysql_num_rows($r)>0){
        $res = true;
    }    
    return $res;
}

function get_date($date_str) {
$date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
return $date->format("d/m/Y");
}
function check_img(){
    if(strlen($_FILES["at1"]["name"])!=0){
        $fname = $_FILES["at1"]["name"] ;
        $ext = substr($fname, strlen($fname)-4);
        if($ext != ".jpg"){
            return "Image not supported, only jpg is allowed!";
        }
        else if($_FILES["at1"]["size"]/(1024*1024) > 5){
            return "Image is too large, max 5 MB is allowed!";
        }       
    }
    return null;
}

function check_date($date_str) {
$date = DateTime::createFromFormat('d/m/Y', $date_str);
if($date==NULL || $date_str != date_format($date, 'd/m/Y'))
{
return false;
}
else {
    return true;
}
}
function check_cambo($v) {
return !(empty($v) || $v=='Select');
}
function check_phone_no( $pn ){
    return preg_match('/^0?[0-9]{10}$/', $pn) || empty ($pn);
}
function check_required($v) {
return !empty($v);
}
?>
