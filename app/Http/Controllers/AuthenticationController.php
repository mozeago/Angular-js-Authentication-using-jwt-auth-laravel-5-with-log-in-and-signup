<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['authenticate', 'register', 'getLastInsertedMaximumUserId']]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
//        $details = User::where('email', $request->input('email'))->with('userDetail', 'userContact')->first();
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Wrong Login Credentials'], 403);
            }
        } catch (JWTException $ex) {
            return response()->json(['error' => 'Login Failed']);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user not found'], 404);
            } else {
            }

        } catch (JWTException$e) {

            return response()->json(['Kindly login'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['Sorry Invalid login Request'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['Wrong login Request'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    /**
     * registers new user
     * @param Request $request
     */
    public function register(Request $request)
    {
        $id = 1000;
        $newUser = $request->all();
        $password = Hash::make($request->input('password'));
        $newUser['password'] = $password;
        if ($this->getLastInsertedMaximumUserId() !== null && $this->getLastInsertedMaximumUserId() >= $id) {
            $userId = $newUser['id'] = $this->getLastInsertedMaximumUserId() + 1;
        } else {
            $newUser['id'] = $id;
        }
        return User::create($newUser);
    }

    public function getLastInsertedMaximumUserId()
    {
        $maximumId = DB::select('SELECT max(`id`) as `id` FROM `user`');
        foreach ($maximumId as $maxId) {
            return $maxId->id;
        }

    }
}
