<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAddUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên người sử dụng',
            'name.min' => 'Tên phải lớn hơn 5 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được đăng ký',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải hơn 5 ký tự'
        ];
    }
}
