@extends('admin.layouts.app')
@section('content')
<div class="layui-tab page-content-wrap">
    <div class="layui-tab-content">
        <!--站点配置-->
        <div class="layui-tab-item layui-show">
            @if ($model)
                {!! Form::model($model, ['route' => ['admin.newscat.update', $model->id], 'method' => 'post','class'=>'layui-form','style'=>'width: 90%;padding-top: 20px;']) !!}
            @else
                {!! Form::open(['route' => 'admin.newscat.save', 'method' => 'post','class'=>'layui-form','style'=>'width: 90%;padding-top: 20px;']) !!}
            @endif
                <div class="layui-form-item">
                    <label class="layui-form-label">分类选择：</label>
                    <div class="layui-input-block">
                        <select name="fid">
                            <option value="0">作为父级分类</option>
                            @foreach($farthercat as $cat)
                            <option value="<?=$cat->id?>" {{($model&&$model->fid==$cat->id)?'selected':''}}><?=$cat->name?></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">栏目名称：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="栏目名称" required lay-verify="required" autocomplete="off" class="layui-input" value="{{$model?$model->name:''}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">英文名称：</label>
                    <div class="layui-input-block">
                        <input type="text" name="enname" placeholder="英文名称" required lay-verify="required" autocomplete="off" class="layui-input" value="{{$model?$model->enname:''}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">SEO标题：</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" placeholder="请输入seo标题" autocomplete="off" class="layui-input" value="{{$model?$model->title:''}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">关键字：</label>
                    <div class="layui-input-block">
                        <input type="text" name="keyword" placeholder="请输入seo关键字" autocomplete="off" class="layui-input" value="{{$model?$model->keyword:''}}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">描述：</label>
                    <div class="layui-input-block">
                        <textarea name="desc" placeholder="请输入seo描述" class="layui-textarea">{{$model?$model->desc:''}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-normal" type="submit" lay-submit lay-filter="newscat">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重 置</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
@stop




