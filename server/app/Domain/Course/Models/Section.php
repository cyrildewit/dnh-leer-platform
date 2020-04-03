<?php

namespace Domain\Course\Models;

use Domain\Model;

class Section extends Model
{
    public function chapter()
    {
        return $this->belongsToMany(Chapter::class, 'chapter_section', 'section_id', 'chapter_id');
    }
}
