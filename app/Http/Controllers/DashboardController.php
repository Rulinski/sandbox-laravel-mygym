<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return match (auth()->user()->role) {
            'instructor' => redirect()->route('dashboard.instructor'),
            'member' => redirect()->route('dashboard.member'),
            'admin' => redirect()->route('dashboard.admin'),
            default => redirect()->route('login')->with('message', 'You are not authorized to access this page.'),
        };
    }
}
