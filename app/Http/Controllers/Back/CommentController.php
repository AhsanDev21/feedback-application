<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\View;


class CommentController extends Controller
{
    public function index()
    {
        if(Comment::count() > 0)
        {
            $comments = Comment::all(); // Fetch all comments
            return view('back.backComment.list',['comments' => $comments]);
        }

        return redirect()->route('back.dashboard')->withErrors(['message' => 'No Comments Available']);
    }

    public function toggle(Comment $comment)
    {
        $comment->update([
            'is_enabled' => !$comment->is_enabled,
        ]);

        return back()->with('message', 'Comment status updated successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('message', 'Comment deleted successfully');
    }

}
