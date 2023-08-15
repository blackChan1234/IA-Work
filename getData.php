<?php
header('Content-Type: Application/json');
$sql = "SELECT fileName,userName FROM `pdf`"; 
$hostname = "127.0.0.1"; 
$username = "root";
$pwd = ""; 
$db = "iadb";
$conn = mysqli_connect($hostname, $username, $pwd, $db)
or die(mysqli_connect_error());

$rs = mysqli_query($conn, $sql);
$data = [] ;
while ($rc = mysqli_fetch_assoc($rs))
{
    $data[]=$rc;
}

mysqli_free_result($rs);
mysqli_close($conn);
echo json_encode($data);
?>