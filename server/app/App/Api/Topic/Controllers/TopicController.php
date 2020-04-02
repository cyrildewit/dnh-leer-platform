<?php

namespace App\Api\Topic\Controllers;

use Support\Controller;
use Illuminate\Http\Request;
use Domain\Topic\Models\Topic;
use App\Api\Topic\Resources\TopicCollection;
use App\Api\Topic\Resources\Topic as TopicResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class TopicController extends Controller
{
    protected function index(Request $request)
    {
        $topics = Topic::all();

        return new TopicCollection($topics);
    }

    protected function getBySlug(Request $request, $slug)
    {
        $topic = Topic::where('slug', $slug)->first();

        if ($topic === null) {
            throw new ModelNotFoundException;
        }

        return new TopicResource($topic);
    }
}
