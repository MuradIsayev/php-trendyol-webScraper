<?php

require 'src/WebScraper.php';

use PHPUnit\Framework\TestCase;

class WebScraperTest extends TestCase
{
    public function testScrapeProductDataWithValidURL()
    {
        $scraper = new WebScraper();
        $url = 'https://www.trendyol.com/erkek-t-shirt-x-g2-c73?pi=2'; // Replace with a valid URL to test

        $products = $scraper->scrapeProductData($url);

        $this->assertNotEmpty($products);
        foreach ($products as $product) {
            $this->assertArrayHasKey('title', $product);
            $this->assertArrayHasKey('price', $product);
            $this->assertArrayHasKey('image', $product);
            $this->assertNotEmpty($product['title']);
            $this->assertNotEmpty($product['price']);
            $this->assertNotEmpty($product['image']);
        }
    }

    public function testScrapeProductDataWithNoProducts()
    {
        $scraper = new WebScraper();
        $url = 'https://www.facebook.com'; // Replace with a URL that has no products

        $products = $scraper->scrapeProductData($url);

        $this->assertEmpty($products);
    }

    public function testScrapeProductDataWithInvalidURL()
    {
        $this->expectException(\Exception::class);

        $scraper = new WebScraper();
        $url = 'https://www.this-url-does-not-exist.com';

        $products = $scraper->scrapeProductData($url);
    }
}
