<?php

namespace App\Api\Topic\Controllers;

use Support\Controller;
use Illuminate\Http\Request;
use Domain\Course\Models\Topic;
use App\Api\Topic\Resources\TopicCollection;

final class TopicController extends Controller
{
    protected function index(Request $request)
    {
        $topics = Topic::all();

        return new TopicCollection($topics);
    }
}
