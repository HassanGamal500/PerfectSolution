<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Register

    public function register(Request $request){

        $validator = validator()->make($request->all(),[

            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|max:11',
            'password' => 'required|confirmed'

        ]);

        if ($validator->fails()) {

            $response = [

                'status' => 0,
                'message' => 'validator error',
                'data' => $validator->errors()

            ];

            return response()->json($response);

        }

        $request->merge(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        $user->save();

        $response = [

            'status' => 1,
            'message' => 'success',
            'data' => [
                'User' => $user
            ]

        ];

        return response()->json($response);

    }

    // Login

    public function login(Request $request)
    {

        $validator = validator()->make($request->all(),[

            'phone' => 'required_without:email|max:11',
            'email' => 'required_without:phone|email',
            'password' => 'required',

        ]);

        if ($validator->fails()) {

            $response = [

                'status' => 0,
                'message' => 'validator error',
                'data' => $validator->errors()

            ];

            return response()->json($response);

        }

        $user = User::where('phone', $request->phone)->orWhere('email', $request->email)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {

                $response = [

                    'status' => 1,
                    'message' => 'your account is correct',
                    'data' => [
                        'User' => $user
                    ]

                ];

                return response()->json($response);

            } else {

                $response = [

                    'status' => 0,
                    'message' => 'your password is not correct, Try Again',

                ];

                return response()->json($response);

            }

        } else {

            $response = [

                'status' => 0,
                'message' => 'your account is not correct',

            ];

            return response()->json($response);

        }

    }

}
