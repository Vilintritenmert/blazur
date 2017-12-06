<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function update(UserUpdateRequest $request)
    {
        $availible_fields = array_only($request->all(), ['name', 'email']);
        $user = User::findOrFail($request->id);
        $user->fill($availible_fields);
        $user->save();

        return redirect()->back()->with('message', 'Success Saved');
    }

    public function list()
    {
        $users = User::get();
        
        return View('user.list', compact('users'));
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        $actions = $user->actions;

        return View('user.view', compact('user','actions'));
    }

    public function delete($id)
    {
        if (request()->user()->id === (int)$id) {
            return redirect()->back()->withErorr('You can`t delete self');
        }

        User::destroy($id);

        return redirect()->back()->with('message', 'Success Deleted');
    }
}
