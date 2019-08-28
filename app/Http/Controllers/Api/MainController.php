<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function users(){

        $users = User::all();

        return response()->json($users);

    }

}
