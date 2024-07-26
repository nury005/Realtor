<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
//    use HasRoles;


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


    public function getImage()
    {
        return $this->image ? Storage::url('users/' . $this->image) : asset('img/user.png');
    }
}

