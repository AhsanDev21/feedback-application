<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\View;


class FeedbackController extends Controller
{
    public function index()
    {
        if(Feedback::count() > 0)
        {
            $feedbackItems = Feedback::all(); // Fetch all feedbacks
            return view('back.backFeedback.list',['feedbackItems' => $feedbackItems]);
        }
        return redirect()->route('back.dashboard')->withErrors(['message' => 'No Feedbacks Available']);
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('message', 'Feedback deleted successfully');
    }


}
