<?php

namespace Domain\Course\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Support\Period;
use Domain\Model;
use Domain\Topic\Models\Topic;
use Domain\User\Models\User;

class Section extends Model
{
    public function chapter()
    {
        return $this->belongsToMany(Chapter::class, 'chapter_section', 'section_id', 'chapter_id');
    }
}
