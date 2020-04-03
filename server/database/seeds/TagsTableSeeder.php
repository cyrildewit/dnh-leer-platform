<?php

use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = Tag::findOrCreate('SVG', 'courseTag');
        $tag->setTranslation('name', 'nl', 'SVG');
        $tag->save();

        $tag = Tag::findOrCreate('PHP', 'courseTag');
        $tag->setTranslation('name', 'nl', 'PHP');
        $tag->save();

        $tag = Tag::findOrCreate('CSS', 'courseTag');
        $tag->setTranslation('name', 'nl', 'CSS');
        $tag->save();

        $tag = Tag::findOrCreate('HTML', 'courseTag');
        $tag->setTranslation('name', 'nl', 'HTML');
        $tag->save();

        $tag = Tag::findOrCreate('Schrijven', 'courseTag');
        $tag->setTranslation('name', 'nl', 'Schrijven');
        $tag->save();
    }
}
