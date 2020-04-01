<?php

use Illuminate\Database\Seeder;

use Domain\User\Models\User;
use Domain\Course\Models\Course;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cyril = User::create([
            'name' => 'Cyril de Wit',
            'email' => 'cyril@example.com',
            'username' => 'cyrildewit',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        $cyril->addMediaFromUrl('https://avatars1.githubusercontent.com/u/16477999')
            ->toMediaCollection('avatars');

        $this->call(TopicsTableSeeder::class);

        Course::create([
            'slug' => 'masterclass-php',
            'title' => 'Masterclass PHP',
            'headline' => 'Become convenient in PHP and build great applications.',
            'description' => 'Suspendisse vel massa libero. Nam dolor odio, tempus ac molestie quis, dignissim sit amet sem. Nam eu leo a nunc consequat scelerisque. Praesent ultrices lorem non erat posuere, a ullamcorper ipsum gravida. Praesent quis ex in purus mattis interdum. Donec eu mi scelerisque, faucibus turpis ac, vulputate neque. Sed eget luctus augue. Fusce eu iaculis magna. Quisque posuere commodo dolor at vestibulum. Phasellus in lacinia erat. Nam volutpat tellus at felis interdum, vitae volutpat risus lobortis. Aenean tempor scelerisque nisi vitae laoreet.

Vestibulum in lorem at risus maximus varius a nec tortor. Donec auctor, ligula ut rutrum facilisis, mauris dui consequat magna, eget euismod ex ipsum bibendum ante. Vivamus iaculis bibendum lorem venenatis sagittis. Proin arcu arcu, sagittis at metus eget, rutrum pellentesque sapien. Phasellus dolor velit, ornare a eros molestie, pharetra pretium velit. Duis porttitor nunc et elit imperdiet efficitur. Morbi auctor bibendum urna eu sodales. Cras ut orci quis orci condimentum accumsan.',
            'description_excerpt' => 'Suspendisse vel massa libero. Nam dolor odio, tempus ac molestie quis, dignissim sit amet sem. Nam eu leo a nunc consequat scelerisque. Praesent ultrices lorem non erat posuere, a ullamcorper ipsum gravida. Praesent quis ex in purus mattis interdum. Donec eu mi scelerisque, faucibus turpis ac, vulputate neque. Sed eget luctus augue. Fusce eu iaculis magna. Quisque posuere commodo dolor at vestibulum. Phasellus in lacinia erat.',
            'learning_points' => ['one', 'two', 'three'],
            'target_audience' => ['beginners'],
            'level' => 'beginners',
            'published_at' => now(),
        ]);
    }
}
