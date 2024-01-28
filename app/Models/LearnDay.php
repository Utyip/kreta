<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearnDay extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        "title",
        "date",
        "course_id",
    ];

    public function course(): BelongsTo
    {
        return $this->BelongsTo(Course::class);
    }
 
    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
