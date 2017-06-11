<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exam
 */
class Exam extends Model
{
    protected $table = 'exams';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'time',
        'examiner'
    ];

    protected $guarded = [];

    public function users() 
    {
        return $this->belongsToMany("App\Models\User", "exam_user");
    }   
}