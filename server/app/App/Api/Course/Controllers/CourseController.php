<?php

namespace App\Api\Course\Controllers;

use App\Api\Course\Resources\Course as CourseResource;
use App\Api\Course\Resources\CourseCollection;
use Domain\Course\Models\Course;
use Domain\Course\Models\Enrollment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $course = Course::where('slug', $slug)->with(['topic', 'authors', 'tags', 'chapters', 'chapters.sections'])->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new CourseResource($course);
    }

    protected function show(Request $request, $id)
    {
        $course = Course::query()
            ->where('id', $id)
            ->with([
                'topic',
                'authors',
                'tags',
                'chapters',
                'chapters.sections',
            ])
            ->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new CourseResource($course);
    }

    public function enrollCourse(Request $request, $course)
    {
        // $course = Course::findOrFail($course);

        return Enrollment::create([
            'course_id' => $course,
            'user_id'   => Auth::guard('api')->user()->id,
        ]);
    }
}
