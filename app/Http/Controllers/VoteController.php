<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Code;
use App\Config;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request) {
        $input_code = $request->input('code');

        $enable = Config::where('key', 'open')->first();

        if ($enable->value == 'false') {
            return ['status' => '401', 'message' => 'Vote closed.'];
        }

        if(env('TEST', false) && $input_code == '111111') {
            $this->increase($request);
            return ['status' => '200', 'message' => 'Voted.'];
        }
        $code = Code::where('code', $input_code)->first();
        if ($code == null) {
            return ['status' => '404', 'message' => 'Code not found.'];
        }
        if ($code->is_used == 1) {
            return ['status' => '400', 'message' => 'Code has been used.'];
        }
        $code->is_used = true;
        $code->save();
        $this->increase($request);
        return ['status' => '200', 'message' => 'Voted.'];
    }

    private function increase($request) {
        $female = $request->input('female');
        $male = $request->input('male');
        Candidate::find($female['id'])->increment('score');
        Candidate::find($male['id'])->increment('score');
    }
}
