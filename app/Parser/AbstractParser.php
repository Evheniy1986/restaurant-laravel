<?php

namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;

abstract class AbstractParser
{
    public function __construct(protected ParserLogger $logger)
    {
    }

    abstract protected function request($method, $url): Crawler;

    protected function log($str)
    {
        $this->logger->log($str);
    }
}
