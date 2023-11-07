<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use App\Models\Feedback;


class FeedbackController extends Controller
{
    protected $paginationTheme = "bootstrap";

    public function index()
    {
        $feedback = Feedback::paginate(5);
        return view('feedback.index', compact('feedback'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(FeedbackRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        Feedback::create($validatedData);

        return redirect()->route('feedback.index')->with('message', 'Feedback submitted successfully');
    }

    public function vote($id)
    {
        $feedback = Feedback::find($id);
        $user = auth()->user();

        if ($user && !$feedback->voters->contains($user)) {
            $feedback->voters()->attach($user);
            $feedback->increment('votes');
            return redirect()->back()->with('message', 'Vote counted.');
        }

        return redirect()->back()->withErrors(['message' => 'You have already voted for this feedback.']);
    }


}
