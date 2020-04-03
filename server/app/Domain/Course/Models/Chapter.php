<?php

namespace Domain\Course\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Support\Period;
use Domain\Model;
use Domain\Topic\Models\Topic;
use Domain\User\Models\User;

class Chapter extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_chapter', 'course_id', 'chapter_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'chapter_section', 'chapter_id', 'section_id');
    }
}
