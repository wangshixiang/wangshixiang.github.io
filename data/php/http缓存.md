# http 缓存

[TOC]

## php设置http缓存

### 不允许缓存

```php
function noCache(){
    header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); // HTTP/1.1 这个方法是在http/1.1中新增的，只作用于1.1，还要写以下两个来兼容1.0
  	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past 过期时间，携程一个过去的时间可以强制使用服务器上的文件，他的作用是，告诉浏览器你的缓存已经过期
  	header("Pragma: no-cache"); // Date in the past 规定处理方式，告诉浏览器你不要缓存我
}

```

### 设置缓存时间

> gmdate() 函数格式化 GMT/UTC 日期和时间，并返回格式化的日期字符串。GMT是世界时，格林尼治时间
>
> 参数r表示 
>
> - r - RFC 2822 格式的日期（例如 Fri, 12 Apr 2013 12:01:05 +0200）

```php
//在$_GET 中标明 controller和action的单一入口框架中不能使用，缓存是根据uri来区分的
function setHttpCache($expired=60){
    if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])){
        if(
            (strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])+$expired) >= time()
        ){
            header('HTTP/1.1 304');exit();
        }
    }
    header("Cache-Control: public");//设置http/1.1缓存方式，public表示允许所有缓存，		private表示只允许浏览器缓存
    header("Pragma: cache");//设置缓存处理方式
    $ExpStr = "Expires: ".gmdate("r", time() + $expired);
    header($ExpStr);
    header('Last-Modified: '.gmdate('r'));
}
  
```



## 静态文件设置http缓存（apache）