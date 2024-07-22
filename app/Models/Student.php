<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ["password"];

    protected $casts = [
        "password" => "hashed"
    ];

    public function career() : BelongsTo {
        return $this->belongsTo(Career::class);
    }
    
}
