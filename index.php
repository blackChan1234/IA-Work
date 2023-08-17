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
    <link rel="stylesheet" href="style\news.css">
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

    <?php include 'news.php';

    addNews('./img/1.jpeg','上網成癮嚴重13.9%受訪學生每日上網逾7小時　逾65%曾與家人衝突','疫情下學童上網時間增多，路德會社會服務處學校社會工作組一項調查發現，51.8%受訪學生每日課外上網時間多達4小時或以上，當中13.9%更指多達7小時以上。調查更稱學生上網成癮情況嚴重，50.1%人會因上網被打擾表現煩躁，65.6%更因上網問題，曾與家人發生衝突，情況令人關注。
機構稱，現時上網已成青少年生活中不可或缺部份，建議家長轉危為機，幫助子女健康上網，在網絡世界展現多元潛能。
','https://www.hk01.com/%E7%A4%BE%E6%9C%83%E6%96%B0%E8%81%9E/785609/%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE%E5%9A%B4%E9%87%8D13-9-%E5%8F%97%E8%A8%AA%E5%AD%B8%E7%94%9F%E6%AF%8F%E6%97%A5%E4%B8%8A%E7%B6%B2%E9%80%BE7%E5%B0%8F%E6%99%82-%E9%80%BE65-%E6%9B%BE%E8%88%87%E5%AE%B6%E4%BA%BA%E8%A1%9D%E7%AA%81');
    addNews('./img/1.jpeg','上網成癮嚴重13.9%受訪學生每日上網逾7小時　逾65%曾與家人衝突','疫情下學童上網時間增多，路德會社會服務處學校社會工作組一項調查發現，51.8%受訪學生每日課外上網時間多達4小時或以上，當中13.9%更指多達7小時以上。調查更稱學生上網成癮情況嚴重，50.1%人會因上網被打擾表現煩躁，65.6%更因上網問題，曾與家人發生衝突，情況令人關注。
機構稱，現時上網已成青少年生活中不可或缺部份，建議家長轉危為機，幫助子女健康上網，在網絡世界展現多元潛能。
','https://www.hk01.com/%E7%A4%BE%E6%9C%83%E6%96%B0%E8%81%9E/785609/%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE%E5%9A%B4%E9%87%8D13-9-%E5%8F%97%E8%A8%AA%E5%AD%B8%E7%94%9F%E6%AF%8F%E6%97%A5%E4%B8%8A%E7%B6%B2%E9%80%BE7%E5%B0%8F%E6%99%82-%E9%80%BE65-%E6%9B%BE%E8%88%87%E5%AE%B6%E4%BA%BA%E8%A1%9D%E7%AA%81');
    addNews('./img/1.jpeg','上網成癮嚴重13.9%受訪學生每日上網逾7小時　逾65%曾與家人衝突','疫情下學童上網時間增多，路德會社會服務處學校社會工作組一項調查發現，51.8%受訪學生每日課外上網時間多達4小時或以上，當中13.9%更指多達7小時以上。調查更稱學生上網成癮情況嚴重，50.1%人會因上網被打擾表現煩躁，65.6%更因上網問題，曾與家人發生衝突，情況令人關注。
機構稱，現時上網已成青少年生活中不可或缺部份，建議家長轉危為機，幫助子女健康上網，在網絡世界展現多元潛能。
','https://www.hk01.com/%E7%A4%BE%E6%9C%83%E6%96%B0%E8%81%9E/785609/%E4%B8%8A%E7%B6%B2%E6%88%90%E7%99%AE%E5%9A%B4%E9%87%8D13-9-%E5%8F%97%E8%A8%AA%E5%AD%B8%E7%94%9F%E6%AF%8F%E6%97%A5%E4%B8%8A%E7%B6%B2%E9%80%BE7%E5%B0%8F%E6%99%82-%E9%80%BE65-%E6%9B%BE%E8%88%87%E5%AE%B6%E4%BA%BA%E8%A1%9D%E7%AA%81');

    ?>

    <!-- addNews() -->
    <!-- addNews($imgPath,$header,$summary,$link) -->
    <footer>
        <p>&copy; 2023 News Website. All rights reserved.</p>
    </footer>
</body>

</html>