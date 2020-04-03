<?php

namespace App\Api\Course\Controllers;

use App\Api\Course\Resources\Course as CourseResource;
use App\Api\Course\Resources\CourseCollection;
use Domain\Course\Models\Course;
use Domain\Course\Models\Enrollment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Support\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function enrollCourse(Request $request, $course)
    {
        // $course = Course::findOrFail($course);

        return Enrollment::create([
            'course_id' => $course,
            'user_id' => Auth::guard('api')->user()->id,
        ]);
    }

    // public function enrollCourse($course_slug)
    // {
    //     if (Auth::check()) {
    //         $enrolled_course = $this->courseRepository->findBySlug($course_slug);

    //         $new_enrollment = new CourseEnrollment();
    //         $new_enrollment->course_id = $enrolled_course->id;
    //         $new_enrollment->user_id = Auth::id();
    //         $new_enrollment->save();

    //         event(new EnrollCourse($enrolled_course, Auth::user()));
    //     }

    //     return redirect()->back();
    // }
}
