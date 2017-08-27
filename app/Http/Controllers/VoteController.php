<?php

namespace App\Http\Controllers;
use App\Code;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request) {
        return Code::where('code', '=', 'RE4T')->get();
    }
}
