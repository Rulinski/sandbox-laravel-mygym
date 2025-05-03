<?php

namespace App\Http\Controllers;

use App\Models\ScheduledClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $bookings = auth()->user()->bookings()->upcoming()->get();

        return view('member.upcoming', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     *
     * @return View
     */
    public function create(): View
    {
        $scheduledClasses = scheduledClass::upcoming()
            ->with('classType', 'instructor') //eager loading
            ->notBooked()
            ->oldest()->get();

        return view('member.book', compact('scheduledClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        auth()->user()->bookings()->attach($request->scheduled_class_id);

        return redirect()->route('booking.index')->with('message', 'Booking created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        auth()->user()->bookings()->detach($id);

        return redirect()->route('booking.index')->with('message', 'Booking deleted');
    }
}
