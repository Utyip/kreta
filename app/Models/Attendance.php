<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable=[
        "student_id",
        "learnDay_id",
        "status",
    ];

    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class);
    }
    public function learn_day(): BelongsTo
    {
        return $this->BelongsTo(LearnDay::class);
    }
}
