<?php
/**
 * Created by PhpStorm.
 * User: qq
 * Date: 18-4-24
 * Time: 上午11:01
 */

namespace App\Repositories;

use App\Newscat;
use Illuminate\Database\Eloquent\Model;

class NewscatRespostory
{
    # 获取父级分类
    public function getFarthercat()
    {
       return Newscat::where('fid',0)->get();
    }
    

    # 保存文章分类
    public function save($request,$id)
    {
        $newscat= newObject($id,'App\Newscat');
        $newscat->name= $request->name;
        $newscat->enname= $request->enname;
        $newscat->fid= $request->fid;
        $newscat->title= $request->title;
        $newscat->keyword= $request->keyword;
        $newscat->desc= $request->desc;
        $newscat->save();

    }

    #删除文章分类
    public function delete($id)
    {
        return newObject($id,'App\Newscat')->delete();
    }

    #隐藏显示操作
    public function display($id,$status)
    {
        $model = newObject($id,'App\Newscat');
        $model->display=$status;
        $model->save();
    }


}