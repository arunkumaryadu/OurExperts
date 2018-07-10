<?php $page="admin" ?>
<?php require_once 'header.php'; ?>
<?php
check_admin();
?>
    <h1>User List</h1>    
    <?php
     $whr="";
    if(!empty($_REQUEST["si"])){
    $whr = " and user_name like '%$_REQUEST[si]%' ";
    }
    $query = "select * from app_users where  not role = 'admin' $whr order by  id desc";
    $r = run_sql($query);
    ?>
    <form>
        <input value="<?php echo $_REQUEST["si"]?>" placeholder="name" type="text" name="si"/> 
    <input type="submit" value="search"/>
</form></br>

    <table style="border-collapse: collapse" border="1" width="100%">
            <tr>
                <th width="15%">Name</th>
                <th width="20%">E Mail</th>
                <th width="15%">Phone No</th>
                <th width="15%">Role</th>
                <th width="15%">Status</th>
                <th width="20%">Action</th>
            </tr>
            <?php
            while($row =mysql_fetch_array($r)){
                $link="";
                if($row[status]!="rejected"){
                $link = "<a href='user_up.php?status=rejected&id=$row[id]'>Reject</a>";
                }
                if($row[status]!="approved"){
                $link = $link . " <a href='user_up.php?status=approved&id=$row[id]'>Approve</a>";    
                }
                echo "<tr>";
                    echo "<td>$row[user_name]</td>";
                    echo "<td>$row[email]</td>";
                    echo "<td>$row[phone_no]</td>";
                    echo "<td>$row[role]</td>";
                    echo "<td>$row[status]</td>";
                    echo "<td>$link</td>";
                echo "</tr>";
            }
            ?>
    </table>
<?php require_once 'footer.php'; ?>