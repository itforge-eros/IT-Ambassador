<?php

namespace App\Http\Controllers;
use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function getAllCandidate() {
        return Candidate::all();
    }
}
