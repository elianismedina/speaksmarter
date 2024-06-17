<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = [];

    /*one lesson my have many categories*/
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    /*one lesson has only one level*/
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
