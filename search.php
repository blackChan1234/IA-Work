<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <?php include 'menu.php'; ?>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- JQuery UI -->
    <script src="./script/jquery-ui.js"></script>
    <!-- JavaScript -->
    <script src="./script/search.js"></script>
    <script src="./script/fontSize.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- CSS (menu)-->
    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="./style/menu.css">
    <!-- CSS (search) -->
    <link rel="stylesheet" href="./style/search.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div id="searchBox">
        <form action="" method="get">
            <!-- input keyword -->
            <span>
                <input type="text" id="searchInput" name="keyword" placeholder="Search for names.." title="Type in a name">
                <button id="searchbtn" type="submit"><i class="fas fa-search"></i></button><br>
            </span>

            <!-- label (radio)-->
            <span>
                <input type="radio" id="ALL" name="label" value="ALL" checked>
                <label for="ALL">ALL</label>
                <input type="radio" id="User" name="label" value="User">
                <label for="User"><i class="fa-solid fa-user" style="color: #5794ff;"></i> User</label>&nbsp;
            </span>

            <!-- Type -->
            <span>
                <label for="type">Type:</label>
                <select id="type" name="type">
                    <option value="none">----</option>
                    <option value="proposal">Proposal</option>
                    <option value="program">Experimental program</option>
                    <option value="minutes">meeting minutes</option>
                    <option value="report">Report/Paper</option>
                    <option value="data">Statistical data</option>
                </select><br>
            </span>

            <!-- Date -->
            <span>
                <i class="fa-solid fa-calendar-days" style="color: #689df8;"></i> Date:
                <input type="date" id="fDate" name="fromDate"> -
                <input type="date" id="tDate" name="toDate">
            </span>  
        </form>
    </div>

    <?php
        if(isset($_GET)){
            $keyword = "";
            $type = "";
            $fromDate = "";
            $toDate = "";
            extract($_GET);
              
            // sql statement
            if($keyword == ""){
                $sql = "SELECT fileName, userName, pdfDescription, uploadDate, type FROM `pdf`";
            }else if($label == "ALL"){
                $sql = "SELECT fileName, userName, pdfDescription, uploadDate, type FROM `pdf` WHERE `fileName` LIKE '%$keyword%' OR `userName` LIKE '%$keyword%'"; 
            }else if($label == "User"){
                $sql = "SELECT fileName, userName, pdfDescription, uploadDate, type FROM `pdf` WHERE `userName` LIKE '%$keyword%'";
            }

            switch ($type) {
                case "proposal":
                case "program":
                case "report":
                case "minutes":
                case "data":
                    if($keyword == ""){
                        $sql .= " WHERE `type` = '$type'";
                    }else{
                        $sql .= " AND `type` = '$type'";
                    }
                    break;
                default:
                    break;
            }

            if($fromDate != "" && $toDate != ""){
                if($keyword == ""){
                    $sql .= " WHERE uploadDate >= '$fromDate' AND uploadDate <= '$toDate'";
                }else{
                    $sql .= " AND uploadDate >= '$fromDate' AND uploadDate <= '$toDate'";
                }
            }
            
            // query database
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
            if(count($data) > 0){
                foreach($data as $text){
                    echo <<<EDR
                        <div id="result">
                            <h3>
                                <a href='./pdf/{$text['fileName']}' target='_blank'>{$text['fileName']}</a>  
                                <a href='./pdf/{$text['fileName']}' download title='download'>
                                    <i class="fa-solid fa-file-pdf" style="color: #ff1a1a;"></i>
                                </a>
                            </h3>
                            <div id='tag'><span>{$text['type']}</span></div>
                            <p>{$text['pdfDescription']}</p>
                            <div>Upload by {$text['userName']}</div>
                            <div>{$text['uploadDate']}</div>
                        </div>
                    EDR;
                }
            } else {
                echo "<p style='font-size: 50px; text-align: center;'>not file found</p>";
            } 
        }
    ?>
</body>
</html>