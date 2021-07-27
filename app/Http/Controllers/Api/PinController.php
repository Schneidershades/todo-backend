<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pin;

class PinController extends Controller
{
    public function index()
    {
        return Pin::all();
    }

    public function store()
    {
        $pin = $this->generate();

        $newPin =  new Pin;
        $newPin->pin = $pin;
        $newPin->save();

        return Pin::latest()->get();
    }

    public function generate(){

        $min = 1000;
        $max = 9999;
        $nonSeq = 190;

        $totalNumbers = $max - $min;

        $total = $totalNumbers - $nonSeq;

        $pin = rand($min, $max);

        $searchPin = Pin::where('pin', $pin)->get();

        $countGeneratedPin = $searchPin->count();

        $multiplyCount = $total * $countGeneratedPin;

        $divideOverallCounts = 0;

        if ($multiplyCount > 0) {

            $allPins = Pin::all();

            $countAllPins = $allPins->count();

            $divideOverallCounts = $countAllPins / $multiplyCount;
        }

        if($searchPin && $divideOverallCounts < 1){
            $pin = rand($min, $max);
        }

        if($this->validatePin($pin) == false){
            $pin = $this->generate();
        }

        return $pin;
    }

    private function validatePin ($pin) {
        $parts = str_split($pin);

        $previousPart = null;

        foreach ($parts as $part) {
            if (!$previousPart) {
                $previousPart = $part;
                continue;
            }

            if ($part == $previousPart) {
                return false;
            }

            if ($part == $previousPart + 1) {
                return false;
            }

            $previousPart = $part;
        }

        return true;
    }
}
