<?php $page = "home" ?>
<style>
    td{
        vertical-align: top;
    }
</style>
<?php require_once 'header.php'; ?>
<?php
if(is_login()==false){
?>
<img src="images/abt2.jpg" style="width: 100%; height: 200px" />
<p>The primary objective of the OurExperts.com is to provide instant access to the latest information and resources on every facet of education.</p>
<p>OurExperts.com designed with a vision to cover the entire college with dedicated portals for everyone.</p>
<?php
}
else {
    $ps = 4;
    if ($_REQUEST["pn"] > 0) {
        $pn = $_REQUEST["pn"] - 1;
    } else {
        $pn = 0;
    }
    $links = "";
    ?>   
    <h1>Question List</h1>    
    <table width="100%">
        <tr>
            <th>Expert</th>
            <th>Question</th>
        </tr>
    <?php
    $brd = "style='border-color: black; border-width: 2px; border-style: solid;'";
    $query = " select u1.user_name, q.* 
                   from app_users as u1, ques as q 
                  where u1.email = q.exp_email;";
    $r = run_sql($query);
    $nop = mysql_num_rows($r);
    $pages = ceil($nop / $ps);
    $c = 0;
    mysql_data_seek($r, $pn * $ps);
    while ($row = mysql_fetch_array($r)) {
        if ($c++ >= $ps) {
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
    echo "<a href='index.php?pn=$i'>$i</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    }
}
?>
<?php require_once 'footer.php'; ?>