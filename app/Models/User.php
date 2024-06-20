<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'phone',
    ];

    protected $hidden = ['password', 'admin', 'remember_token'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static function create($array)
    {
    }


    public function getImage()
    {
        return $this->image ? Storage::url('citizen/' . $this->image) : asset('img/user.png');
    }
}

