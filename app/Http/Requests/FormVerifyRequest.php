<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormVerifyRequest extends FormRequest
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
            //@accepted 值只能为1 yes on true 同意服务协议时使用 改变状态时使用
            'username'=>'required|unique:users|regex:/^\w{6,12}$/',
            'password'=>'required|regex:/^\S{8,15}$/',
            'phone'=>'required|regex:/^1[345678]\d{9}$/',
            'email'=>'email',
            'code'=>'required|regex:/^[0-9]{6}$/'
        ];
    }


    public function messages()
    {
        return [
            'username.required'=>"用户名不能为空",
            'username.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号码格式不正确',
            'code.required'=>'邮编不能为空',
            'code.regex'=>'邮编长度不对'
        ];
    }
}
