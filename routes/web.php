<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DoubleAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserSearchController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Route::get('/moderator', function () {
//     return view('moderator.moderator');
// })->middleware(RoleMiddleware::class)->name('moderator');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/user', function () {
//     return view('user.user');
// })->name('User')->middleware('role:User');

Route::middleware('role:User')->group(function () {
    Route::get('/user', function () {
        return view('user.user');
    })->name('User');
    
});
Route::get("/rental" , function (){
    return view("rentals.rentals");
});
Route::get('/user/selectedRental/{rental}', [RentalController::class, 'show'])->name('rental.show');
Route::middleware('role:Admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('Admin');
    Route::post("/admin/postRentals" , [RentalController::class , "store"])->name("PostRentals.store");

});

Route::get('/2fa', [DoubleAuthController::class, 'index'])->name('doubleAuth.index');
Route::post('/2fa/switchAuthOption', [DoubleAuthController::class, 'switchAuthOption'])->name('doubleAuth.switchAuthOption');
Route::post('/2fa/verityCode', [DoubleAuthController::class, 'verityCode'])->name('doubleAuth.verityCode');
Route::get('/2fa/resendCode', [DoubleAuthController::class, 'resendCode'])->name('doubleAuth.resendCode');


Route::get('/search', [UserSearchController::class , "search"])->name('rentals.search');






require __DIR__ . '/auth.php';
