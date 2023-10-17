<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

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
    $posts = Post::all();

    // collect(File::files(resource_path("posts")))
    // ->map(fn($file) => YamlFrontMatter::parseFile($file))
    // ->map(fn($document) => new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    // ));

    return view('posts',[
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function($slug){
    $post = Post::findOrFail($slug);

    return view('post',[
        'post' => Post::findOrFail($slug)
    ]);

    return $post;

});
