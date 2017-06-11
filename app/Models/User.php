<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
{
    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'role'
    ];

    protected $guarded = [];

    public function exams() 
    {
        return $this->belongsToMany("App\Models\Exam", "exam_user");
    }       
}