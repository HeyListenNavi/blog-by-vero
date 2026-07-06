<?php

namespace App\Http\Controllers;

use Filament\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Storage;

class StoryVideoController extends Controller
{
    public function download(string $filename)
    {
        auth()->user()->notifications()
            ->where('type', DatabaseNotification::class)
            ->where('data->viewData->filename', $filename)
            ->delete();

        $path = Storage::disk('local')->path("stories/story-{$filename}.mp4");

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
