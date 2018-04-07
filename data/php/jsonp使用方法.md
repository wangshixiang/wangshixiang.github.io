# jsonp在服务端的写法

> jsonp 是使用加载js的方式加载json数据的替代方案
>
> 请求参数中会有callback字段，这是他的回调函数名
>
> 返回的结果中直接根据回调函数名调用回调函数，示例如下：

```php
function jsonp_encode($obj) {
        if(
          	!isset($_GET['callback'])
        	||empty($_GET['callback'])  
        ){
          return;
        }
        return $_GET['callback'] . "(" . json_encode($obj) . ");";
    }
```



