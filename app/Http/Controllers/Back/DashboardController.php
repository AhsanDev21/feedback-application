<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\{Feedback, User};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::where('user_type','student')->count();
        $totalFeedback = Feedback::count();
        return view('back.dashboard',['totalUser'=>$totalUser,'totalFeedback'=>$totalFeedback]);
    }
}
