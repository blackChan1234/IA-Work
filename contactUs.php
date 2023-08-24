<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (min-width: 990px)" href="style\indexDesign.css">
    <link rel="stylesheet" media="screen and (max-width: 990px)" href="style\indexDesignSmall.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="stylesheet" href="style\menu.css">
    <link rel="stylesheet" href="style\logo.css">
    <link rel="stylesheet" href="style\avatar.css">

    <title>聯絡我們</title>
    <style>
        body {
            background-image: url('img/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }

        body div{
            padding-left: 30px;
            color: aliceblue;
        }

        .email{
            color: aliceblue;
        }

        footer{
            background-color: cadetblue;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php include 'menu.php'; ?>
    
    <p><br></p><br><br>

    <div>
        <section id="contact-info">
            <h1>樹仁大學聯絡資訊</h1>
            <p>地址：香港北角寶馬山慧翠道10號</p>
            <p>辦公時間：</p>
            <ul>
                <li>星期一及星期五：上午9時至下午1時；下午2時至6時</li>
                <li>星期六，公眾假期及學校假期休息</li>
            </ul>
            <p>一般查詢：</p>
            <ul>
                <li>電話：+852 2570 7110</li>
                <li>傳真：+852 2806 8044</li>
                <li>電郵：<a class="email" href="mailto:info@hksyu.edu">info@hksyu.edu</a></li>
            </ul>
        </section>
        
        <section id="google-map">
            <h2>地圖位置</h2>
            <!-- Embed Google Map iframe here -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.783804784283!2d114.19525007571139!3d22.28617797969671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040106cc002b65%3A0x47ec0da8e479381d!2sHong%20Kong%20Shue%20Yan%20University!5e0!3m2!1sen!2stw!4v1692864032433!5m2!1sen!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <br><br>
        <section id="contact-info">
            <h1>青衣IVE聯絡資訊</h1>
            <p>地址：新界青衣島青衣路二十號</p>
            <p>開放時間：</p>
            <ul>
                <li>星期一至五：8:30 a.m. – 5:30 p.m.</li>
                <li>星期六、星期日及公眾假期：休息</li>
            </ul>
            <p>一般查詢：</p>
            <ul>
                <li>電話：2436 8404</li>
                <li>傳真：2434 5383</li>
                <li>電郵：<a class="email" href="mailto:ty-lc@vtc.edu.hk">ty-lc@vtc.edu.hk</a></li>
            </ul>
        </section>

        <section id="google-map">
            <h2>地圖位置</h2>
            <!-- Embed Google Map iframe here -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14761.350327698214!2d114.09486353638403!3d22.340878719729737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z6Z2S6KGjaXZl!5e0!3m2!1sen!2stw!4v1692863869296!5m2!1sen!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <br><br>
    </div>
    
    <footer>
        <p>&copy; 2023 樹仁大學. All rights reserved.<br>
            &copy; 2023 青衣IVE. All rights reserved.</p>
    </footer>
</body>
</html>
