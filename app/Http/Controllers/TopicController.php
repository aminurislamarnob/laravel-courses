<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index($slug){
        $topics = Topic::where('slug', $slug)->first();
        $courses = $topics->courses()->paginate(12);
        // return $courses;

        return view('topic.single', [
            'topics' => $topics,
            'courses' => $courses
        ]);
    }
}
