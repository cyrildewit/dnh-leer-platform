<?php

namespace Domain\Course\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Support\Period;
use Domain\Model;
use Domain\Topic\Models\Topic;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relationships\BelongsToMany;
use Spatie\Tags\HasTags;

class Course extends Model implements Viewable
{
    use InteractsWithViews;
    use HasTags;

    protected $table = 'courses';

    protected $casts = [
        'learning_points' => 'array',
        'target_audience' => 'array',
    ];

    public function authors()//: BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_author', 'course_id', 'user_id');
        // ->withTimestamps();
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function chapters()
    {
        return $this->belongsToMany(Chapter::class, 'course_chapter', 'course_id', 'chapter_id');
    }

    public function getUniqueViewsCount()
    {
        return views($this)
            ->period(Period::subMonths(1))
            ->unique()
            ->count();
    }
}
