<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //submited by
    public function submittedBy(){
        return $this->belongsTo(User::class, 'submitted_by', 'id');
    }

    //relationship with platform
    public function platform(){
        return $this->belongsTo(Platform::class);
    }

    //relationship with topic
    public function topics(){
        return $this->belongsToMany(Topic::class, 'course_topic', 'course_id', 'topic_id');
    }

    //relationship with series
    public function series(){
        return $this->belongsToMany(Series::class, 'course_series', 'course_id', 'series_id');
    }

    //relationship with authors
    public function authors(){
        return $this->belongsToMany(Author::class, 'course_author', 'course_id', 'author_id');
    }

    //relationship with reviews
    public function reviews(){
        return $this->hasMany(Review::class, 'course_id', 'id');
    }

    //get course duration
    public function courseDuration($value){
        if($value == 1){
            return '5-10 hours';
        }else if($value == 2){
            return '10+ hours';
        }else{
            return '1-5 hours';
        }
    }

    //course difficulty level
    public function courseDifficulty($value){
        if($value == 1){
            return 'Intermediate';
        }else if($value == 2){
            return 'Advanced';
        }else{
            return 'Beginner';
        }
    }
}
