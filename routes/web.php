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
use App\Dommage;

Route::get('/' , function(){return view('front.user.uza.index');})->name('index');
Route::get('/index' , function(){return view('front.user.uza.index');})->name('index');
Route::get('/about' ,function(){return view('front.user.uza.about');})->name('about');
Route::get('/blog' ,function(){return view('front.user.uza.blog');})->name('blog');;
Route::get('/contact' ,function(){return view('front.user.uza.contact');})->name('contact');;
Route::get('/services' ,function(){return view('front.user.uza.services');})->name('services');;


/*
Route::get('/', function () {
    return view('auth.login');
});*/
Auth::routes(['register' => false]);
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users','UsersController',['except'=>['show','create','store']]);
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/edit','UsersController',[]);
});
Route::get('cRemorque/{idVoyage}', 'TacheController@fairePhase1')->name('fPhase1');
Route::post('chargement/{id_remorque}', 'DommageController@store');
Route::get('vtache', 'TacheController@index')->name('vtache');
Route::get('listeRemorque/{idVoyage}', 'TacheController@fairePhase2')->name('fPhase2');
Route::get('cVoyageList', 'voyageController@index')->name('CVoyageList');
Route::get('cVoyage', 'voyageController@showVoyageForm')->name('CVoyage');
Route::post('/cVoyage', 'voyageController@add');
Route::get('edit/{idVoyage}','voyageController@edit');
Route::post('edit/{idVoyage}', 'voyageController@update');
Route::get('delete/{idVoyage}','voyageController@delete');
Route::get('autocomplete', 'voyageController@search');
Route::get('CRegister', 'Auth\RegisterController@showRegistrationForm')->name('CRegister');
Route::post('/CRegister', 'Auth\RegisterController@register');
Route::get('SaissieDommage/{id_remorque}', 'DommageController@postView1')->name('vDommage');
Route::view('edit','edit');
Route::get('cRemorqueview/{idVoyage}', 'remorqueController@cRemorqueview');
Route::get('listDommages/{id_remorque}','DommageController@index')->name('DList');
Route::get('listRemorque/{idVoyage}','remorqueController@viewlist')->name('Rlist');
Route::post('cRemorque/{idVoyage}', 'remorqueController@add')->name('addRemorque');
Route::get('deleteRemorque/{id_remorque}','remorqueController@deleteRemorque');
Route::get('validerTache/{id_remorque}','DommageController@validerTache');
Route::get('editDommages/{Dommage_id}','DommageController@editDommage');
Route::post('editDommages/{Dommage_id}', 'DommageController@updateDommage');
Route::get('deleteDommages/{Dommage_id}','DommageController@deleteDommage');
Route::get('cDommagephase1/{id_remorque}','remorqueController@cDommagephase1')->name('cDommagephase1');
Route::get('cDommagephase2/{id_remorque}','remorqueController@cDommagephase2')->name('cDommagephase2');



