@extends('admin.layouts.app')
@section('content')
    <div class="layui-tab page-content-wrap">
        <ul class="layui-tab-title">
            <li class="layui-this">数据库备份</li>
        </ul>
        <div class="layui-tab-content">
            <blockquote class="layui-elem-quote layui-quote-nm">
                引入了laravel-backup 插件，设置备份时间，系统会定时备份。<br>
                <b>注意：</b>
                <br>设置备份时间不要太短，最好是每天备份;
                <br>备份路径名称最好写的复杂一些
            </blockquote>
            <div class="layui-tab-item layui-show">
                {!! Form::open(['route' => 'admin.backup.save', 'method' => 'post','class'=>'layui-form','style'=>'width: 90%;padding-top: 20px']) !!}
                    <div class="layui-form-item">
                        <label class="layui-form-label">备份时间：</label>
                        <div class="layui-input-block">
                                <select name="time">
                                    <option value=""></option>
                                    <option value="1" {{Config::get('backup.time')=='daily()'?'selected':''}}>每1天</option>
                                    <option value="2" {{Config::get('backup.time')=='daily(2)'?'selected':''}}>每2天</option>
                                    <option value="3" {{Config::get('backup.time')=='daily(3)'?'selected':''}}>每3天</option>
                                    <option value="4" {{Config::get('backup.time')=='daily(5)'?'selected':''}}>每5天</option>
                                </select>

                        </div>

                    </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">备份路径：</label>
                        <div class="layui-input-block">
                            <input type="text" name="patch" required lay-verify="required" autocomplete="off" class="layui-input" value="{{Config::get('backup.patch')}}">
                        </div>
                    </div>

                   <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button type="submit" class="layui-btn layui-btn-normal" lay-submit lay-filter="backupinfo">立即提交
                            </button>
                        </div>
                    </div>

            </div>

        {!! Form::close() !!}

        </div>
    </div>
@stop