<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);

        return view('users.index', compact('users'));
    }

    public function create(User $model)
    {
        return view('users.create', compact('model'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'password' => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->password)]);

        $user = User::create($request->all());

        return redirect(route('user.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('users.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'email'
        ]);

        $user = User::findOrFail($id);

        $request->merge(['password' => bcrypt($request->password)]);

        $update = $user->update($request->all());

        return redirect(route('user.edit', $id));
    }

    public function destroy($id)
    {
        $record = User::findOrFail($id);

        $record->delete();

        return back();
    }

}
