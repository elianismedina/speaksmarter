<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*this a  many to many relationship, a lesson has many categories and a category has many lessons*/

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}
