<?php $page = 'our expert';?>
<?php require_once 'header.php';?>
<style>
    td{
        vertical-align: top;
    }
</style>
<?php
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
?>
<?php 
echo "<h2>$msg</h2>";
?>   
<table width="100%">
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Subjects</th>
            <th>Image</th>
        </tr>
            <?php            
            $brd = "style='border-color: black; border-width: 2px; border-style: solid;'";
            if($lpid!=0){
            $whr = "";                
            }
            if(!empty($_REQUEST["si"])){
                $whr = " where u1.user_name like '%$_REQUEST[si]%' ";
            }            
            else {
                $whr = " where  ";                
            }
            
            $query = " select u1.user_name, ep.* 
                   from app_users as u1, exp_profile as ep 
                  $whr u1.email = ep.email;";
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
                            <td $brd><a href='exp_det.php?email=$row[email]'>$row[user_name]</a></td>
                            <td $brd>$row[e_department]</td>
                            <td $brd>$row[e_subjects]</td>
                            <td $brd width='100px'><img width='100px' height='100px' src='upload/$row[id].jpg'></td>
                        </tr>";
            }
            ?>

</table> 
<?php require_once 'footer.php';?>