<?php $page="admin" ?>
<?php require_once 'header.php'; 
 check_admin();
 $query = "update app_users set status = '$_REQUEST[status]' where id = $_REQUEST[id]";
 run_sql($query);
 redirect("admin.php");
?>
<?php require_once 'footer.php'; ?>
