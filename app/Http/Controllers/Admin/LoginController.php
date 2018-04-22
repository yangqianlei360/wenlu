<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // 登录界面
    public function index()
    {
        return view('admin.login');
    }

    // 登录动作
    public function login(Request $request)
    {
        $name = $request->name;
        $password = $request->password;

        if (empty($name) || empty($password)) {
            return jump('error', '用户名密码不能为空', route('admin.login'));
        }

        if (! Auth::guard('admin')->attempt(['name' => $name, 'password' => $password])) {
            return jump('error', '用户名密码不匹配', route('admin.login'));
        }

        return redirect('/admin/home');
    }
}
