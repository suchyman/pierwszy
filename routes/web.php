<?php
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\ExportExcelController;


Route::resource('products','ProductController')->middleware('auth');


Route::get('/download', function (){
return Excel::download(new UserExport, 'users.xlsx');

});


Route::get('/blog/post', ['middleware' => 'auth', function () {
    return view('post');
}]);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/wpis', 'HomeController@getFilter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

