<?php

namespace Domain\Topic\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Support\Period;
use Domain\Course\Models\Course;
use Domain\Model;

class Topic extends Model implements Viewable
{
    use InteractsWithViews;

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getUniqueViewsCount()
    {
        return views($this)
            ->period(Period::subMonths(1))
            ->unique()
            ->count();
    }
}
