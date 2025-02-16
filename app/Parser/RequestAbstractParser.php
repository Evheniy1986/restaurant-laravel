<?php

namespace App\Parser;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class RequestAbstractParser extends AbstractParser
{

    protected function request($method, $url): Crawler
    {
        $method = strtolower($method);
        $response = Http::withoutVerifying()->{$method}($url);

        if ($response->failed()) {
            $this->log("Ошибка запроса ($method) к $url: " . $response->status());
            return new Crawler('');
        }

        return new Crawler($response->body());
    }
}
