<?php

namespace App\Models;

use App\Models\Field;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public static $states = [
        'active',
        'unsubscribed',
        'junk',
        'bounced',
        'unconfirmed',
    ];

    public static $rules = [
        'name' => 'required',
        'email_address' => 'required|email:rfc,dns',
        'state' => 'required|in:0,1,2,3,4',
        'fields' => 'sometimes',
    ];

    public $fillable = [
        'name',
        'email_address',
        'state',
        'subscriber_id',
    ];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
