<?php $page="login" ?>
<?php require_once 'header.php';?>
<?php
$msg="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg = "Successful! Please wait for Approval!";
    }
    else if($_REQUEST["msg"]==2){
        $msg = "Your password has been changed!!";
    }
    else if($_REQUEST["msg"]==3){
        $msg = "Your password has been sent!!";
    }
}
if(isset($_POST["email"]))
{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_MAGIC_QUOTES);
    $pass = filter_var($_POST["pass"], FILTER_SANITIZE_MAGIC_QUOTES);
    $query = "select * from app_users 
    where email = '$email' 
    and pass = '$pass' 
    and status = 'approved'
    ";
    $r = run_sql($query);    
    if(mysql_num_rows($r)>0){
       $row = mysql_fetch_array($r); 
       $_SESSION["uname"]=$row["user_name"];
       $_SESSION["email"]=$row["email"];
       $_SESSION["role"]=$row["role"];
       $_SESSION["id"]=$row["id"];
       if($row["role"]=="admin"){
       redirect("admin.php");           
       }
       else if(strcasecmp ($row["role"], "expert")==0){
        redirect("expert.php");           
       }
       else {
       redirect("index.php");                      
       }
    }
    else {
        $err="Incorrect User Name or Password!!";
    }
}
?>
<h3 style="color: red;"><?php echo "$msg";?></h3>
<h1>Login</h1>
<form method="post">
    <table>
        <tr>
            <td>E-Mail</td>
            <td><input type="text" name="email"/></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Login"></td>
            <td><input type="reset"/></td>
        </tr>
        <tr>
            <td colspan="2"><a href="forgot_pass.php">Forgot Password</a></td>
        </tr>
        <tr >
            <td style="color: red; font-weight: bold;" colspan="2"><?php echo $err;?></td>
        </tr>
    </table>
</form>
<?php require_once 'footer.php';?>


