<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Code;

class CandidateController extends Controller
{
    public function getAllCandidates() {
        return Candidate::all();
    }

    public function index () {
        return view('ticket');
    }

    public function amount() {
        return ['amount' => Code::where('is_used', '=', 1)->count()];
    }
}
