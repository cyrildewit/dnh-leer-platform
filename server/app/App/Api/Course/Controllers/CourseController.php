<?php

namespace App\Api\Course\Controllers;

use Support\Controller;
use Illuminate\Http\Request;
use Domain\Course\Models\Course;
use App\Api\Course\Resources\Course as CourseResource;
use App\Api\Course\Resources\CourseCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class CourseController extends Controller
{
    protected function index(Request $request)
    {
        $courses = Course::all();

        return new CourseCollection($courses);
    }

    protected function getBySlug(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->first();

        if ($course === null) {
            throw new ModelNotFoundException;
        }

        return new CourseResource($course);
    }
}
