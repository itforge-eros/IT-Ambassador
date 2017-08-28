<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Code;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request) {
        $input_code = $request->input('code');
        $code = Code::where('code', $input_code)->first();
        if ($code == null) {
            return ['status' => '404', 'message' => 'Code not found.'];
        }
        if ($code->is_used == 1) {
            return ['status' => '400', 'message' => 'Code has been used.'];
        }
        $code->is_used = true;
        $code->save();
        $female = $request->input('female');
        $male = $request->input('male');
        Candidate::find($female['id'])->increment('score');
        Candidate::find($male['id'])->increment('score');
        return ['status' => 200, 'message' => 'Voted.'];
    }
}
