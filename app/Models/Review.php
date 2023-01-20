<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    //relationship with users
    public function user(){
        return $this->belongsTo(User::class, 'review_by');
    }
}
