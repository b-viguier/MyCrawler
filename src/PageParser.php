<?php

namespace Bveing\MyCrawler;

use Symfony\Component\DomCrawler\Crawler;

class PageParser {

    /**
     * @var Crawler
     */
    protected $crawler;

    /**
     * @param Crawler $crawler Containing all the DOM of the page
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @return \Generator list of children ProductParser
     */
    public function getProducts()
    {
        foreach($this->crawler->filter('#result > li') as $product_node) {
            yield new ProductParser(new Crawler($product_node));
        }
    }
}
