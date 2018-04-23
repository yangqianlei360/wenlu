<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 18-4-23
 * Time: 下午3:31
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackupController extends Controller
{
    // 备份界面
    public function index()
    {
        return view('admin.backup.index');
    }

    # 保存系统设置-写入了config/backup.php
    public function save(Request $request)
    {
        foreach ($request->input() as $key=>$value){
            $array[$key]=$value;
        }
        $config_arr = var_export($array,true);
        $config_txt = "<?php" . PHP_EOL . PHP_EOL . "return " . $config_arr. ";";
        file_put_contents(config_path('backup.php'), $config_txt);
        exec("php artisan config:cache",$out);
        if($out){
            return jump('success', '备份配置修改成功', route('admin.backup'));
        }
    }
}