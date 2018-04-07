# php 生成随机字符

## code

```php
<?php
$str = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ0123456789';
$str = str_shuffle($str);
echo substr($str, 0, 6);
```

## 碰撞几率

````php
//碰撞几率
function func($length) {
	$rst = 1;
	for ($i = 0; $i < $length; $i++) {
		$rst = $rst * (62 - $i);
	}
	return $rst;
}
$a = func(20);
echo $a * $a;
````

