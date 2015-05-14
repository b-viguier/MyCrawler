<?php

require __DIR__ . '/../vendor/autoload.php';

$http_client  = new \GuzzleHttp\Client();
$html_content = (string)$http_client->get('http://www.twenga.fr/theiere.html')->getBody();
$crawler      = new \Symfony\Component\DomCrawler\Crawler($html_content);
$page_parser  = new \Bveing\MyCrawler\PageParser($crawler);

foreach($page_parser->getProducts() as $product) {
    echo $product->getName() . PHP_EOL;
    echo $product->getPrice() . PHP_EOL;
    echo $product->getObfuscatedUrl() . PHP_EOL;
    echo '==================' . PHP_EOL;
}
echo 'Done' . PHP_EOL;