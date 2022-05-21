<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Models\Post; //temporal
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}); */


Route::get('/listUsers', [UserController::class,'index']);
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('eloquent',function(){
    $posts = Post::all();

    foreach ($posts as $post) {
        echo "$post->id $post->title <br>";
    }
});

Route::get('post',function(){
    $posts = Post::get();

    foreach ($posts as $post) {
        echo "
            $post->id 
            Usuario: {$post->user->name}
            Titulo: $post->title             
            <br>
        ";
    }
});

Route::get('users',function(){
    $users = User::get();

    foreach ($users as $user) {
        echo "
            $user->id 
            Usuario: $user->name
            Número de posts: {$user->posts->count()}             
            <br>
        ";
    }
});

Route::get('collections',function(){
    $users = User::all();

    /* dd($users->except([1,2,3])); */
    /* dd($users->only([1])); */
    /* dd($users->find(1)); */
    dd($users->load('posts'));
});

Route::get('serialization',function(){
    $users = User::all();

    $user = $users->find(1);

    dd($user->toJson());
    /* dd($users->toArray()); */
});



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
