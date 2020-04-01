<?php

namespace Domain\Topic\Models;

use Domain\Model;
use Domain\User\Models\User;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Relationships\BelongsToMany;

class Topic extends Model implements Viewable
{
    use InteractsWithViews;
}
