<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//User Profile

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

//Admin Section

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::any('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('auth:admin');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Route to display the list of users based on selected category (nationality, religion, department, etc.)
Route::get('admin/users/list', [AdminUserController::class, 'index'])->name('admin.users.list');

// Route to view a single user's details
Route::get('admin/users/view/{id}', [AdminUserController::class, 'view'])->name('admin.users.view');

// Route to edit a user's details
Route::get('admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');

// Route to update a user's details
Route::post('admin/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');

// Route to delete a user
Route::delete('admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

//Find User
Route::get('/admin/users/country/{country}', [AdminDashboardController::class, 'showUsersByCountry']);
Route::get('/admin/users/religion/{religion}', [AdminDashboardController::class, 'showUsersByReligion']);
Route::get('/admin/users/department/{department}', [AdminDashboardController::class, 'showUsersByDepartment']);
Route::get('/admin/users/course/{course_type}', [AdminDashboardController::class, 'showUsersByCourse']);

// Routes for users by category
Route::get('admin/users/{category}/{value?}', [UserController::class, 'listByCategory'])->name('admin.users.list');

//Routes for download pdf
Route::get('admin/users/pdf/{id}', [UserController::class, 'downloadPDF'])->name('admin.users.pdf');

// Route to display the search
Route::get('admin/users/search', [SearchController::class, 'showSearchForm'])->name('search.form');
Route::get('/admin/users/search/results', [SearchController::class, 'search'])->name('search');


//photo Post
Route::prefix('admin')->group(function() {
    Route::resource('photos', PhotoController::class);
});

//Video Post

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('videos', VideoController::class);
});

//Students Upload
Route::prefix('admin')->group(function () {
    Route::resource('students', StudentController::class);
});



//IFrame for Loding university class Routine and University Profile
Route::get('/class_routine', function () {
    return view('class_routine');
});

Route::get('/university_profile', function () {
    return view('university_profile');
});



