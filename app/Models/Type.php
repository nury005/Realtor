<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 */
class Type extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function estates()
    {
        return $this->hasMany(Estate::class);
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
