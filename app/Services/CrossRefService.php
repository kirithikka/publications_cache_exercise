<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CrossRefService
{
    protected $crossRefClient;

    public function __construct()
    {
        $this->crossRefClient = new Client([
            'base_uri' => config('techtest.cross_ref.base_url'),
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => config('techtest.cross_ref.user_agent'),
            ]
        ]);
    }

    /**
     * Get publications from crossRef
     *
     */
    public function getCrossRefPublications(string $uri)
    {
        try {
            $response = $this->crossRefClient->request('GET', 'works/' . $uri);

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
