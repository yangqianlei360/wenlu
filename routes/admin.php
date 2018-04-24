<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\LoginController@index')->name('login');
    Route::post('/login', 'Admin\LoginController@login');
    Route::get('/jump','Admin\JumpController@index')->name('admin.jump'); #跳转页面

    Route::group(['middleware'=>'auth:admin'],function (){


        #首页
        Route::get('/home','Admin\HomeController@index');

        # 管理员信息配置
        Route::get('/info','Admin\InfoController@index')->name('admin.info');
        Route::post('/info','Admin\InfoController@saveinfo')->name('admin.saveinfo');
        Route::post('/changepassword','Admin\InfoController@changepassword')->name('admin.changepassword');
        #系统配置
        Route::get('/system','Admin\SystemController@index')->name('admin.system');
        Route::post('/system','Admin\SystemController@save')->name('admin.system.save');
        # 数据库备份配置
        Route::get('/backup','Admin\BackupController@index')->name('admin.backup');
        Route::post('/savebackup','Admin\BackupController@save')->name('admin.backup.save');
        #新闻分类
        Route::get('/newscat/add','Admin\NewscatController@add')->name('admin.newscat.add'); #添加
        Route::post('/newscat','Admin\NewscatController@save')->name('admin.newscat.save'); #保存
        Route::get('/newscat','Admin\NewscatController@index')->name('admin.newscat.list'); #首页
        Route::get('/newscat-show/{id}','Admin\NewscatController@show')->name('admin.newscat.show');#详情
        Route::post('/newscat-update/{id}','Admin\NewscatController@update')->name('admin.newscat.update');#更新
        Route::post('/newscat-delete/{id}','Admin\NewscatController@delete')->name('admin.newscat.delete');#删除
        Route::post('/newscat-display/{id}','Admin\NewscatController@display')->name('admin.newscat.display');#隐藏显示


    });
});
