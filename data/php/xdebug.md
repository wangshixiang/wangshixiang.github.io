# xdebug 安装与使用

1. 下载对应版本的php_xdebug.dll;

2. 修改php.ini 添加 

   ```ini
   zend_extention=php_xdebug.dll
   xdebug.remote_enable=1
   ```

   ​

3. 配置phpstorm

   > - 配置php文件路径
   > - 点击xdebug的监听按钮

4. 安装chrome xdebug helper拓展

5. 使用:

   > 1. 开启服务器，访问链接，打开chrome上的debug按钮，刷新
   > 2. phpstorm自动检测到debug配置，点击确认，刷新，成功监听到断点信息