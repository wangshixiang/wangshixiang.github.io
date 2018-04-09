低于1.19.2版本的wget存在漏洞，升级wget版本可以解决，代码如下

```shell
wget http://ftp.gnu.org/gnu/wget/wget-1.19.4.tar.gz
tar -zxvf wget-1.19.4.tar.gz
cd wget-1.19.4
./configure --prefix=/usr --sysconfdir=/etc --with-ssl=openssl
make && make install
```

