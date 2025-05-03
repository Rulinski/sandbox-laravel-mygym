<?php

namespace App\Http\Controllers;

use App\Models\ScheduledClass;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new booking.
     *
     * @return View
     */
    public function create(): View

    {
        $scheduledClasses = scheduledClass::where('date_time', '>', now())
            ->with('classType', 'instructor')
            ->oldest('date_time')->get();

        return view('member.book', compact('scheduledClasses'));
    }
}
