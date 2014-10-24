<?php session_start();
include "../config/connection.php";

function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}

$email=antiinjection($_POST['email']);
$password=antiinjection(md5($_POST['email']));

$login=mysql_query("SELECT * FROM t_user WHERE email='$email' AND password='$password' AND aktif='Y' AND blacklist='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
if ($ketemu > 0){
	session_start();
	include "timeout.php";
	
	$_SESSION['iduser']	=$r['id_user'];
	$_SESSION['email']	=$r['email'];
	$_SESSION['passuser']	=$r['password'];
	
	$_SESSION['login']=1;
	$sid_lama = session_id();
	session_regenerate_id();
	$sid_baru = session_id();
	mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
  
	header('location:../admin');
}else{
	header('location:index.php?page=error');
}
?>