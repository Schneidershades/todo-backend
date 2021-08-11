<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public static $rules = [
        'title' => 'required',
        'type' => 'required',
        'subscriber_id' => 'required',
    ];

    public $fillable = [
        'title',
        'type',
        'subscriber_id',
    ];
}
