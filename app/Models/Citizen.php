<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Citizen extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'secondName',
        'thirdName',
        'phone',
        'gender',
        'passport',
        'country',
        'birthday',
    ];

    protected $dates = [
        'created_at',
        'birthday',
        'updated_at',
    ];

    public function notes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function gender(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        if ($this->gender == 1) {
            return "<i class='bi bi-gender-male text-info'></i>";
        } else {
    return "<i class='bi bi-gender-female text-danger-emphasis'></i>";
}
}

public function country(): array|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
    {
        if ($this->country == 6) {
            return trans('app.dashoguz');
        } elseif ($this->country == 5) {
            return trans('app.ahal');
        } elseif ($this->country == 4) {
            return trans('app.balkan');
        } elseif ($this->country == 3) {
            return trans('app.mary');
        } elseif ($this->country == 2) {
            return trans('app.lebap');
        } else {
            return trans('app.ashgabat');
        }
    }

    public function getImage()
{
    return $this->image ? Storage::url('citizen/' . $this->image) : asset('img/user.png');
}
}
