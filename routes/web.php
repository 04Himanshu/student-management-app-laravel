<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/app-info', function () {
//     return [
//         'name' => config('app.name'),
//         'environment' => app()->environment(),
//         'debug' => config('app.debug'),
//     ];
// });

Route::get('/', function () {
    return "This is learning laravel project";
});


// Route::get('/students', function () {
//     return "Students list";
// });

// Route::get('/students-clouser', fn() => "This is a shorthand pratice");



Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');
