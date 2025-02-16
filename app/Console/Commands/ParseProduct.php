<?php

namespace App\Console\Commands;

use App\Parser\ProductParser;
use Illuminate\Console\Command;

class ParseProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсинг товаров с сайта';

    /**
     * Execute the console command.
     */
    public function handle(ProductParser $productParser)
    {
        $productParser->parse();
        $this->info('Парсинг товаров завершен');
    }
}
