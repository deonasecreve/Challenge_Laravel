<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Examuser
 */
class Examuser extends Model
{
    protected $table = 'examusers';

    public $timestamps = false;

    protected $fillable = [
        'exam',
        'user'
    ];

    protected $guarded = [];

        
}