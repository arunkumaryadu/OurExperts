<?php $page = "reg" ?>
<?php require_once 'header.php'; ?>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<style>
    label.error{
        color: red;
        font-weight: bold;
        margin-left: 20px;
    }
</style>
<script>
    $(document).ready(function() {								
        $.validator.addClassRules("req", {
            required: true
        });
			
        $.validator.addMethod("inphone", 
        function(v,e,p){
            if(v.match(/^0?[6-9]{1}\d{9}$/)){
                return true;
            }
            else {
                return false;
            }
        }, 
        "Invalid Phone No");	
			
        $("#regform").validate();
        $("input[type='reset']").click(function(e){
            $('label.error').remove();
        }); 
                
    });
</script> 

<?php
if (isset($_POST["name"])) {
    if (!is_exist($_POST["email"])) {
        $query = "INSERT INTO `app_users` 
    (`user_name`, `email`, `pass`, `phone_no`, 
    `sec_q`, `sec_a`, `role`, `status`) 
    VALUES ('$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[cntct]', 
    '$_POST[s_que]', '$_POST[s_ans]', '$_POST[role]', 'new');";
        $r = run_sql($query);
        if (strcasecmp($_POST["role"], "Expert") == 0) {
            $query = "INSERT INTO `exp_profile` 
            (`email`) 
            VALUES ('$_POST[email]');";
            $r = run_sql($query);
        }
        redirect("login.php?msg=1");
    } else {
        $err = "Already Exist!!";
    }
}
?>
<form  id="regform" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Full Name: 
                </td>       

                <td>
                    <input type="text" value="<?php echo $_POST["name"] ?>" name="name" id="name" placeholder="Enter your Full name" class="req">
                </td>                                 
            </tr>                
            <tr>
                <td>
                    Email: 
                </td>       

                <td>
                    <input type="email" value="<?php echo $_POST["email"] ?>" name="email" id="email" placeholder="Enter your Email" class="req">
                </td>                                 
            </tr>                
            <tr>
                <td>
                    Contact: 
                </td>       

                <td>
                    <input type="text" value="<?php echo $_POST["cntct"] ?>" inphone="true" name="cntct" id="cntct" placeholder="Enter your Mobile number" class="req">
                </td>                                 
            </tr> 
            <tr>
                <td>
                    Password:
                </td>                    
                <td>
                    <input type="password" minLength="7" name="password" id="password" placeholder="Enter Password" class="req">                    
                </td>
            </tr>
            <tr>
                <td>
                    Confirm Password:
                </td>                    
                <td>
                    <input type="password" minLength="7" name="cpassword" id="cpassword" placeholder="Confirm Password" equalTo="#password" class="req">                    
                </td>
            </tr>
            <tr>
                <td>
                    Security Question:
                </td>       

                <td>
                    <input type="text" value="<?php echo $_POST["s_que"] ?>" name="s_que" id="s_que" placeholder="Security Question" class="req">
                </td>                                 
            </tr>                               
            <tr>
                <td>
                    Security Answer:
                </td>       

                <td>
                    <input type="text" value="<?php echo $_POST["s_ans"] ?>" name="s_ans" id="s_ans" placeholder="Security Answer" class="req">
                </td>                                 
            </tr>                               
            <tr>
                <td>
                    Role:
                </td>       

                <td>
                    <select name="role" id="role">
                        <option>Student</option>
                        <?php
                        if ($_POST["role"] == "Expert") {
                            echo "<option selected='selected'>Expert</option>";
                        } else {
                            echo "<option>Expert</option>";
                        }
                        ?>
                    </select>        
                </td>                                 
            </tr>                               

            <tr>
                <td>
                    <input type="submit" name="Register" value="Register">                    
                </td>
                <td>
                    <input type="reset" name="Cancel" value="Cancel">                    
                </td>
            </tr>
            <tr>
                <td style="color: red; font-weight: bold;" colspan="2">
    <?php echo "$err"; ?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<?php require_once 'footer.php'; ?>
