<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\LoginRoles;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == LoginRoles::STUDENT) {
            // $exams = Auth::user()->exams;
            $exams = User::find(Auth::user()->id)->exams()->get();
            return view('student', ['exams' => $exams]);
        }  else {
            return view('teacher');
        }
    }
}
