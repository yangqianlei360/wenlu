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

    });
});
