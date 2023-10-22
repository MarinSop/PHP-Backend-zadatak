<?php

namespace App\Http\Resources;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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

        $description = $this->translations()->whereHas('language', function ($q) use ($request)
        {
            $q->where('locale',$request->input('lang'));
        })->get()->first()->description;

        $withTags = $request->has('with') && in_array('tags', explode(',',$request->input('with')));
        $withCategory = $request->has('with') && in_array('category', explode(',',$request->input('with')));
        $withIngredients = $request->has('with') && in_array('ingredients', explode(',',$request->input('with')));

        return 
        [
            'id' => $this->id,
            'title' => $title,
            'description' => $description,
            'status' => $this->status,
            'category' => $this->when($this->category_id !== null && $withCategory, new CategoryResource($this->getCategory())),
            'tags' => $this->when($withTags,TagResource::collection($this->getTags())),
            'ingredients' => $this->when($withIngredients,IngredientResource::collection($this->getIngredients())),
            'slug' => $this->slug
        ];
    }
}
