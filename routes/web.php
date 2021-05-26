<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user{id}/createpost',function($id){

	$user = User::findOrFail($id);

	$post = new Post(['title'=>'Php','body'=>'Php is backend language for web development']);

	$user->posts()->save($post);

	return 'done';

});

Route::get('/user{id}/read',function($id){
	$user = User::findOrFail($id);

	return $user->posts;
});

Route::get('/user{id}/post{id2}/update',function($id,$id2){
	$user = User::findOrFail($id);

	$user->posts()->whereId($id2)->update(['title'=>'HTML','body'=>'HyperText Markup Language']);

	return 'done';
});

Route::get('user{id}/post{id2}/delete',function($id,$id2){
	$user = User::findOrFail($id);

	$user->posts()->whereId($id2)->delete();

	return 'done';
});