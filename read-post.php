<?php
require_once "menu.php";
include "dbcon.php";
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style/dataTables.bootstrap5.min.css" />
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link rel="stylesheet" href="style\menu.css">
    <link rel="stylesheet" href="style\post.css">
<?php 

  $id = $_GET["id"];
  $read_news = "SELECT * FROM post WHERE p_id = '$id' ";
  $read_result = mysqli_query($con , $read_news);
  if($read_news){
    while( $rows = mysqli_fetch_assoc($read_result) ){
      $heading =  $rows["heading"];
      $details =  $rows["details"];
       $time = $rows["p_time"];
      $category = $rows["p_category"];
      $img = $rows["p_img"];
    $user = $rows["p_user"];
?>
        
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <h1> <?php echo $heading; ?> </h1>
            <div class="post_commentbox"> <a href="#"><i class="bi bi-person"></i><?php echo $user; ?></a> <span><i class="fa fa-calendar"></i> <?php echo $time; ?> </span> <a href="#"><i class="bi bi-tags"></i><?php echo $category; ?></a> </div>
            <div class="single_page_content"> <img class="img-center" style="width:85%; height:300px" src="img/<?php echo $img; ?>" alt="">
              <blockquote> <?php echo $details; ?> </blockquote>
              
            </div>
          </div>
        </div>
      </div>
      <?php
    }
  }
?>
<?php
?>