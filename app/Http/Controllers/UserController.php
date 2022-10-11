<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\RequestAddUser;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::where('is_delete', '=', 0)->orderByDesc('id');
        $groups = Group::where([
            ['is_active', '=', 1],
            ['is_delete', '=', 0]
        ])->get();

        if($request->name){
            $users->where('name','like','%'.$request->name.'%');
        }
        if($request->email){
            $users->where('email','like','%'.$request->email.'%');
        }
        if($request->group){
            $users->where('group_role','=',$request->group);
        }
        if($request->status){
            $users->where('is_active','=',$request->status);
        }

        $users = $users->paginate(10);

        $viewData = [
            'users' => $users,
            'groups' => $groups
        ];

        return view('users.index', $viewData);
    }

    public function store(Request $request){
        if($request->password == $request->confirm){
            $user = new User();
            $user->name = $request->userName;
            $user->email = $request->userEmail;
            $user->password = bcrypt($request->password);
            $user->group_role = $request->group;
            $user->is_active = $request->status;
            $user->save();
            return redirect()->back();
        }
    }
}