<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'parent',
        'grade',
        'balance',
        'university_id',
        'city_id'
    ];


    public function university()
    {
        return $this->belongsTo(University::class);
    }
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }



}
