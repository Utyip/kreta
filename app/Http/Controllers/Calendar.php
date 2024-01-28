<?php

namespace App\Http\Controllers;

use App\Models\LearnDay;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $learnDays = LearnDay::all();
        return view("home", ['learnDays' => $learnDays]);
    }
}
