<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    //
    protected $fillable = [
        'title',
        'type',
        'file_path'
    ];
}
