<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Add also user_id
    protected $fillable = ['title' , 'description' , 'user_id']; //only fill title and description in DB

    public function user() {
        //User::class = App\user
        return $this->belongsTo(User::class);
    }
}
