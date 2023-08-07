<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [ ];

    public function Instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

    public function Category(){ 
        return $this->belongsToMany(Category::class);
    }
}
