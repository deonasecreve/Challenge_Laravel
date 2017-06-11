<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\ExamUserStatus;
use App\Models\LoginRoles;
use App\Models\User;
use App\Models\Exam;

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

    public function updateStudent(Request $request, $id)
    {
        if (Auth::user()->role != LoginRoles::TEACHER) {
            $request->session()->flash("status", "Je moet een leraar zijn om te bewerken");
            return redirect()->route("home");
        }

        $user = User:: find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
        return redirect()->route("home");
    }

    public function newStudent()
    {
        Auth::logout();
        return view("auth/register");
    }

    public function editStudent(Request $request, $id)
    {
        if (Auth::user()->role != LoginRoles::TEACHER) {
            $request->session()->flash("status", "Je moet een leraar zijn om te bewerken");
            return redirect()->route("home");
        }

        return view("editStudent", ['id'=> $id, 'student' => User:: find($id)]);  
    }

    public function edit(Request $request, $id)
    {
        if (Auth::user()->role != LoginRoles::TEACHER) {
            $request->session()->flash("status", "Je moet een leraar zijn om te bewerken");
            return redirect()->route("home");
        }

        $exam = Exam::find($id);
        $results = $exam->users()->withPivot("accepted", "result")->get();

        return view('edit', ['exam' => $exam, 'results' => $results]);
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
            return view('student', array('user' => Auth::user(), 'exams' => $exams, 'status' => new ExamUserStatus()));
        }  else {
            $exams = Exam::all();
            $students = User::where('role', LoginRoles::STUDENT)->get();
            return view('teacher', array('exams'=>$exams,'students'=>$students));
        }
    }
}
