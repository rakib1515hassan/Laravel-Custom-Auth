<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customAuth;


// Route::group(['namespace' => 'Auth'], function () {

//     Route::get('/login', [customAuth::class, 'login'])
//         ->name('login')
//         ->middleware('isNotLoggedIn');

//     Route::get('/registration', [customAuth::class, 'registration'])
//         ->name('registration')
//         ->middleware('isNotLoggedIn');

//     Route::get('/dashbord', [customAuth::class, 'dashbord'])
//         ->name('dashbord')
//         ->middleware('isLoggedIn');

//     Route::get('/logout', [customAuth::class, 'logout'])
//         ->name('logout')
//         ->middleware('isLoggedIn');

//     Route::post('/registration-user', [customAuth::class, 'registrationUser'])
//         ->name('registration-user');

//     Route::post('/login-user', [customAuth::class, 'loginUser'])
//         ->name('login-user');
// });



Route::get(
    '/login',
    [customAuth::class, 'login']
)
    ->name('login')
    ->middleware('isNotLoggedIn');

Route::get(
    '/registration',
    [customAuth::class, 'registration']
)
    ->name('registration')
    ->middleware('isNotLoggedIn');

Route::get(
    '/profile',
    [customAuth::class, 'profile']
)
    ->name('profile')
    ->middleware('isLoggedIn');

Route::get(
    '/logout',
    [customAuth::class, 'logout']
)
    ->name('logout')
    ->middleware('isLoggedIn');


Route::post('/registration-user', [customAuth::class, 'registrationUser'])->name('registration-user');
Route::post('/login-user', [customAuth::class, 'loginUser'])->name('login-user');
