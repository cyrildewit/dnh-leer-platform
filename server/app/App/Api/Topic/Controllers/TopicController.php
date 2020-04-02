<?php

namespace App\Api\Topic\Controllers;

use App\Api\Course\Resources\CourseCollection;
use App\Api\Topic\Resources\Topic as TopicResource;
use App\Api\Topic\Resources\TopicCollection;
use Domain\Topic\Models\Topic;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Support\Controller;

final class TopicController extends Controller
{
    protected function index(Request $request)
    {
        $topics = Topic::query();

        if ($request->has('with')) {
            $topics->with($request->input('with'));
        }

        return new TopicCollection($topics->get());
    }

    protected function getBySlug(Request $request, $slug)
    {
        $topic = Topic::where('slug', $slug)->first();

        if ($topic === null) {
            throw new ModelNotFoundException();
        }

        return new TopicResource($topic);
    }

    protected function getBySlugCourses(Request $request, $slug)
    {
        $topic = Topic::where('slug', $slug)->with('courses')->first();

        if ($topic === null) {
            throw new ModelNotFoundException();
        }

        $courses = $topic->courses;

        return new CourseCollection($courses);
    }
}
