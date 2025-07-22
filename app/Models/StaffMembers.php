<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StaffMembers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
        'bio',
        'position_id',
        'photo_path',
    ];
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class,'staff_member_id','id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}


