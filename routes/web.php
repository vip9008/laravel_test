<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DayController;

Route::get('/', function () {
    $firstDay = \App\Models\Day::first();
    return redirect("/day/{$firstDay->id}"); // Redirect to Day 1
});

Route::get('/day/{id}', [DayController::class, 'show'])->name('day.show');
