<?php
$host	= "127.0.0.1";
$user	= "root";
$pass	= "";
$dbnm	= "db_beautyapp";

$conn	= mysql_connect ($host, $user, $pass);
if ($conn) {
	$buka	= mysql_select_db ($dbnm);
	if (!$buka) {
		die ("Database tidak dapat dibuka");
	}
}else{
	die ("Server tidak dapat terhubung");
}

?>