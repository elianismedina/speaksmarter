<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];
    /*one level has many lessons, level does not contain the foreign key, thats why we use hasMany*/
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
