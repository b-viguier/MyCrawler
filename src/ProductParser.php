<?php

namespace Bveing\MyCrawler;

use Symfony\Component\DomCrawler\Crawler;

class ProductParser {

    protected $crawler;

    /**
     * @param Crawler $crawler Containing the DOM for one product
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->crawler->filter('div.pdtInfos > strong > span')->text();
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        $price_txt = $this->crawler->filter('div.pdtInfos > div.pdtBuy > span.price')->text();
        $price_txt = trim($price_txt);
        $price_txt = str_replace(',', '.', $price_txt);
        return (float)$price_txt;
    }
}
