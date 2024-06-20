<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
    ];
    const UPDATED_AT = null;

    protected $fillable = ['name', 'email', 'company', 'text'];
}

