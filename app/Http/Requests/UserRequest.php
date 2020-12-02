<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username'=>'required',
            'fullname'=>'required',
            'password'=>'required',
            'repassword'=>'required|same:password',
            'role'=>'not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Bạn phải nhập username',
            'fullname.required'=>'Bạn phải nhập fullname',
            'password.required'=>'Bạn phải nhập mật khẩu',
            'repassword.required'=>'Bạn phải nhập lại mật khẩu',
            'repassword.same'=>'Mật khẩu bạn nhập laị chưa chính xác',
            'role.not_in'=>'Bạn phải chọn chức vụ'
        ];
    }
}
