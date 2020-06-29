<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function index()
    {
        $rows =User::paginate(5);
        return view('dashboard.users.index',compact('rows'));
    }

    public function create()
    {
           return view('dashboard.users.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required',
            // 'image'=> 'image',
        ]);

        $requestArray = $request->all();
        $requestArray['password'] = bcrypt($requestArray['password']);
        User::create($requestArray);
        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        $rows = User::findOrfail($id);
        return view('dashboard.users.edit',compact('rows'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> ['required', Rule::unique('users')->ignore($user->id),],
            // 'password'=> 'required',
            // 'image'=> 'image',
        ]);
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ''){
            $requestArray['password'] = bcrypt($requestArray['password']);
          }else{
              unset($requestArray['password']);
          }
          $user->update(($requestArray));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
