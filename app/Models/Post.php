<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Lexer\TokenEmulator\FnTokenEmulator;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) //Post::newQuery()->filter()
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orwhere('body', 'like', '%' . $search . '%'));
    }

    // protected $fillable = ['title', 'excerpt', 'body', 'id'];

    public function category(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){ //author_id user_id etc
        return $this->belongsTo(User::class, 'user_id');
    }

}
