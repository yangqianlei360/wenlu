<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 18-4-21
 * Time: 上午12:54
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.home.index');
        
    }
}