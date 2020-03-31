<?php

namespace App\Api\User\Controllers;

use Support\Controller;
use Illuminate\Http\Request;

final class CourseController extends Controller
{
    protected function index(Request $request)
    {
        $course = Course::all();

        return new CourseResource($courses);
    }
}
