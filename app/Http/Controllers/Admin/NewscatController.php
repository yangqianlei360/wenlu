<?php

namespace App\Http\Controllers\Admin;

use App\Newscat;
use App\Repositories\NewscatRespostory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewscatController extends Controller
{
    public function __construct(NewscatRespostory $respo)
    {
        $this->respo = $respo;
    }

    //新闻分类界面
    public function index()
    {
        $farthercat = $this->respo->getFarthercat();

        return view('admin.newscat.list', compact('farthercat'));
    }

    //新闻分类添加界面
    public function add()
    {
        $model = null;
        $farthercat = $this->respo->getFarthercat();

        return view('admin.newscat.show', compact('farthercat', 'model'));
    }

    //新闻分类保存
    public function save(Request $request)
    {
        $this->respo->save($request, 0);

        return jump('success', '新闻分类添加成功', route('admin.newscat.add'));
    }

    //新闻分类修改界面
    public function show($id)
    {
        $farthercat = $this->respo->getFarthercat();
        $model = Newscat::findorFail($id);

        return view('admin.newscat.show', compact('farthercat', 'model'));
    }

    #新闻分类更新操作
    public function update(Request $request, $id)
    {
        $this->respo->save($request, $id);

        return jump('success', '新闻分类更新成功', route('admin.newscat.show', ['id' => $id]));
    }

    #新闻分类删除操作
    public function delete($id)
    {
        $this->respo->delete($id);

        return ['status' => true];
    }

    #显示隐藏操作
    public function display(Request $request, $id)
    {
        $this->respo->display($id, $request->status);

        return ['status' => true];
    }
}