<?php

namespace App\Api\Course\Controllers;

use App\Api\Course\Resources\Course as CourseResource;
use App\Api\Course\Resources\CourseCollection;
use Domain\Course\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Support\Controller;

final class CourseController extends Controller
{
    protected function index(Request $request)
    {
        $courses = Course::all();

        return new CourseCollection($courses);
    }

    protected function getBySlug(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->with(['topic', 'authors'])->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new CourseResource($course);
    }
}
