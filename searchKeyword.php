<?php
if(isset($_GET)){
    extract($_GET);
    $sql = "SELECT date,filename,uploader FROM `pdf` WHERE `filename`='$keyword' OR `uploader`='$keyword'"; 
    $hostname = "127.0.0.1"; 
    $username = "root";
    $pwd = ""; 
    $db = "text2";
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
    var_dump();
}
?>