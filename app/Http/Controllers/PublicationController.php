<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\PublicationService;

class PublicationController extends Controller
{
    public function __construct(private PublicationService $publicationService)
    {
    }

    /**
     * Show the publication by DOI
     *
     */
    public function show(string $doi): JsonResponse
    {
        $publications = $this->publicationService->getPublications($doi);

        return response()->json($publications);
    }
}
