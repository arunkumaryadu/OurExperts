<?php $page="login" ?>
<?php require_once 'header.php';?>
<?php
check_login();
$err="";
if(isset($_POST["opass"])){
    if(empty ($_POST["opass"])){
        $err = "Old Password is req!!";
    }
    else if(empty ($_POST["npass"])){
        $err = "New Password is req!!";
    }
    else if(check_pass($_POST["npass"])!=""){
        $err = check_pass($_POST["npass"]);
    }
    else if($_POST["npass"]!=$_POST["cpass"]){
        $err = "Does not match!!";
    }
    else {
        $query = "update `app_users` 
     set `pass` =  '$_POST[npass]'
     where `pass` =  '$_POST[opass]'
        and email = '$_SESSION[email]'";
     $r =run_sql($query);
     if(mysql_affected_rows()>0){
        redirect("login.php?msg=2");         
     }
     else {
         $err = "Old password is incorrect!!";
     }
    }
}
?>
<form method="post">
    <table>
        <tr>
            <td>Old Password</td>
            <td><input type="password" name="opass"/></td>
        </tr>
        <tr>
            <td>New Password</td>
            <td><input type="password" name="npass"/></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="cpass"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Change Password"></td>
            <td><input type="reset"/></td>
        </tr>
        <tr >
            <td style="color: red; font-weight: bold;" colspan="2"><?php echo $err;?></td>
        </tr>
    </table>
</form>
<?php require_once 'footer.php';?>
