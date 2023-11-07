<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Feedback, Comment};
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_type', 'student')->get();
        return view('back.report.list', ['users' => $users]);
    }

    public function destroy(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user->delete();
        return back()->with('message', 'User deleted successfully');
    }

}
