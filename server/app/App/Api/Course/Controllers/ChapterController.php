<?php

namespace App\Api\Course\Controllers;

use Domain\Course\Models\Chapter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Support\Controller;

final class ChapterController extends Controller
{
    protected function show(Request $request, $id)
    {
        $chapter = Chapter::query()
            ->where('id', $id)
            ->with([
                'course',
                'sections',
            ])
            ->first();

        if ($chapter === null) {
            throw new ModelNotFoundException();
        }

        return $chapter;
    }

    protected function getBySlug(Request $request, $slug)
    {
        $chapter = Chapter::query()
            ->where('slug', $slug)
            ->with([
                'course',
                'sections',
            ])
            ->first();

        if ($chapter === null) {
            throw new ModelNotFoundException();
        }

        return $chapter;
    }
}
