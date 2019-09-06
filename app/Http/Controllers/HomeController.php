<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Code;
use App\Config;
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
        $enable = Config::where('key', 'open')->first();
        $boy = Candidate::where('title', 'นาย')->orderBy('score', 'desc')->get();
        $girl = Candidate::where('title', 'นางสาว')->orderBy('score', 'desc')->get();
        return view('home')->with(['open' => $enable, 'boys' => $boy, 'girls' => $girl]);
    }

    public function genCode(Request $request)
    {
        $numbers =  $request->numbers;
        $enable = Config::where('key', 'open')->first();
        $boy = Candidate::where('title', 'นาย')->orderBy('score', 'desc')->get();
        $girl = Candidate::where('title', 'นางสาว')->orderBy('score', 'desc')->get();
        $result = array();
        foreach (range(1, $numbers) as $i) {
            $code = new Code;
            $generated = strtoupper(str_random(6));
            array_push($result, $generated);
            $code->code = $generated;
            $code->save();
        }
        return view('home')->with(['codes' => $result, 'open' => $enable, 'boys' => $boy, 'girls' => $girl]);
    }

    public function setClose(Request $request)
    {
        $open =  $request->open;
        $enable = Config::where('key', 'open')->first();
        $enable->value = $open;
        $enable->save();
        return redirect('/home');
    }
}
