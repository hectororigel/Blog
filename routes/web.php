<?php

use App\Notifications\SubscriptionRenewalFailed;
use Illuminate\Http\Request;


/*Route::get('/', function () {
    $user = App\User::first();

    $user->notify(new SubscriptionRenewalFailed);

    return 'Done';
}); */



Route::get('/', function () {
   return view('welcome');
});

Route::get('projects/create', function(){

    return view('projects.create');
});

Route::post('projects', function() {

    flash('Your Project has been created');

    return redirect('/');

});

Route::resource('projects', 'ProjectsController')->middleware('can:update,project');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');


Route::patch('/tasks/{task}', 'ProjectTaskController@update');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
