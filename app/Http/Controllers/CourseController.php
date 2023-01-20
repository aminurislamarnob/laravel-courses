<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function courses(){

    }

    //single course
    public function show($slug){
        $course = Course::where('slug', $slug)->with(['platform', 'topics', 'series', 'authors', 'reviews'])->first();

    //    return response($course);

        if(empty($course)){
            return abort(404);
        }

        return view('course.single', [
           'course' => $course
        ]);
    }


}
