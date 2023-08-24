<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" media="screen and (min-width: 990px)" href="style\indexDesign.css">
    <link rel="stylesheet" media="screen and (max-width: 990px)" href="style\indexDesignSmall.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css" />

    <link rel="stylesheet" href="style\menuPicFrame.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="style\news.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="script/functions.js"></script>
    <script src="script/scrollToTop.js"></script>

    <link rel="stylesheet" href="style\social_media_button.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">

    <link rel="stylesheet" href="style\menu.css">
    <link rel="stylesheet" href="style\btnGroup.css">

    <link rel="stylesheet" href="style\logo.css">
    <link rel="stylesheet" href="style\avatar.css">
</head>

<body>

    <?php include 'menu.php'; ?>

    <!-- photoframe -->
    <div id="slider" class="slider">
        <div id="sliderScroll" class="sliderScroll">
            <div id="sliderMain" class="sliderMain">
                <?php
                include 'dbcon.php';
                // Assuming you've already established a connection to your database named $conn

                $query = "SELECT p_img FROM post WHERE p_category = 'hot news'";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $imgPath = $row["p_img"];
                        echo <<<HTML
            <div class="item"><a href="#">
                <img src="img/{$imgPath}" alt="">
            </a></div>
            HTML;
                    }
                } else {
                    echo "No images found!";
                }
                ?>
            </div>

            <!-- prev&next cursor -->
            <span id="next" class="next">&#10095;</span>
            <span id="prev" class="prev">&#10094;</span>
        </div>

        <!-- photo index pointer -->
        <div id="sliderIndex" class="sliderIndex"></div>
    </div>
    <script src="script\script.js"></script>

    <!-- left and right column style -->
    <div class="index-column-container">
        <div class="index-column-left">
            <!-- button indicator -->
            <script src="script\button.js"></script>
            <div class="button-block" id="button-block">
            </div>

            <!-- introduction -->
            <h2 class="index-header" name="title" >網路成癮介紹</h2>
            <?php
            // Read the content of the JSON file
            $jsonFilePath = 'json/introduction.json';
            $encodedJSON = file_get_contents($jsonFilePath);

            // Decode the JSON to PHP array
            $decodedArray = json_decode($encodedJSON, true);

            // $decodedArray as a regular PHP array
            foreach ($decodedArray as $item) {
                echo "<div class='intro-container'>";
                echo "<img class='intro-img' src='" . $item['imageSrc'] . "' alt='" . $item['alt'] . "'>";
                echo "<h3 class='intro-title'>" . $item['title'] . "</h3>";
                echo "<p class='intro-paragraph'>" . $item['paragraph'] . "</p>";
                echo "</div>";
            }
            ?>

            <!-- news -->
            <link rel="stylesheet" href="style\indexContent.css">
            <h2 class="index-header" name="title" >相關新聞</h2>
            <section class="news-list">
                <?php include 'news.php';?>
            </section>
            <p><a href="#" class="expand" onclick="expandNews(event)">展開更多</a></p>

            <!-- Games -->
            <h2 class="index-header" name="title" >主題小遊戲</h2>
            <div class="games">
                <a class="games-box" href="quizGame.html">
                    <img src="img/game1.png" alt="quiz game">
                    <p>Demon Quiz</p>
                </a>
                <a class="games-box" href="game/game.html">
                    <img src="img/game2.png" alt="storybook">
                    <p>Storybook</p>
                </a>
                <a class="games-box" href="game/1.html">
                    <img src="img/game3.png" alt="training game">
                    <p>training game</p>
                </a>
            </div>


        </div>
        <div class="index-column-right">
            <h1 class="index-header" name="title">影片播放器</h1>
            <div class="video-player" >
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/9kNYFzAjSzQ" title="[毒不添下]網路成癮教學動畫" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Rick Astley - Never Gonna Give You Up (Official Music Video)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/n6GAreWxq5I" title="就是要&quot;滑&quot;! 中小學生網路遊戲成癮│中視新聞20170117" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <iframe width="auto" height="auto" src="https://www.youtube.com/embed/La4qVvfMqAg" title="小偉的故事_那段網路成癮的歲月" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
        
    <footer>
        <p>&copy; 2023 IA Group Website. All rights reserved.</p>
        <a href="https://www.facebook.com/hksyu/" class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/explore/tags/樹仁大學/top/" class="fa fa-instagram"></a>
    </footer>

    <script src="./script/fontSize.js"></script>
</body>

</html>