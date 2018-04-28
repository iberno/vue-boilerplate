<?php

namespace App\Http\Controllers\Auth;


use App\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\{RegisterFormRequest, LoginFormRequest};
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    /**
    * Create a new AuthController instance.
    *
    * @return void
    */
   public function __construct(JWTAuth $auth)
   {
       $this->auth = $auth;
   }
   /**
    * Login to attempt the system area
    *
    * @param LoginFormRequest $request
    * @return void
    */
   public function login(LoginFormRequest $request)
   {
        try {
            if (!$token = $this->auth->attempt($request->only('email', 'password'))) {
                return response()->json([
                    'error' => [
                        'root' => 'N&atilde;o e possivel logar com as informa&ccedil;&otilde;es fornecidas!'
                    ]
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => [
                    'root' => 'Failed!'
                ]
                ], $e->getStatusCode());
        }
        return response()->json([
            'data' => $request->user(),
            'meta' => [
                'token' => $token
            ]
        ], 200);
   }
   /**
    * Register Users
    *
    * @param RegisterFormRequest $request
    * @return void
    */
   public function register(RegisterFormRequest $request)
   {
       $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        $token = $this->auth->attempt($request->only('email', 'password'));

        return response()->json([
            'data' => $user,
            'meta' => [
                'token' => $token
            ]
        ], 200);    
   }
   /**
    * System Logout
    *
    * @return void
    */
   public function logout()
   {
       $this->auth->invalidate($this->auth->getToken());

       return response(null, 200);
   }
   /**
    * Undocumented function
    *
    * @param Request $request
    * @return void
    */
   public function user(Request $request)
   {
       return response()->json([
           'data' => $request->user()
       ]);
   }
}
