<?php

namespace Domain\Course\Models;

use Domain\Model;

class Chapter extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'chapter_section', 'chapter_id', 'section_id');
    }
}
