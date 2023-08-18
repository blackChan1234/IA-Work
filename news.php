

<link rel="stylesheet" href="style\news.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

<?php
function addNews($imgPath,$header,$summary,$link) {
$html= <<<HTML
        <article class="news-item">
        <img src="{$imgPath}" alt="News Image">
        <a href="{$link}"><h2>{$header}</h2></a>
            <a href="{$link}"><p>{$summary}</p></a>
            <a href="{$link}"><div class="read-more-btn">Read More</div></a>
        </article>

    
    HTML;
  echo $html;
}

?>


