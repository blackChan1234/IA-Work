<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- JQuery UI -->
    <script src="./script/jquery-ui.js"></script>
    <!-- JavaScript -->
    <script src="./script/search.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./style/search.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div id="searchBox">
        <form action="" method="get">
            <input type="text" id="searchInput" name="keyword" placeholder="Search for names.." title="Type in a name">
            <button id="searchbtn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <?php
        if(isset($_GET)){
            $keyword="";
            extract($_GET);
            
            $sql = "SELECT fileName, userName, pdfDescription FROM `pdf` WHERE `fileName` LIKE '%$keyword%' OR `userName` LIKE '%$keyword%'"; 
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
            
            // search result
            foreach($data as $text){
                echo <<<EDR
                    <div id="result">
                        <h2>
                            <a>{$text['fileName']}</a> 
                            <a href='./pdf/{$text['fileName']}.pdf' download>
                                <i class="fa-solid fa-file-pdf" style="color: #ff1a1a;"></i>
                            </a>
                        </h2>
                        <p>{$text['pdfDescription']}</p>
                        <div>Upload by {$text['userName']}</div>
                    </div>
                EDR;
            }
        }
?>
</body>

</html>