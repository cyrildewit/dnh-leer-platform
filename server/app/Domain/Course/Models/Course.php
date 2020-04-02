<?php

namespace Domain\Course\Models;

use Domain\Model;
use Domain\User\Models\User;
use Domain\Topci\Models\Topic;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Relationships\BelongsToMany;
use CyrildeWit\EloquentViewable\Support\Period;

class Course extends Model implements Viewable
{
    use InteractsWithViews;

    protected $table = 'courses';

    protected $casts = [
        'learning_points' => 'array',
        'target_audience' => 'array',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_author', 'course_id', 'user_id')
            ->withTimestamps();
    }

    public function topics()
    {
        return $this->belongsTo(Topic::class)->withTimestamps();
    }

    public function getUniqueViewsCount()
    {
        return views($this)
            ->period(Period::subMonths(1))
            ->unique()
            ->count();
    }
}
