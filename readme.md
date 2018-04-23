 
## 遇到的一些配置

 ### 网站维护
 	php artisan down 进入维护模式
 	php artisan down --message="Upgrading Database" --retry=60
 	php artisan up 退出维护模式
 
 ### 配置设置
 php artisan config:cache
 
 
 ###创建定时任务
 
	先在/var/www/app/Console/Kernel.php schedule函数下 新建立一个任务
 	$schedule->command('backup:run --only-db')->everyMinute();
   	然后在终端下输入
  	echo '* * * * * php /var/www/artisan schedule:run >> /dev/null 2>&1' >cron.txt
 	crontab cron.txt
 	
 ### 编辑掉定时任务
 	编辑/var/spool/cron/crontabs 可以删除对应的任务