- 安装

```
yum install nginx
```



- qidong

```
service nginx start
```

- reload

```
service nginx reload
```

- 配置

```c
location / {
    index index.php;
    try_files $uri index.php;
}
location ~ \.php$ {
    include /path/to/fastcgi_conf;
    fastcgi_pass 127.0.0.1:9000;
}
```



