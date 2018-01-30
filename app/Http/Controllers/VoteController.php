<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Code;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request) {
        $test_codes = ['55555', '666666', '7777777'];
        if(env('TEST', false) && in_array($request->input('code'), $test_codes)) {
            $this->increase($request);
            return ['status' => '200', 'message' => 'Voted.'];
        }
        $code = Code::where('code', $request->input('code'))->first();
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
        $amount = $this->getIncrementScore($request->input('code'));
        $selected = $request->input('selected');
        Candidate::find($selected['id'])->increment('score', $amount);
    }

    private function getIncrementScore($code) {
        switch (strlen($code)) {
            case 5: return 1;
            case 6: return 5;
            case 7: return 10;
            default: return 0;
        }
    }
}
