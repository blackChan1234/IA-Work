
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link rel="stylesheet" href="style\menu.css">
    <link rel="stylesheet" href="style\btnGroup.css">
    <link rel="stylesheet" href="style\logo.css">
    <link rel="stylesheet" href="style\avatar.css">
    <link rel="stylesheet" href="style\menuPicFrame.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style/dataTables.bootstrap5.min.css" />
    <script src="js\HamburgerMenu.js"></script>
    <script src="js\LinkController.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>

</head>

<body>

    <!-- Menu -->
    <div ng-app="myApp" class="topnav">
            <a href="#home" id="logo"></a>

        <div ng-controller="LinkController">
            <div id="Links">
                <a ng-repeat="link in links" ng-href="{{link.href}}">{{link.text}}</a>
            </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="HamburgerMenu()">
            <i class="fa fa-bars"></i>
        </a>
    </div>


    <div id="slider" class="slider">
        <div id="sliderScroll" class="sliderScroll">
            <div id="sliderMain" class="sliderMain">
                <div class="item">
                    <a href="#">
                        <img src="img/examplePic/image1.png" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="img/examplePic/image2.png" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="img/examplePic/image3.png" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="img/examplePic/image4.png" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="img/examplePic/image5.png" alt="">
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <img src="img/examplePic/image6.png" alt="">
                    </a>
                </div>
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
    <div class="content">
        <img src="img\example.png" alt="Image" class="float-left">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec odio ipsum. Suspendisse auctor
            justo dui, a euismod velit convallis nec. Suspendisse id nulla non arcu fermentum facilisis. Nulla facilisi.
            Mauris interdum ante eu luctus commodo. Fusce sed justo id justo faucibus commodo a id turpis.
        </p>
    </div>

</body>

</html>