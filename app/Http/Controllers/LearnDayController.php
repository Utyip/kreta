<?php

namespace App\Http\Controllers;

use App\Models\LearnDay;
use App\Http\Requests\StoreLearnDayRequest;
use App\Http\Requests\UpdateLearnDayRequest;

class LearnDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function calendar()
    {
        
    }
    public function index()
    {
        $learnDays = LearnDay::all();
        return view("learnDays.index", ['learnDays' => $learnDays]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("learnDays.create");      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLearnDayRequest $request)
    {
        $learnday = new LearnDay(
            [
                "title" => $request->title,
                "date" => $request->date,
                "course_id" => $request->course_id,
            ]
        );

        $learnday->save();

        return back()->with("success", "Learn day created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(LearnDay $learnDay)
    {
        $this->authorize('view', $learnDay);
        return view('learnDays.show', ['learnDay' => $learnDay]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LearnDay $learnDay)
    {
        return view("learnDays.edit", ['learnDay' => $learnDay]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearnDayRequest $request, LearnDay $learnDay)
    {
        $learnDay->update($request->all());

        return redirect()->route('learnDays.index')->with('success', 'The learn day was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LearnDay $learnDay)
    {
        $learnDay->delete();
        return back()->with('success', 'Successfully deleted the learn day: ' . $learnDay->name . '.');
    }


    /* Saját funkciók */
    public function show_deleted()
    {
        $deleted_learnDays = LearnDay::onlyTrashed()->get();
        return view('learnDays.show_deleted', ['learnDay' => $deleted_learnDays]);
    }

    public function restore(LearnDay $learnDay)
    {
        $learnDay->restore();
        return back()->with('success', '' . $learnDay->name . ' was successfully restored.');
    }

}
