<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealPaginatedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $meta = [
            'currentPage' => $this->currentPage(),
            'totalItems' => $this->total(),
            'itemsPerPage' => $this->perPage(),
            'totalPages' => $this->lastPage(),
        ];

        $links = [
            'prev' => $this->previousPageUrl(),
            'next' => $this->nextPageUrl(),
            'self' => $this->url($this->currentPage()),
        ];

        return [
            'meta' => $meta,
            'data' => $this->collection,
            'links' => $links,
        ];
    }
}
