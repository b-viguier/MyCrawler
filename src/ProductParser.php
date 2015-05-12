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
}
