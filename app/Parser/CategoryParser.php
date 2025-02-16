<?php

namespace App\Parser;

use App\Models\Category;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class CategoryParser extends RequestAbstractParser
{
    public function __construct(ParserLogger $logger)
    {
        parent::__construct($logger);
    }

    public function parse()
    {
        $url = config('parser.site_url');
        $this->log($url);
        $crawler = $this->request('GET', $url);

        $categories = $crawler->filter('.titled__nav__item a')->each(function (Crawler $node) {
            return [
                'name' => trim($node->text()),
                'slug' => Str::after($node->attr('href'), '/restaurant/')
            ];
        });

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'parsed_at' => now(),
                ]
            );
            $this->log("{$category['name']} Сохранена");
        }
        return $categories;

    }
}
