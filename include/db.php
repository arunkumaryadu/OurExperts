<?php
require_once 'const.php';
function run_sql($query){
    global $dbname;
    $con = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or exit(mysql_error());
    mysql_select_db($dbname);
    $r = mysql_query($query, $con) or exit(mysql_error());
    return $r;
}
function sanatize($v){
    return filter_var($v, FILTER_SANITIZE_MAGIC_QUOTES);
}
?>
