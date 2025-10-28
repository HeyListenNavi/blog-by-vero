<?php

namespace App\Http\Controllers;

use App\Models\Sketch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SketchController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sketches = Sketch::latest()->paginate(15);

        return view('sketches', compact('sketches'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sketch $sketch)
    {
        return view('layouts.sketch', compact('sketch'));
    }
}
