<?php $page="experts" ?>
<?php require_once 'header.php'; ?>    
<?php
check_login();
if (isset($_POST["ans"])) {
        $query = "update`ques` set ans = '$_POST[ans]'
        where id = '$_REQUEST[id]'";
        $r = run_sql($query);
        redirect("expert.php?msg=1");
}
?>

            <?php           
            $fn="";
            $brd = "style='border-color: white; border-width: 2px; border-style: solid;'";
            $query = " select u1.user_name, q.* 
                   from app_users as u1, ques as q 
                  where u1.email = q.ask_email
                  and q.id = '$_REQUEST[id]';";
            $r = run_sql($query);
            if($row = mysql_fetch_array($r)){
                echo "
                <h1>$row[user_name]</h1>
                <table width='100%'>
                <tr>
                      <td  width='20%' $brd>Question</td>
                      <td $brd>$row[ques]</td>
                </tr>
                <tr>
                      <td  width='20%' $brd>Answer</td>
                      <td $brd>$row[ans]</td>
                </tr>
                </table>
                ";
            ?>
<p><a href="expert_list.php">Back </a></p>    
    <?php
    }
    if($row["exp_email"]==$_SESSION["email"])
    {
    ?>
    <form method="post">
       <h1>Answer</h1> 
       <textarea rows="10" style="width: 100%" name="ans"></textarea><br/><br/>
       <input type="Submit" value="Submit"/>
    </form>
<?php
    }
?>
<?php require_once 'footer.php'; ?>    