<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $user, $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $lsUser = User::all();

        return view('user.list')->with(['lsUser' => $lsUser]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $allRole = Role::all();
        return view('user.edit')->with(['user' => $user,'allRole' => $allRole]);
    }

    public function update(UserRequest $request, $id)
    {
        $this->user->updateUser($request, $id);

        $request->session()->flash('success', 'User was updated!');
        return redirect()->route("user_management.index");
    }

    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->id);

            if ($user != null) {
                $user->delete();
                return response()->json(['status' => 1, 'message' => 'Deleted']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Does not exit']);
            }
        } catch (\Exception $e) {
            $e->getMessage();
            return response()->json(['status' => 0, 'message' => 'Error']);
        }
    }
}
