<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserValidation;
use App\Http\Requests\User\LoginUserValidation;
use App\Services\UserServ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    public $userService;
    public function __construct(UserServ $userService)
    {
        $this->userService=$userService;
    }
    public function register(CreateUserValidation $createUserValidator)
    {
        if(!empty($createUserValidator->getErrors()))
        {
            return response()->json($createUserValidator->getErrors(),406);
        }
        $user=$this->userService->createUser($createUserValidator->request()->all());
        $message['user']=$user;
        $message['token']= $user->createToken('MyApp')->plainTextToken;

        return $this->sendResponse($message);
    }
    public function login(LoginUserValidation $loginUserValidation)
    {
        if(!empty($loginUserValidation->getErrors()))
        {
            return response()->json($loginUserValidation->getErrors(),406);
        }
        $request = $loginUserValidation->request();
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user= Auth::user();
            $success['name']=$user->name;
            $success['token']= $user->createToken('MyApp')->plainTextToken;
            return $this->sendResponse($success);
        }else
        {
            return $this->sendResponse('Unauthorized','fail',401);
        }
    }

}
