<?php

namespace App\Http\Controllers;
use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function getAllCandidates() {
        return Candidate::all();
    }

    public function index () {
        return view('index');
    }
}
