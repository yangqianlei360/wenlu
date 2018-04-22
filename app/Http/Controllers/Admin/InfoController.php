<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 18-4-21
 * Time: 下午7:15
 */

namespace App\Http\Controllers\Admin;


use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InfoRespostory;

class InfoController extends Controller
{
    public function __construct(InfoRespostory $respo)
    {
        $this->respo = $respo;
    }

    /**
     *管理员信息页面界面
     *
     * @return view
     */
    public function index()
    {
        return view('admin.info.index');
    }

    /**
     * 更新管理员信息
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveinfo(Request $request)
    {
        $this->respo->update($request);

        return jump('success', '管理员配置修改成功', route('admin.info'));
    }

    /**
     * 更新密码
     */
    public function changepassword(Request $request)
    {
       return $this->respo->changpass($request);

    }
}