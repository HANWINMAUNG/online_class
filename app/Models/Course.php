<?php
namespace App\Models;
use App\Models\Episode;
use App\Models\Category;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    public function Episode()
    {
        return $this->hasMany(Episode::class);
    }

    public function setTitleAttributes($value)
    {
        $this->attributes['title'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeFilter(Builder $builder, array $filters)
    {    
             $builder = $builder->when($filters['search'] ?? false, function ($q,$filter){
             $q->where('title','like', '%'. $filter.'%')
             ->orWhere('description','like', '%'.$filter.'%');
         });
            $builder = $builder->when($filters['category_id'] ?? false, function ($query){
             $query->whereIn('id', function($query){
                              $query->select('course_id')
                                         ->from('category_course')
                                          ->where('category_id', request('category_id'));
                      });
         }); 
            return $builder;
     }
}
