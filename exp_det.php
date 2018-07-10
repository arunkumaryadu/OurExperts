<?php $page="experts" ?>
<?php require_once 'header.php'; ?>    
<?php
check_login();
if (isset($_POST["ques"])) {
        $query = "INSERT INTO `ques` 
    (`ask_email`, `exp_email`, `ques`) 
    VALUES ('$_SESSION[email]', '$_REQUEST[email]', '$_POST[ques]');";
        $r = run_sql($query);
        redirect("expert_list.php?msg=1");
}
?>

            <?php           
            $fn="";
            $brd = "style='border-color: white; border-width: 2px; border-style: solid;'";
            $query = "select  u1.user_name, u1.phone_no, 
            p.email, p.e_department, p.e_subjects, p.e_desc, p.id
            from app_users as u1, exp_profile as p
            where u1.email = p.email
            and p.email = '$_REQUEST[email]'";
            $r = run_sql($query);
            if($row = mysql_fetch_array($r)){
                $fn="upload/$row[id].jpg";
                echo "<img width='150px' height='150px' src='./upload/$row[id].jpg'>";
                echo "
                <h1>$row[user_name]</h1>
                <table width='100%'>
                <tr>
                      <td  width='20%' $brd>E Mail</td>
                      <td $brd>$row[email]</td>
                </tr>
                <tr>
                      <td  width='20%' $brd>Phone No</td>
                      <td $brd>$row[phone_no]</td>
                </tr>
                <tr >
                      <td $brd>Department</td>
                      <td $brd>$row[e_department]</td>
                </tr>
                <tr >
                      <td $brd>Subjects</td>
                      <td $brd>$row[e_subjects]</td>
                </tr>
                <tr >
                      <td $brd>Description</td>
                      <td $brd>$row[e_desc]</td>
                </tr>
                </table>
                ";
            ?>
<p><a href="expert_list.php">Back </a></p>    
    <?php
    }
    ?>
    <form method="post">
       <h1>Ask Question</h1> 
       <textarea rows="10" style="width: 100%" name="ques"></textarea><br/><br/>
       <input type="Submit" value="Submit"/>
    </form>
<?php require_once 'footer.php'; ?>    