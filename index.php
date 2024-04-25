<?php
    // include file for web scraping, html formatting and text search in nodes
    include_once("core/curlWebScrapping.php");
    // insert the html of the roulette parts along with the styles
    include_once("core/inserHtml.php");
    $curlWebScrapping = new curlWebScrapping();
    $htmlOwaspTopTen = $curlWebScrapping->curlBasicGet("https://owasp.org/www-project-top-ten/");
    $nodesHtmlOwaspTopTen = $curlWebScrapping->parserHtml('//section[@id="sec-main"]//ul//li//a//strong', $htmlOwaspTopTen);
    $curlWebScrapping->extractTextHtml($nodesHtmlOwaspTopTen);
    $vulnerabilitiesOwaspTopTen = $curlWebScrapping->resultData;    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/alerts.css">
    <title>Roulette Version 1</title>
</head>
<body>
    <!-- HTML of Roulette Wheel -->
    <button id="spin">Spin</button>
    <span class="arrow"></span>
    <div class="container">
    <?php 
        $objInsertHtml = new inserHtml();
        $objInsertHtml->insertPartsRoulette($vulnerabilitiesOwaspTopTen);
        echo $objInsertHtml->resultHtml;
    ?>
    </div>
    <?php
        echo $objInsertHtml->modaltHtml;
    ?>

    <!-- HTML of Roulette Wheel -->
    <script src="js/index.js"></script>
    <script src="js/modal.js"></script>
</body>
</html>