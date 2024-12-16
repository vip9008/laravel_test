<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;

class DayController extends Controller
{
    public function show($id)
    {
        // Fetch the day and its related meals
        $day = Day::with('meals')->findOrFail($id);
        return view('day.show', compact('day'));
    }
}
