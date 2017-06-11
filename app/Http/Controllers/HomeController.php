<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ExamUserStatus;
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

    public function exam(Request $request, $id, $status)
    {
        if (Auth::user()->role != LoginRoles::STUDENT) {
            $request->session()->flash("status", "Je moet een student zijn om te accepteren");
            return redirect()->route("home");
        }

        $accepted = null;

        if (strtolower($status) == "accept") {
            $accepted = ExamUserStatus::ACCEPTED;
        }
        if (strtolower($status) == "reject") {
            $accepted = ExamUserStatus::REJECTED;
        }

        $a = User::find(Auth::user()->id)
            ->exams()
            ->updateExistingPivot($id, ["accepted" => $accepted]);

        return redirect()->route("home");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == LoginRoles::STUDENT) {
            $exams = User::find(Auth::user()->id)->exams()->withPivot("accepted", "id")->get();
            return view('student', array('exams' => $exams, 'status' => new ExamUserStatus()));
        }  else {
            return view('teacher');
        }
    }
}
