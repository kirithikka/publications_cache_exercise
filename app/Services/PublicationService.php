<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class PublicationService
{
    public function __construct(private CrossRefService $crossRefService)
    {
    }

    /**
     * Get publications from cache/crossRef.
     *
     */
    public function getPublications(string $doi): array
    {
        $doi = trim($doi);

        if (Cache::has($doi)) {
            return json_decode(Cache::get($doi), true);
        }

        $publications = $this->getPublicationsFromCrossRef($doi);

        if (empty($publications)) {
            return ['error' => 'Publication(s) not found'];
        }

        return $publications;
    }

    /**
     * Get publications from crossRef
     *
     */
    private function getPublicationsFromCrossRef(string $doi)
    {
        $uri = $this->getCrossRefUri($doi);

        try {
            $response = $this->crossRefService->getCrossRefPublications($uri);

            $decodedResponse = json_decode($response, true);

            if (empty($decodedResponse)) {
                return;
            }
            
            if ($this->isFullDoi($doi)) {
                $publication = $decodedResponse['message'];
                Cache::put($doi, json_encode($publication));

                return $publication;
            }

            // partial Dois' results
            $publications = $decodedResponse['message']['items'];
            if (empty($publications)) {
                return;
            }

            Cache::put($doi, json_encode($publications));
            foreach ($publications as $publication) {
                Cache::put($publication['DOI'], json_encode($publication));
            }

            return $publications;

        } catch(\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Get the cross ref uri for full/partial DOI 
     *
     */
    private function getCrossRefUri(string $doi): string
    {
        if ($this->isFullDoi($doi)) {
            return "{$doi}";
        }

        return "?query={$doi}";
    }

    /**
     * Checks if a DOI is full or partial
     *
     */
    private function isFullDoi(string $doi): bool
    {
        return (strpos($doi, '/') !== false) ? true : false;
    }
}
