

<link rel="stylesheet" href="style\news.css">
    <script src="script\ReadMore.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

<?php
function addNews($imgPath,$header,$summary,$moreContent) {
$html= <<<HTML
    <section class="news-list">
        <article class="news-item">
        <img src="{$imgPath}" alt="News Image">
            <h2>{$header}</h2>
            <p>{$summary}</p>
            <div class="read-more">
                <p>{$moreContent}</p>
            </div>
            <div class="read-more-btn">Read More</div>
        </article>

    </section>
    HTML;
  echo $html;
}

?>

    <footer>
        <p>&copy; 2023 News Website. All rights reserved.</p>
    </footer>
