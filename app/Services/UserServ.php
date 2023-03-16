<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request; 

class UserServ
{
    public function createUser($data)
    {
        $data['password']=Hash::make($data['password']);    
        return User::create($data);
    }
}