<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\Admin\AdminProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/skill', function () {
    return view('skill');
});
Route::get('/skill', [SkillsController::class, 'index'])->name('skill');

Route::get('/certi', function () {
    return view('certificate');
});
Route::get('/certi', [CertificateController::class, 'index'])->name('certi');

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/contact', [ContactsController::class, 'index'])->name('contact');


Route::get('/project', function () {
    return view('project');
});
Route::get('/project', [ProjectController::class, 'index'])->name('project');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/about', [AboutController::class, 'index'])->name('about');
// Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
// Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('contacts', ContactController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('certificate', AdminCertificateController::class);
    Route::resource('projects', AdminProjectController::class);
});

// Route::group(['middleware' => ['auth','AdminMiddleware:admin']], function () {
//     Route::resource('contacts', ContactController::class);
//     Route::resource('skills', SkillController::class);
//     Route::resource('certificate', AdminCertificateController::class);
//     Route::resource('projects', AdminProjectController::class);
// });

// Route untuk menampilkan form create
// Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('admin.project.create');

// // Route untuk menyimpan data project
// Route::post('/admin/project', [ProjectController::class, 'store'])->name('admin.project.store');

// Route::resource('/admin/certificate', AdminCertificateController::class);

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth')->name('admin.index');

require __DIR__.'/auth.php';