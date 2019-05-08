<?php
use Illuminate\Support\Facades\Input as input;
use App\User;


Route::get('/', 'PagesController@homepage');
Route::get('/cenik', 'PagesController@cenik');          //nastaveni odkazu v url
Route::get('/kontakty', 'PagesController@kontakty');
Route::get('/instruktori', 'PagesController@instruktori');
Route::get('/vozy', 'PagesController@vozy');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('trida', 'TridaController');
Route::resource('hours', 'HourController');
Route::resource('vozidla', 'CarsController');

Auth::routes();
Auth::routes(['verify' => true]);

//-------------------------------------//

Route::get('changepassword', function(){
    return view('auth.change_password');
});

Route::post('change/password', function() {
    $User = User::find(Auth::user()->id_user);

    if(Hash::check(Input::get('passwordold'), $User['password']) && Input::get('password') == Input::get('password_confirmation')){

        $User->password = bcrypt(Input::get('password'));
        $User->save();
        return back()->with('success', 'Password changed');
    }
    else{
        return back()->with('error', 'Password not changed!!');
    }
});
