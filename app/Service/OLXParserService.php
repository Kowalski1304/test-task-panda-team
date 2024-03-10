<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler;

class OLXParserService
{

    /**
     * @param $url
     * @return array
     * @throws GuzzleException
     */
    public function olxParser($url) :array
    {
        $client = new Client();
        $response = $client->request('GET', $url, ['headers' => ['Accept-Charset' => 'utf-8']]);

        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);
        $title = $crawler->filter('title')->first()->text();

        $colonPosition = mb_strpos($title, ":");
        $productName = mb_substr($title, 0, $colonPosition);

        if (empty($productName)) {
            return $this->agreedPrice($title, $colonPosition, $url);
        }

        $trimmedString = mb_substr($title, $colonPosition + 1);
        $dashPosition = mb_strpos($trimmedString, " - ");
        $productPrice = trim(mb_substr($trimmedString, 0, $dashPosition));

        return [
            'name' => $productName,
            'price' => $productPrice,
            'url' => $url,
        ];
    }

    /**
     * @param $title
     * @param $colonPosition
     * @param $url
     * @return array
     */
    private function agreedPrice($title, $colonPosition, $url) :array
    {
        $trimmedString = mb_substr($title, $colonPosition);
        $dashPosition = mb_strpos($trimmedString, " - ");
        $productName = trim(mb_substr($trimmedString, 0, $dashPosition));

        return [
            'name' => $productName,
            'price' => 'Договірна!',
            'url' => $url,
        ];
    }
}
