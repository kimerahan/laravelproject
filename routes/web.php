<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\MemberModel;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Route::model('task','Task');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home','TaskController@home');
//Route::get('/create','TaskController@create')->name('create');

Route::get('/', 'TaskController@home');
Route::get('/create','TaskController@create');
Route::get('/edit','TaskController@edit');

//Route::get('/delete','TaskController@delete');
Route::get('/edit/{id}','TaskController@edit');
Route::post('/edit', 'TaskController@doEdit');
//Route::get('/delete/{id}','TaskController@delete');
Route::get('/delete/{task}','TaskController@delete');
Route::post('/delete', 'TaskController@doDelete');
//Route::get('/delete','TaskController@delete');

Route::post('/create', 'TaskController@saveCreate');
Route::get('/about', function()
{
return View::make('about');
});
Route::get('/contact', function()
{
return View::make('contact');
});

Route::get('task/{id}', 'TaskController@show')->where('id', '\d+');

/*Route::get('/', function()
{
$task = new \App\Task;
$task->title = 'Eating breakfast';
$task->body = 'Remember to buy bread, egg and milk.';
$task->user_id = 2;
$task->done = 0;
$task->save();

});*/




/*Route::get('/ch', function(){
Schema::create('churchmembers', function($table)
{
$table->increments('id');
$table->string('name');
$table->text('phone');
$table->text('email');
$table->text('occupation');
$table->text('age');
$table->text('sex');
$table->timestamps();
echo "done";

});
});*/

/*Route::get('/home','TaskController@home');
Route::get('/create','TaskController@create');
Route::get('/edit','TaskController@edit');
Route::get('/delete','TaskController@delete');*/

//create table called tasks The tasks table will contain many tasks; thus, it should be plural and it should be lowercase

/*Route::get('/', function())
{
Schema::create('tasks', function($table)
{
$table->increments('id');
$table->string('title');
$table->text('body');
$table->integer('user_id');
$table->boolean('done');
$table->timestamps();

});

});*/
//dropping tables
/*Route::get('/', function())
{
Schema::drop('tasks');
});*/

/*Route::get('/', function()
{
$task = new Task;
$task->title = 'Eating breakfast';
$task->body = 'Remember to buy bread, egg and milk.';
$task->save();
});*/
//updating
/*Route::get('/', function()
{
$task = Task::find(1);
$task->title = 'Eating different breakfast';
$task->body = 'Remember to buy beefsteak';
$task->save();
});
//deleting
Route::get('/', function()
{
$task = Task::find(1);
$task->delete();
});
 displaying
 Route::get('/', function()
{
$task = Task::find(1);
return $task->title;
});
*/

Route::get('/form',function(){
   return view('form');
});

Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

Route::resource('upload','FileController');
Route::resource('devotional','DevotionController');
Route::resource('devotionalview','DevotionViewController');


// API routes...
Route::get('/api/v1/devotions/{id?}', ['middleware' => 'auth.basic', function($id = null) {
if ($id == null) {
    $devotions = App\Task::all(array('id', 'title', 'body','image','sermon'));
} else {
    $devotions = App\Task::find($id, array('id', 'title', 'body','image','sermon'));
}
return Response::json(array(
            'error' => false,
            'devotions' => $devotions,
            'status_code' => 200
        ));
}]);

Route::post('import', 'MemberController@import')->name('import');
Route::get('/memberdetails','MemberController@index');

Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $members = MemberModel::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->orWhere ( 'occupation', 'LIKE', '%' . $q . '%' )->orWhere ( 'age', 'LIKE', '%' . $q . '%' )->orWhere ( 'sex', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $members ) > 0)
        return view ( 'search' )->withDetails ( $members )->withQuery ( $q );
    else
        return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::get('/createmember','MemberController@createmember');
Route::post('/createmember', 'MemberController@saveCreate');
//Route::post('/createmember', 'MemberController@postUploadCsv');
Route::get('member/{id}', 'MemberController@show')->where('id', '\d+');

Route::get('/editmember','MemberController@editmember');
Route::get('/editmember/{id}','MemberController@editmember');
Route::post('/editmember', 'MemberController@doEdit');
Route::resource('tasks', 'TaskController');

Route::get('/deletemember/{member}','MemberController@delete');
Route::post('/deletemember', 'MemberController@doDelete');

Route::get('/api/v1/members/{id?}', ['middleware' => 'auth.basic', function($id = null) {
if ($id == null) {
    $members = App\MemberModel::all(array('id', 'name', 'phone','email','occupation','age','sex'));
} else {
    $members = App\MemberModel::find($id, array('id', 'name', 'phone','email','occupation','age','sex'));
}
return Response::json(array(
            'error' => false,
            'members' => $members,
            'status_code' => 200
        ));
}]);
