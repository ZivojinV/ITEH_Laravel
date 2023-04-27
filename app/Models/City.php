<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'population',
        'is_capital',
        'history',
        'GDP'
    ];

    // public function students()
    // {
    //     return $this->hasMany(Gutiar::class);
    // }

}
