<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Estate extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public static function edit($array)
    {
    }

    public static function findOrFail($id)
    {
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function image()
    {
        if ($this->image) {
            return Storage::url('public/estates/' . $this->image);
        } else {
            return $this->image ? asset('img/'. $this->image) : asset('img/sssss.JPG');
        }
    }

    public function getName()
    {
        $locale = app()->getLocale();
        if ($locale == 'tm') {
            return $this->name_tm;
        }
        elseif ($locale == 'en') {
            return $this->name_en ?: $this->name_tm;
        }
        else {
            return $this->name_tm;
        }
    }
}
