<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link rel="stylesheet" href="style\menuPicFrame.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style/dataTables.bootstrap5.min.css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="stylesheet" href="style\btnGroup.css">

    <link rel="stylesheet" href="style\menu.css">
    <link rel="stylesheet" href="style\btnGroup.css">


    <link rel="stylesheet" href="style\logo.css">
    <link rel="stylesheet" href="style\avatar.css">
</head>

<body>
    <div id="computer_menu">
        <?php include 'menu.php'; ?>
    </div>

        </header>
    </div>
    <script src="script\mobile_sidebar.js"></script>
    <!-- /w3 mobile_sidebar -->


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

    <?php
  $imgPath = "img/example.png";
  $text = <<<EOF
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse auctor
        justo dui, a euismod velit convallis nec. Suspendisse id nulla non arcu fermentum facilisis. Nulla facilisi.
        Mauris interdum ante eu luctus commodo. Fusce sed justo id justo faucibus commodo a id turpis.
        EOF;
  echo <<<HTML
        <div class="content">
        <img src="{$imgPath}" alt="Image" class="float-left">
        <p>{$text}</p>
        </div>
        HTML;
  ?>
</body>

</html>