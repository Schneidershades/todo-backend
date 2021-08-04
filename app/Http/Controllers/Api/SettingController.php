<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function store(Request $request)
    {
        $mailerLite = Setting::where('key', 'mailerliteKey')->first();

        if($mailerLite == null){
            $mailerLite = new Setting;
            $mailerLite->key = 'mailerliteKey';
            $mailerLite->value = $request->value;
        }else{
            $mailerLite->value = $request->value;
        }

        $mailerLite->save();
        
        return $mailerLite;
    }
}
