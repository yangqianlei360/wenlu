<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    // 系统设置界面
    public function index()
    {
        return view('admin.system.index');
    }

    # 保存系统设置-写入了config/config.php
    public function save(Request $request)
    {
        foreach ($request->input() as $key=>$value){
            $array[$key]=$value;
        }
        $config_arr = var_export($array,true);
        $config_txt = "<?php" . PHP_EOL . PHP_EOL . "return " . $config_arr. ";";
        file_put_contents(config_path('config.php'), $config_txt);
        exec("php artisan config:cache",$out);
        if($out){
            return jump('success', '系统配置修改成功', route('admin.system'));
        }

    }
}