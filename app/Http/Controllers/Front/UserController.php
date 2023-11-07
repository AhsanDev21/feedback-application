<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Feedback, User};
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    public function index()
    {
        return redirect()->route('feedback.index');
    }
}
