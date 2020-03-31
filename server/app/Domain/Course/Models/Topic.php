<?php

namespace Domain\User\Models;

use Domain\Model;
use Domain\User\Models\User;

use Illuminate\Database\Eloquent\Relationships\BelongsToMany;

class Topic extends Model
{
    protected $table = 'course_topics';
}
