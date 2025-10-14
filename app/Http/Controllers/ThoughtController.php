<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;

class ThoughtController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thoughts = Thought::latest()->paginate(20);

        return view('', compact('thoughts'));
    }
}
