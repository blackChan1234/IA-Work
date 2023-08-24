<link rel="stylesheet" media="screen and (min-width: 990px)" href="style\news.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

<?php
require 'dbcon.php';
function addNews($id, $img, $header, $summary) {
    $html = <<<HTML
        <article class="news-item">
            <a href="read-post.php?id={$id}"><img src="img/post/{$img}" alt="News Image"></a>
            <a href="read-post.php?id={$id}"><h2>{$header}</h2></a>
            <a href="read-post.php?id={$id}"><p>{$summary}</p></a>
        </article>
    HTML;
    echo $html;
}


$sql = "SELECT p_id, p_img, heading, p_description FROM post";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        addNews($row["p_id"], $row["p_img"], $row["heading"], $row["p_description"]);
    }
} else {
    echo "0 results";
}
?>


