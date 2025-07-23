<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Site;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $site = Site::first();
        $site->load('comments');

        return view('comments', compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $model, $id)
    {
        if (!in_array($model, ['site', 'user'])) {
            return back()->withErrors(['model' => 'Invalid commentable type']);
        }

        $rules = [
            'comment' => 'required|string|max:1000',
        ];

        $messages = [
            'comment.required' => 'uh, you need to comment something??',
            'comment.string' => 'you werent supposed to be here',
            'comment.max' => 'thats waaaay too much, consider sending me an email instead!'
        ];

        $validated = $request->validate($rules, $messages);

        if (!Relation::getMorphedModel($model)::find($id))
        {
            return back()->withErrors(['id' => 'Commentable not found']); 
        }

        Comment::create([
            'user_id' => Auth::user()->id,
            'content'  => $validated['comment'],
            'commentable_type' => Relation::getMorphAlias($model),
            'commentable_id' => $id,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
