<?php
namespace App\Http\Repositories;
use App\Models\Meal;
use App\Http\Repositories\Interfaces\IMealRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MealRepository implements IMealRepository
{
    public function getAllMeals(Request $request)
    {
        $query = Meal::query();

        if($request->has('category'))
        {
            $category = $request->input('category');
            if($category === 'NULL')
            {
                $query->doesntHave('category');
            }
            else if($category === '!NULL')
            {
                $query->has('category');
            }
            else
            {
                $query->whereHas('category', function ($q) use ($category)
                {
                    $q->where('id',$category);
                 });
            }
        }
        if($request->has('tags'))
        {
            $tags = $request->input('tags');
            $query->whereHas('tags', function ($q) use ($tags)
            {
                $q->whereIn('id',explode(',',$tags));
            });
        }

        if($request->has('diff_time'))
        {
            $diffTime = $request->input('diff_time');
            $query->where('created_at' , '>', Carbon::createFromTimestamp($diffTime));
        }


        $perPage = $request->has('per_page') ? $request->input('per_page') : 5;
        $page = $request->has('page') ? $request->input('page') : 1;

        return $query->paginate($perPage,['*'],'page', $page)
        ->appends($request->query());
    }
}