<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    // protected $fillable = ['title', 'excerpt', 'body', 'id'];

    public function category(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){ //author_id user_id etc
        return $this->belongsTo(User::class, 'user_id');
    }

}
