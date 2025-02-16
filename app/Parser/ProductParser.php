<?php

namespace App\Parser;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ProductParser extends RequestAbstractParser
{
    public function __construct(ParserLogger $logger)
    {
        parent::__construct($logger);
    }

    public function parse()
    {
        $categories = Category::query()->whereNotNull('parsed_at')->get();

        foreach ($categories as $category) {
            $url = config('parser.site_url') . '/' . $category->slug;
            $this->log($url);

            $crawler = $this->request('GET', $url);


            $products = $crawler->filter('.item_container')->each(function (Crawler $node) {

                $imageSrc = $this->getImageSource($node);
                return [
                    'name' => trim($node->filter('.item_headline')->text()),
                    'description' => trim($node->filter('.short_description')->text()),
                    'weight' => $node->filter('.span-weight')->count()
                        ? implode('/', array_map('trim', preg_split('/\D+/', $node->filter('.span-weight')->text(), -1, PREG_SPLIT_NO_EMPTY)))
                        : null,

                    'price' => $node->filter('.price_value, .bar__content--price')->count()
                        ? (preg_match('/\d+/', $node->filter('.price_value, .bar__content--price')->first()->text(), $matches) ? $matches[0] : null)
                        : null,
                    'image' => $imageSrc,
                    'slug' => rtrim(Str::after($node->filter('.item__href')->attr('href'), '/restaurant/'), '.html')
                ];
            });

            foreach ($products as $product) {

                if ($product['image']) {
                    try {

                        $imageData = Http::withoutVerifying()->get($product['image'])->body();

                        $imageExtension = pathinfo($product['image'], PATHINFO_EXTENSION);
                        $imagePath = 'menus/' . Str::random(30) . '.' . $imageExtension;

                        Storage::disk('public')->put($imagePath, $imageData);
                    } catch (\Exception $e) {
                        $this->log('Ошибка загрузки изображения: ' . $e->getMessage());
                    }
                }

                Menu::updateOrCreate(
                    ['name' => $product['name']],
                    [
                        'category_id' => $category->id,
                        'slug' => $product['slug'],
                        'description' => $product['description'],
                        'weight' => $product['weight'],
                        'price' => $product['price'],
                        'image' => $imagePath ?? null
                    ]
                );

                $this->log("{$product['name']} Сохранен");
            }
        }
    }

    /**
     * Получить источник изображения с учетом форматов .webp и .jpg
     */
    private function getImageSource(Crawler $node)
    {
        $imageSrc = null;

        $webpImage = $node->filter('picture source[type="image/webp"]')->attr('srcset');
        if ($webpImage) {
            $imageSrc = $webpImage;
        }

        if (!$imageSrc) {
            $jpgImage = $node->filter('picture source[type="image/jpeg"]')->attr('srcset');
            if ($jpgImage) {
                $imageSrc = $jpgImage;
            }
        }

        if (!$imageSrc) {
            $imageSrc = $node->filter('.item_image img')->attr('src');
        }

        return $imageSrc;
    }
}

