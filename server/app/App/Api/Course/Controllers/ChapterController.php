<?php

namespace App\Api\Course\Controllers;

use Domain\Course\Models\Chapter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Api\Course\Resources\Chapter as ChapterResource;
use App\Api\Course\Resources\ChapterCollection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class ChapterController extends Controller
{
    protected function index()
    {
        $chapters = QueryBuilder::for(Chapter::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('slug'),
                'title',
                'description',
            ])
            ->allowedIncludes([
                'course',
                'sections',
            ])
            ->get();

        return new ChapterCollection($chapters);
    }

    protected function show($id)
    {
        $chapter = QueryBuilder::for(Chapter::class)
            ->allowedIncludes([
                'course',
                'sections',
            ])
            ->where('id', $id)
            ->first();

        if ($chapter === null) {
            throw new ModelNotFoundException();
        }

        return new ChapterResource($chapter);
    }
}
