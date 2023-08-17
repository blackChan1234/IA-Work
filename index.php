<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css" />


    <link rel="stylesheet" href="style\menuPicFrame.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style/dataTables.bootstrap5.min.css" />

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="stylesheet" href="style\btnGroup.css">

    <link rel="stylesheet" href="style\menu.css">
    <link rel="stylesheet" href="style\btnGroup.css">


    <link rel="stylesheet" href="style\logo.css">
    <link rel="stylesheet" href="style\avatar.css">
</head>

<body>

        <?php include 'menu.php'; ?>



    <div id="slider" class="slider">
        <div id="sliderScroll" class="sliderScroll">
            <div id="sliderMain" class="sliderMain">
                <?php
        $imgPaths = [
          "examplePic/image1.png",
          "examplePic/image2.png",
          "examplePic/image3.png",
          "examplePic/image4.png",
          "examplePic/image5.png",
          "examplePic/image6.png"
        ];
        foreach ($imgPaths as $path) {
          echo <<<HTML
                    <div class="item"><a href="#">
                        <img src="img/{$path}" alt="">
                        </a></div>
                HTML;
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

    <div class="button-block">
        <button class="buttongroup">Button 1</button>
        <button class="buttongroup">Button 2</button>
        <button class="buttongroup">Button 3</button>
    </div>
    <link rel="stylesheet" href="style\indexContent.css">

    <?php include 'news.php'; ?>
    <!-- addNews() -->
    <!-- addNews($imgPath,$header,$summary,$moreContent) -->
    <footer>
        <p>&copy; 2023 News Website. All rights reserved.</p>
    </footer>
</body>

</html>