<?php $page="expert" ?>
<style>
    td{
        vertical-align: top;
    }
</style>
<?php require_once 'header.php'; ?>
<?php
check_exp();
$msg="";
if(isset($_REQUEST["msg"])){
    if($_REQUEST["msg"]==1){
        $msg = "Successful!";
    }
}
$ps=4;
if($_REQUEST["pn"]>0)
{
$pn =$_REQUEST["pn"]-1;    
}
else {
$pn=0;    
}
$links = "";
echo "<h2>$msg</h2>";
?>   
<a href='prof_up.php'>Update Your Profile</a>
<h1>Question List</h1>    
<table width="100%">
        <tr>
            <th>Asker</th>
            <th>Question</th>
        </tr>
            <?php            
            $brd = "style='border-color: black; border-width: 2px; border-style: solid;'";
            $query = " select u1.user_name, q.* 
                   from app_users as u1, ques as q 
                  where u1.email = q.ask_email;";
            $r = run_sql($query);
            $nop = mysql_num_rows($r);
            $pages = ceil($nop/$ps);
            $c = 0;
            mysql_data_seek($r, $pn*$ps);
            while($row = mysql_fetch_array($r)){
                if($c++>=$ps){
                    break;
                }
                    echo "<tr >
                            <td $brd>$row[user_name]</td>
                            <td $brd><a href='ques_det.php?id=$row[id]'>$row[ques]</a></td>
                        </tr>";
            }
            ?>

</table> 
<?php
    for($i=1; $i<=$pages; $i++)
    {
    echo "<a href='expert.php?pl&pn=$i'>$i</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    }
?>
<?php require_once 'footer.php'; ?>