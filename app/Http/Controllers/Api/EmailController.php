<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\emailMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends BaseController
{
    public function send()
    {
        Mail::to('studentoussama8@gmail.com')->send(new emailMailable());
        return $this->sendResponse("Email Sent Successfully");
    }
}
