<?php $page="login" ?>
<?php require_once 'header.php';?>
<?php
$err="";
if(isset($_POST["email"])){
    if(empty ($_POST["email"])){
        $err = "E-Mail is req!!";
    }
    else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==false){
        $err = "E-Mail is incorrect!!";
    }
    else if(!is_exist ($_POST["email"])){
        $err = "E-Mail is not registered!!";
    }
    else if(empty ($_POST["sec_q"])){
        $err = "Security Question is req!!";
    }
    else if(empty ($_POST["sec_a"])){
        $err = "Security Answer is req!!";
    }
    else {
$email = filter_var($_POST["email"], FILTER_SANITIZE_MAGIC_QUOTES);
$sec_q = filter_var($_POST["sec_q"], FILTER_SANITIZE_MAGIC_QUOTES);
$sec_a = filter_var($_POST["sec_a"], FILTER_SANITIZE_MAGIC_QUOTES);
$query = "select * from app_users 
    where email = '$email' 
    and sec_q = '$sec_q'
    and sec_a = '$sec_a'
    ";
    $r = run_sql($query);    
    if(mysql_num_rows($r)>0){
       $row = mysql_fetch_array($r); 
       $body = " Your password is $row[pass]";
       //echo "<h4>Your password is : $row[pass]</h4>";
       mail_it($row["email"], "Your our experts password", $body, null);
       redirect("login.php?msg=3");
    }
    else {
        $err = "Incorrect information!";
    }
    }
}
?>
<form method="post">
    <table>
        <tr>
            <td>E Mail</td>
            <td><input type="text" value="<?php echo $_POST["email"]?>" name="email"/></td>
        </tr>
        <tr>
            <td>Security Question</td>
            <td><input type="text" value="<?php echo $_POST["sec_q"]?>" name="sec_q"/></td>
        </tr>
        <tr>
            <td>Security Answer</td>
            <td><input type="text" value="<?php echo $_POST["sec_a"]?>" name="sec_a"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
            <td><input type="reset"/></td>
        </tr>
        <tr >
            <td style="color: red; font-weight: bold;" colspan="2"><?php echo $err;?></td>
        </tr>
    </table>
</form>
<?php require_once 'footer.php';?>
