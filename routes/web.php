<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // collect(File::files(resource_path("posts")))
    // ->map(fn($file) => YamlFrontMatter::parseFile($file))
    // ->map(fn($document) => new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    // ));

    \Illuminate\Support\Facades\DB::listen(function($query){
        logger($query->sql, $query->bindings);
    });

    return view('posts',[
        'posts' => Post::with('category')->get()
    ]);
});

Route::get('posts/{post:slug}', function(Post $post){ //Post::where('slug', $post)->firstOrFail()
    return view('post',[
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts', [
        'posts' => $category->posts
    ]);
});
