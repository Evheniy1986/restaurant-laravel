<?php

namespace App\Console\Commands;

use App\Parser\CategoryParser;
use Illuminate\Console\Command;

class ParseCategory extends Command
{

    protected $signature = 'app:parse-category';


    protected $description = 'Парсинг категорий с сайта';


    public function handle(CategoryParser $categoryParser)
    {
        $categoryParser->parse();
        $this->info('Парсинг категорий завершён.');
    }
}
