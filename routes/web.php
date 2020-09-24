<?php

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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks', function(){
$tasks = DB::select('select * from tasks');
return view('tasks',['tasks' =>$tasks]);
});

Route::post('add', function(Request $reqeust){
    $content = $reqeust->input('content');
    
   DB::insert('insert into tasks (content) values (?)', [$content]);
    return redirect('tasks');
    
});

Route::post('delete', function(Request $reqeust){
$id = $reqeust->input('id');
DB::delete('delete from tasks where id = ?', [$id]);
return redirect('tasks');
});

\URL::forceScheme('https');