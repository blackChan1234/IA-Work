<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="style\menu.css">
  <link rel="stylesheet" href="style\btnGroup.css">
  <link rel="stylesheet" href="style\logo.css">
  <link rel="stylesheet" href="style\menuPicFrame.css">
  <script src="js\HamburgerMenu.js"></script>
  <script src="js\LinkController.js"></script>
  <link rel="stylesheet" href="info.css">
</head>

<body>
<!-- Menu -->
<div ng-app="myApp" class="topnav">
  <a href="#home" class="active"><img src="img\Hong_Kong_Shue_Yan_University_logo.svg" id="logo"></a>
  <!-- <input type="text" placeholder="Search.."> -->
  <!-- Navigation links (hidden by default) -->
  <div ng-controller="LinkController">
    <div id="Links">
      <a ng-repeat="link in links" ng-href="{{link.href}}">{{link.text}}</a>
    </div>
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="HamburgerMenu()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="button-block">
  <button class="buttongroup">Button 1</button>
  <button class="buttongroup">Button 2</button>
  <button class="buttongroup">Button 3</button>
</div>
<link rel="stylesheet" href="style\indexContent.css">
<section id="profile">
  <h2>Personal Data Protection</h2>
  <div class="user-profile">
    <img src="img/person.jpg" alt="picture" width="150" height="150">
    <p>Preparing for the Era of Esports: Developing an Interdisciplinary and Bronfenbrenner Bioecological
      Model-Based Comprehensive Program to Prevent Teenage Video Game Addiction</p>
  </div>
  <p>Your personal data will only be used to provide a better game experience and protect your safety.
    We will not share your information with third parties.</p>
</section>
<div id="cursor">
  <div class="background">
    <h1>Personal information</h1>

    <form action="Kimetsu_no_Yaiba.php" method="post" enctype="multipart/form-data" name="Kimetsu_no_Yaiba_form">
      <script language="javascript" type="text/javascript">
        alertTest();
      </script>

      <fieldset class="form">
        <legend position="relative">personal information</legend>
        Full Name:
        <input type="text" name="name" required="required" /><br/>
        Tel:
        <input type="tel" name="phoneno"  id="phoneno" maxlength="8"><br/>
        Mobile:
        <input type="tel" name="Mobile" maxlength="8"><br/>
        Email Address:
        <input type="email" name="emailaddress" id="emailaddress" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" /><br />
      </fieldset>
      <br/>
      <button type="submit">Save Changes</button>
      <button type="reset" onclick="alert('data deleted')">clear</button>
    </form>
  </div>
</div>
<div id="cursor">
  <div class="background">
    <h1>Upload Data</h1>

    <form action="abc.php" method="post" enctype="multipart/form-data" name="form">
      <script language="javascript" type="text/javascript">
        alertTest();
      </script>
      <fieldset class="form">
      <button type="button">Add</button>
      <button type="reset" onclick="alert('data deleted')">clear</button>
      </fieldset>
    </form>
  </div>
</div>

</body>
</html>