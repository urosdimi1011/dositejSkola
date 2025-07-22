<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'key',
        'label',
        'sort_order',
        'tip'
    ];

    public function staffMembers()
    {
        return $this->hasMany(StaffMembers::class, 'position_id');
    }
}
