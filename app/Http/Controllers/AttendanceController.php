<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\LearnDay;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $LearnDays = LearnDay::all();
        return view("attendances.index", ['LearnDays' => $LearnDays]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $attendance = new Attendance(
            [
                "status" => $request->name,
                "learn_day_id"=>$request->learn_day_id,
                "student_id" => $request->student_id,
            ]
        );

        $attendance->save();

        return back()->with("success", " created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        return view("attendances.index");       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
 //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update($request->all());

        return  back()->with("success", " change successfully."); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
