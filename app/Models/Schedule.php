<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'type',
        'title',
        'file_path',
        'is_active',
        'study_program_id'
    ];
}
