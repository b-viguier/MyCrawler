<?php

require __DIR__ . '/../vendor/autoload.php';

$html_content = file_get_contents('http://www.twenga.fr/theiere.html');
$crawler      = new \Symfony\Component\DomCrawler\Crawler($html_content);
$page_parser  = new \Bveing\MyCrawler\PageParser($crawler);

foreach($page_parser->getProducts() as $product) {
    echo $product->getName() . PHP_EOL;
    echo $product->getPrice() . PHP_EOL;
    echo '==================' . PHP_EOL;
}
echo 'Done' . PHP_EOL;