<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $title = $this->translations()->whereHas('language', function ($q) use ($request)
        {
            $q->where('locale',$request->input('lang'));
        })->get()->first()->title;
        return 
        [
            'id' => $this->id,
            'title' => $title,
            'slug' => $this->slug
        ];
    }
}
