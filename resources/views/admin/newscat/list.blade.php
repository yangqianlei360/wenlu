@extends('admin.layouts.app')

@section('content')
    <div class="page-content-wrap">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal addBtn hidden-xs" data-url="{{route('admin.newscat.add')}}"><i class="layui-icon">&#xe654;</i></button>
                    <button class="layui-btn layui-btn-small layui-btn-warm listOrderBtn hidden-xs" data-url="{{route('admin.newscat.add')}}"><i class="iconfont">&#xe656;</i></button>
                </div>

            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-skin="line">
                <colgroup>
                    <col width="50">
                    <col class="hidden-xs" width="50">
                    <col class="hidden-xs" width="100">
                    <col class="hidden-xs" width="100">
                    <col>
                    <col width="80">
                    <col width="130">
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
                    <th class="hidden-xs">ID</th>
                    <th class="hidden-xs">排序</th>

                    <th>英文名称</th>
                    <th>中文名称</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($farthercat as $farthercat)
                <tr id='node-{{$farthercat->id}}' class="parent collapsed">
                    <td><input type="checkbox" name="" lay-skin="primary" data-id="{{$farthercat->id}}"></td>
                    <td class="hidden-xs">{{$farthercat->id}}</td>
                    <td class="hidden-xs"><input type="text" name="title" autocomplete="off" class="layui-input" value="0" data-id="{{$farthercat->id}}"></td>
                    <td class="hidden-xs">{{$farthercat->enname}}</td>
                    <td>{{$farthercat->name}}
                        @if ($farthercat->childNewscat->count())
                            <a class="layui-btn layui-btn-mini layui-btn-normal showSubBtn" data-id='{{$farthercat->id}}'>+</a>
                        @endif
                    </td>

                    <td>
                        @if($farthercat->display)
                            <button class="layui-btn layui-btn-mini layui-btn-normal table-list-status display-btn" data-id="{{$farthercat->fid}}" data-url="{{route('admin.newscat.display',['id'=>$farthercat->id,'status'=>!(bool)($farthercat->display)])}}">显示 </button>
                        @else
                                    <button class="layui-btn layui-btn-mini layui-btn-danger table-list-status display-btn" data-id="{{$farthercat->fid}}" data-url="{{route('admin.newscat.display',['id'=>$farthercat->id,'status'=>!(bool)($farthercat->display)])}}">隐藏 </button>
                        @endif
                    </td>
                    <td>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-mini layui-btn-normal  edit-btn" data-id="{{$farthercat->id}}" data-url="{{route('admin.newscat.show',['id'=>$farthercat->id])}}"><i class="layui-icon">&#xe642;</i></button>
                            <button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="{{$farthercat->id}}" data-url="{{route('admin.newscat.delete',['id'=>$farthercat->id])}}"><i class="layui-icon">&#xe640;</i></button>
                        </div>
                    </td>
                </tr>
                @foreach($farthercat->childNewscat as $sub_cat)
                <tr id='node-{{$sub_cat->id}}' class="child-node-{{$sub_cat->fid}} parent collapsed" style="display:none ;" parentid="{{$sub_cat->fid}}">
                    <td><input type="checkbox" name="" lay-skin="primary" data-id="{{$sub_cat->id}}"></td>
                    <td class="hidden-xs">{{$sub_cat->id}}</td>
                    <td class="hidden-xs"><input type="text" name="title" autocomplete="off" class="layui-input" value="0" data-id="{{$sub_cat->id}}"></td>
                    <td class="hidden-xs">{{$sub_cat->enname}}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─{{$sub_cat->name}}
                    </td>
                    <td>
                        @if($sub_cat->display)
                            <button class="layui-btn layui-btn-mini layui-btn-normal table-list-status display-btn" data-id="{{$sub_cat->fid}}" data-url="{{route('admin.newscat.display',['id'=>$sub_cat->id,'status'=>!(bool)($sub_cat->display)])}}">显示 </button>
                        @else
                            <button class="layui-btn layui-btn-mini layui-btn-danger table-list-status display-btn" data-id="{{$sub_cat->fid}}" data-url="{{route('admin.newscat.display',['id'=>$sub_cat->id,'status'=>!(bool)($sub_cat->display)])}}">隐藏 </button>
                        @endif

                        </td>
                    <td>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-mini layui-btn-normal  edit-btn" data-id="{{$sub_cat->fid}}" data-url="{{route('admin.newscat.show',['id'=>$sub_cat->id])}}"><i class="layui-icon">&#xe642;</i></button>
                            <button class="layui-btn layui-btn-mini layui-btn-danger del-btn" data-id="{{$sub_cat->fid}}" data-url="{{route('admin.newscat.delete',['id'=>$sub_cat->id])}}"><i class="layui-icon">&#xe640;</i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('js')
    <script>
        layui.use(['jquery'], function() {
            var $=layui.jquery;
            //修改状态
            $('#table-list').on('click', '.table-list-status', function() {
                var That = $(this);
                var status = That.attr('data-status');
                var id = That.parent().attr('data-id');
                if(status == 1) {
                    That.removeClass('layui-btn-normal').addClass('layui-btn-warm').html('隐藏').attr('data-status', 2);
                } else if(status == 2) {
                    That.removeClass('layui-btn-warm').addClass('layui-btn-normal').html('显示').attr('data-status', 1);

                }
            })
            //栏目展示隐藏
            $('.showSubBtn').on('click', function() {
                var _this = $(this);
                var id = _this.attr('data-id');
                var parent = _this.parents('.parent');
                var child = $('.child-node-' + id);
                var childAll = $('tr[parentid=' + id + ']');
                if(parent.hasClass('collapsed')) {
                    _this.html('-');
                    parent.addClass('expanded').removeClass('collapsed');
                    child.css('display', '');
                } else {
                    _this.html('+');
                    parent.addClass('collapsed').removeClass('expanded');
                    child.css('display', 'none');
                    childAll.addClass('collapsed').removeClass('expanded').css('display', 'none');
                    childAll.find('.showSubBtn').html('+');
                }

            })
        });
    </script>

@stop