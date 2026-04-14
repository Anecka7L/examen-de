<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $applications = Application::where('user_id', Auth::id())->get();
        return view('applications.index', compact('applications'));
    }

    // public function create() {
    //     return view('applications.create');
    // }

    // public function store(Request $req) {
    //     $req->validate([
    //         'course_name' => 'required',
    //         'start_date' => 'required|date',
    //         'payment_method' => 'required|in:cash,transfer'
    //     ]);
        
    //     Application::create([
    //         'user_id' => Auth::id(),
    //         'course_name' => $req->course_name,
    //         'start_date' => $req->start_date,
    //         'payment_method' => $req->payment_method
    //     ]);
        
    //     return redirect('/applications')->with('success', 'Заявка отправлена');
    // }
    
    public function review(Request $req, $id) {
        $app = Application::where('id', $id)->where('user_id', Auth::id())->first();
        if($app) {
            $app->update(['review' => $req->review]);
        }
        return back();
    }
}