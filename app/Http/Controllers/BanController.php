<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanController extends Controller
{
    /**
     * Ban the currently authenticated user for five minutes.
     */
    public function ban(Request $request)
    {
        $request->session()->put('banned_until', now()->addMinutes(5));

        return redirect()->back()->with('status', 'You have been banned for 5 minutes!');
    }
}
