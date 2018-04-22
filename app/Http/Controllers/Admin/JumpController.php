<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 18-4-21
 * Time: 下午11:33
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class JumpController extends Controller
{
    public function index()
    {
        return view('admin.jump.index');
    }
}