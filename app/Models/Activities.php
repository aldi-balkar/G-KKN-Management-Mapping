<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'lecturer_id',
        'village_name',
        'village_address',
        'latitude',
        'longitude',
        'activity_name',
        'activity_description',
        'status',
        'student_name',
        'lecturer_name',
        'student_study_program',
        'lecturer_study_program',
        'student_phone',
        'lecturer_phone',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}
