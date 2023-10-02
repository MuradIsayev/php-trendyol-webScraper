<?php

require 'vendor/autoload.php';

use Goutte\Client;

class WebScraper
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function scrapeProductData($url)
    {
        $crawler = $this->client->request('GET', $url);

        $products = [];
        $crawler->filter('.p-card-wrppr')->each(function ($node) use (&$products) {
            $title = $node->filter('.prdct-desc-cntnr-ttl')->text();
            $price = $node->filter('.prc-box-dscntd')->text();
            $image = $node->filter('.p-card-img')->attr('src');

            $products[] = [
                'title' => $title,
                'price' => $price,
                'image' => $image,
            ];
        });

        return $products;
    }
}