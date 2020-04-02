<?php

namespace Domain\Topic\Models;

use Domain\Model;
use Domain\User\Models\User;
use Domain\Course\Models\Course;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Database\Eloquent\Relationships\BelongsToMany;


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
