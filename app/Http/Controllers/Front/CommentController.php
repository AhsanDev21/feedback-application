<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($feedback)
    {
        $feedback = Feedback::find($feedback);
        return view('comments.create', compact('feedback'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'feedback_id' => 'exists:feedback,id',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'feedback_id' => $request->feedback_id,
            'content' => $request->content,
        ]);

        return back()->with('message', 'Comment added successfully');
    }

    public function enable(Comment $comment)
    {
        $comment->update(['is_enabled' => true]);
        return back()->with('success', 'Comment enabled');
    }

    public function disable(Comment $comment)
    {
        $comment->update(['is_enabled' => false]);
        return back()->with('success', 'Comment disabled');
    }

}
