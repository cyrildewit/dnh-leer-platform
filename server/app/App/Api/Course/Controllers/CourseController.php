<?php

namespace App\Api\Course\Controllers;

use App\Api\Course\Resources\Course as CourseResource;
use App\Api\Course\Resources\CourseCollection;
use Domain\Course\Models\Course;
use Domain\Course\Models\Enrollment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Support\Controller;

final class CourseController extends Controller
{
    protected function index()
    {
        $courses = QueryBuilder::for(Course::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('slug'),
                'title',
                'headline',
                'description',
                'description_excerpt',
            ])
            ->allowedIncludes([
                'topic',
                'chapters',
                'chapters.sections',
                'authors',
                'tags',
            ])
            ->get();

        return new CourseCollection($courses);
    }

    protected function show($id)
    {
        $course = QueryBuilder::for(Course::class)
            ->allowedIncludes([
                'topic',
                'chapters',
                'chapters.sections',
                'authors',
                'tags',
            ])
            ->where('id', $id)
            ->first();

        if ($course === null) {
            throw new ModelNotFoundException();
        }

        return new CourseResource($course);
    }

    public function enroll($id)
    {
        return Enrollment::create([
            'course_id' => $id,
            'user_id'   => Auth::guard('api')->user()->id,
        ]);
    }
}
