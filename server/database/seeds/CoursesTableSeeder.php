<?php

use Domain\Course\Models\Course;
use Domain\Topic\Models\Topic;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * SVG Gevorderde Cursus
         */
        $course = new Course();
        $course->slug = 'svg-gevorderde-cursus';
        $course->title = 'SVG gevorderde cursus';
        $course->headline = 'Leer de basisprincipes van SVG';
        $course->description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pretium velit leo, vitae congue nisi ullamcorper et. Aenean vitae orci eleifend, efficitur ante at, posuere ex. Donec laoreet pharetra molestie. Suspendisse lacinia vehicula nisi, id congue nibh porta at. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Morbi eu tempus est. Phasellus sed justo sodales, ornare nisl sed, viverra dolor. Suspendisse eget mi auctor elit vestibulum volutpat. Curabitur auctor dictum est, ac efficitur sem. Maecenas et faucibus turpis, nec tempor mauris. Praesent sagittis dapibus neque ut aliquam. Nam dapibus, arcu sit amet laoreet eleifend, enim ante euismod diam, at lacinia enim leo et sem. Donec quam eros, dignissim vel vestibulum eu, elementum et dolor. Aliquam hendrerit tellus sit amet ante molestie fermentum. Nulla et sem vitae augue finibus fringilla vitae vel ligula. Maecenas leo quam, molestie tincidunt condimentum quis, sodales ac massa.</p>';
        $course->description_excerpt = 'In deze cursus leer je de basisbeginselen van PHP. Je weet na afloop wat een conditional statement, for-loop, class en variable is.';
        $course->learning_points = [
            'Variables',
            'Operators',
            'Conditionals',
            'Comments',
            'PHP on the Web',
        ];
        $course->target_audience = [
            'MBO-ers',
            'Beginners',
            'Hobbiesten',
        ];
        $course->language = 'nl';
        $course->level = 'gevorderde';
        $course->status = 'draft';
        // $course
        //     ->addMedia(storage_path('app/public/defaults/example-car-2048x1152.png'))
        //     ->preservingOriginal()
        //     ->toMediaCollection('images');
        $course->created_at = now();
        $course->updated_at = now()->addWeeks(1);

        // Topic
        $course->topic()->associate(5);

        $course->save();

        // Tags
        $tag_svg = Tag::findOrCreate('SVG', 'courseTag');
        $course->attachTag($tag_svg);

        // Authors
        $course->authors()->attach(1);


    }
}
