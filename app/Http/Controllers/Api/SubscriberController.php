<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MailerLiteApi\MailerLite;

class SubscriberController extends Controller
{

    public function index ()
    {
        $groupsApi = (new MailerLite('354d0ef2718fe99d8af8f03212695d32'))->groups();

        $allGroups = $groupsApi->get()->first();

        if($allGroups == null){
            $newGroup = $groupsApi->create(['name' => 'Gifts']);
        }
        
        $allGroups = $groupsApi->get()->first();
    
        $subscribers = $groupsApi->getSubscribers($allGroups->id);
    
        $subscribers = $groupsApi->getSubscribers($allGroups->id, 'unsubscribed');

        dd($subscribers); 
    }

    public function store (Request $request)
    {
        $groupsApi = (new MailerLite("354d0ef2718fe99d8af8f03212695d32"))->groups();

        $allGroups = $groupsApi->get()->first();

        $subscriber = [
            'email' => $request->email,
            'fields' => [
                'name' => $request->name,
                'country' => $request->country
            ]
        ];

        $response = $groupsApi->addSubscriber($allGroups->id, $subscriber); 

        return($response);
    }

    public function destory ($id)
    {
        $subscribers = $groupsApi->getSubscribers($id, 'unsubscribed');
    }

}
