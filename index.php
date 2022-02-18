
<?php
include("pas.php");
$counts = $_GET['counts'];
$page = $_GET['page'];

$db = mysqli_connect($hostname,$username, $password, $dbname);
mysqli_set_charset($db, "utf8");
//Permission to connect everyone. Delete after adding to the server
header("Access-Control-Allow-Origin: *");





function select_boxers_page($page){
    $num = -10 + ($page * 10);
    return $num;
}

$num = select_boxers_page($page);

$query = "SELECT * FROM $usertable LIMIT $num,$counts";
$result = mysqli_query($db, $query);
$query2 = "SELECT COUNT(1) FROM $usertable";
$result2 = mysqli_query($db, $query2);

$counts = mysqli_fetch_array($result2);

while($row = mysqli_fetch_array($result)){
    $id = $row["id"];
    $name = $row["firstname"];
    $lastname = $row["lastname"];
    $date_of_birth = $row["date_of_birth"];

    $array1[] = array ('id'=>$id,'firstname'=>$name,'lastname'=>$lastname);
    
    
}
$api = json_encode($array1);
echo $api;
?>