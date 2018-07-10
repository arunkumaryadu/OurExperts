<?php $page="expert" ?>
<?php require_once 'header.php'; ?>
<?php
check_exp();
$err="";
$query = "select * from exp_profile where email = '$_SESSION[email]'";
$r = run_sql($query);
$row =mysql_fetch_array($r);
$lid = $row["id"];
if(isset($_POST["dept"]))
{
    if(!check_required($_POST["dept"])){
        $err = "Department name is required";
    }
    else if(!check_required($_POST["sub"])){
        $err = "Subject is required";
    }
    else if(!check_required($_POST["desc"])){
        $err = "Description is required";
    }
    else if(check_img ()!=null){
        $err = check_img ();
    }
    else {
    $query="update exp_profile  set 
        `e_department` = '$_POST[dept]', 
        `e_subjects` = '$_POST[sub]', 
        `e_desc` = '$_POST[desc]' 
        where email = '$_SESSION[email]'";
        $r = run_sql($query);
        if(isset($_FILES["at1"]) && empty($_FILES["at1"]["name"])!=true){
            move_uploaded_file($_FILES["at1"]["tmp_name"], "upload/$lid.jpg");
        }
        redirect("expert.php");
    }
}
?>
    <h1>Update</h1>
    <form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Department</td>
            <td>
                <select name="dept" style="width: 100%">
                    <option>Select</option>
                    <?php
                    $r = run_sql("select * from dept");
                    while($row2 = mysql_fetch_array($r)){
                        $sel="";
                        if($row["e_department"]==$row2["dept_name"])
                        {
                           $sel=" selected='selected'"; 
                        }
                        echo "<option $sel>$row2[dept_name]</option>";
                    }
                    ?>
                </select>
                
            </td>
        </tr>
        <tr>
            <td>Subjects</td>
            <td><input style="width: 100%;" type="text" name="sub" value="<?php echo $row["e_subjects"]?>">*</td>
        </tr>
        <tr>
            <td>Desc</td>
            <td><textarea rows="15" cols="70" name="desc"><?php echo $row["e_desc"]?></textarea>
            </td>
        </tr>        
        <tr>
            <td>Old Profile</td>
            <td><img style="width: 50%" alt="No Photo" src="<?php echo "upload/$lid.jpg";?>" /></td>
        </tr>        
        <tr>
            <td>New Pic</td>
            <td><input type="file" name="at1" value="<?php echo "$_FILE[at1]";?>"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"/></td>
            <td><input type="reset"></td>
        </tr>
        <tr>
            <td colspan="2" style="color: red"><?php echo $err?></td>
        </tr>
    </table>
    </form>
<?php require_once 'footer.php';?>
