<?php

namespace App\ApiServices;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SearchStreetApi
{
    const URL = 'https://autosuggest.search.hereapi.com/v1/autosuggest';
    protected string $token;

    public function __construct()
    {
        $this->token = env('HERE_API_KEY');
    }

    public function findStreet($search)
    {
        try {
            $response = Http::withoutVerifying()
                ->get(self::URL, [
                    'q' => $search,
                    'in' => 'countryCode:UKR',
                    'at' => '50.4501,30.5234',
                    'lang' => 'ua',
                    'limit' => 10,
                    'apiKey' => $this->token,
                ]);

            if ($response->failed()) {
                Log::error('Ошибка Nominatim API', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return [];
            }

            return $response->json();

        } catch (\Exception $e) {
            Log::error('Ошибка при запросе к Nominatim API', [
                'message' => $e->getMessage(),
            ]);
            return [];
        }
    }

}
