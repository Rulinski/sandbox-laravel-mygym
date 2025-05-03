<?php

namespace App\Http\Controllers;

use App\Events\ClassCanceled;
use App\Models\ClassType;
use App\Models\ScheduledClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $scheduledClasses = auth()->user()->scheduledClasses()->upcoming()->oldest('date_time')->get();

        return view('instructor.scheduled-classes', ['scheduledClasses' => $scheduledClasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View

    {
        $classTypes = ClassType::all();

        return view('instructor.schedule', compact('classTypes'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $date_time = $request->input('date').' '.$request->input('time');

        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => auth()->id()
        ]);

        $validated = $request->validate([
            'instructor_id' => 'required',
            'class_type_id' => 'required',
            'date_time' => 'required|unique:scheduled_classes,date_time|after:now',
        ]);

        ScheduledClass::create($validated);

        return redirect()->route('schedule.index')->with('message', 'Class created');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduledClass $schedule): RedirectResponse
    {
        //use policy ScheduledClassPolicy->delete()
        if (auth()->user()->cannot('delete', $schedule)) {
            abort(403, 'You are not authorized to delete this class.');
        }

        ClassCanceled::dispatch($schedule);

        $schedule->delete();
        $schedule->members()->detach();

        return redirect()->route('schedule.index')->with('message', 'Class deleted');
    }
}
