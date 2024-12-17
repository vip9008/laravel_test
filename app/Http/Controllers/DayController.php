<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;

class DayController extends Controller
{
    public function show($id)
    {
        $allDays = Day::all()->toArray();
        $weeks = array_chunk($allDays, 7);

        try {
            $day = Day::with('meals')->findOrFail($id);
        } catch (\Exception $e) {
            return redirect("/");
        }

        return view('day.show', compact('day', 'weeks'));
    }
}
