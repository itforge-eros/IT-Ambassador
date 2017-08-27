<?php

namespace App\Http\Controllers;
use App\Code;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function genCode(Request $request)
    {
        $numbers =  $request->numbers;
        $result = array();
        foreach (range(1, $numbers) as $i) {
            $code = new Code;
            $generated = strtoupper(str_random(5));
            array_push($result, $generated);
            $code->code = $generated;
            $code->save();
        }
        return view('home')->with('codes', $result);
    }
}
