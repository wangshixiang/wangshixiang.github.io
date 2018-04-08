

   1. 安装gcc

```shell

yum install gcc

```


2.  安装其他依赖

```shell
    yum -y install openssl
    yum -y install openssl-devel
    yum -y install curl
    yum -y install curl-devel
    yum -y install libjpeg
    yum -y install libjpeg-devel
    yum -y install libpng
    yum -y install libpng-devel
    yum -y install freetype
    yum -y install freetype-devel
    yum -y install pcre
    yum -y install pcre-devel
    yum -y install libxslt
    yum -y install libxslt-devel
    yum -y install bzip2
    yum -y install bzip2-devel
    yum -y install libxml2
    yum -y install libxml2-devel
       
```

3. 下载php源码，在php官网

        wget url

4. 解压

```shell
     tar -xvzf php-7.0.5.tar.gz
```

5. configure

```shell
     ./configure --prefix=/usr/local/php --with-curl --with-freetype-dir --with-gd --with-gettext --with-iconv-dir --with-kerberos --with-libdir=lib64 --with-libxml-dir --with-mysqli --with-openssl --with-pcre-regex --with-pdo-mysql --with-pdo-sqlite --with-pear --with-png-dir --with-jpeg-dir --with-xmlrpc --with-xsl --with-zlib --with-bz2 --with-mhash --enable-fpm --enable-bcmath --enable-libxml --enable-inline-optimization --enable-gd-native-ttf --enable-mbregex --enable-mbstring --enable-opcache --enable-pcntl --enable-shmop --enable-soap --enable-sockets --enable-sysvsem --enable-sysvshm --enable-xml --enable-zip
```

6. 编译
```  
     make
```
7. 安装
```
     make install
```

8. 添加环境变量（可选，使php指令可以全局访问）

修改/etc/profile文件，在最后添加两行

```
PATH=$PATH:/usr/local/php/bin:/usr/local/php/sbin
export PATH
```

执行 

```
source /etc/profile
```

测试

```
php -v
```

9. 设置php-fpm配置文件

   将/usr/local/php/etc下的以.default结尾的复制一份，去掉default后缀

   将/usr/local/php/etc/php-fpm.d/下的文件以同样的方式处理