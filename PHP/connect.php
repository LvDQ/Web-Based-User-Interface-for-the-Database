<?php
$link = mysqli_connect('localhost','root','',"project");
if (!$link) {
	die('Could not connect:'.mysqli_error());
}
//else {
//	echo "connection succeed";
//}

$db_selected = mysqli_select_db($link, "project");
if (!$db_selected) {
	die('Could not use:'.DB_NAME.':'.mysqli_error());
}
?>