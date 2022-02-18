<?php
include("pas.php");
$db = mysqli_connect($hostname,$username, $password, $dbname);
mysqli_set_charset($db, "utf8");
//Permission to connect everyone. Delete after adding to the server
header("Access-Control-Allow-Origin: *");
$query2 = "SELECT COUNT(1) FROM $usertable";
$result2 = mysqli_query($db, $query2);
$counts = mysqli_fetch_array($result2);



echo $counts[0];