<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
  public function login(Request $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

      /**
       * @var User $user
       */
      $user = Auth::user();
      $success['token'] = $user->createToken($user->name)->accessToken;
      $success['name'] = $user->name;

      return $this->sendResponse($success, 'User login successfully.');
    }

    return $this->sendError('Unauthorized.', ['error' => 'Unauthorized']);
  }
}
