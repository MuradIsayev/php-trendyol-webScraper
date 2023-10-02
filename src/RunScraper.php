<?php

require 'WebScraper.php';

$scraper = new WebScraper();
$url = 'https://www.trendyol.com/erkek-t-shirt-x-g2-c73?pi=2';
$products = $scraper->scrapeProductData($url);

foreach ($products as $product) {
    echo "Title: " . $product['title'] . "\n";
    echo "Price: " . $product['price'] . "\n";
    echo "Image URL: " . $product['image'] . "\n\n";
}