<?php
namespace App\Models;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;
    protected $guarded = [ ];

    public function Course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function setTitleAttributes($value)
    {
        $this->attributes['title'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }
}
