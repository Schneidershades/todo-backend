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
        $pin = rand(1000, 9999);

        $searchPin = Pin::where('pin', $pin)->first();

        if($searchPin){
            $pin = rand(1000, 9999);
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
