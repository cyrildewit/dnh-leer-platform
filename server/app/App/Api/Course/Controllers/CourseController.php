<?php

namespace App\Api\Course\Controllers;

use Support\Controller;
use Illuminate\Http\Request;
use Domain\Course\Models\Course;
use App\Api\Course\Resources\CourseCollection;

final class CourseController extends Controller
{
    protected function index(Request $request)
    {
        $courses = Course::all();

        return new CourseCollection($courses);
    }
}
