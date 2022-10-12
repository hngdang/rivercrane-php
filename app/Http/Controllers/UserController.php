<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\RequestAddUser;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'confirm' => 'same:password',
            'group' => 'required',
        ],
        [
            'name.required' => 'Vui lòng nhập tên người sử dụng',
            'name.min' => 'Tên phải lớn hơn 5 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được đăng ký.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải hơn 5 ký tự.',
            'password.regex' => 'Mật khẩu không bảo mật',
            'confirm.same' => 'Mật khẩu và xác nhận mật khẩu không chính xác.',
            'group.required' => 'Vui lòng chọn nhóm',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->group_role = $request->input('group');
            if($request->input('status') == 1) {
                $user->is_active = $request->input('status');
            }
            else{
                $user->is_active = -1;
            }
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'Thành công!',
            ]);
        }
    }

    public function edit($id){
        $user = User::find($id);

        if($user){
            return response()->json([
                'status' => 200,
                'user' => $user,
            ]);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'Không có dữ liệu',
            ]);
        }
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:5|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'confirm' => 'same:password',
            'group' => 'required',
        ],
        [
            'name.required' => 'Vui lòng nhập tên người sử dụng',
            'name.min' => 'Tên phải lớn hơn 5 ký tự',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải hơn 5 ký tự.',
            'password.regex' => 'Mật khẩu không bảo mật',
            'confirm.same' => 'Mật khẩu và xác nhận mật khẩu không chính xác.',
            'group.required' => 'Vui lòng chọn nhóm',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $user = User::find($id);
            if($user){
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->group_role = $request->input('group');
                if($request->input('status') == 1) {
                    $user->is_active = $request->input('status');
                }
                else{
                    $user->is_active = -1;
                }
                $user->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Thành công!',
                ]);
            }
            else{
                return response()->json([
                    'status' => 400,
                    'message' => 'Không có dữ liệu',
                ]);
            }

        }
    }

    public function delete($id){
        $user = User::find($id);
        $user->is_delete = -1;
        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'Thành công!',
        ]);
    }

    public function block($id){
        $user = User::find($id);
        if($user->is_active == 1){
            $user->is_active = -1;
        }
        else{
            $user->is_active = 1;
        }
        $user->save();
        return response()->json([
            'status' => 200,
            'message' => 'Thành công!',
        ]);
    }

}