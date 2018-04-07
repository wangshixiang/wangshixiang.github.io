# php 5.4 新特性trait

可实现多集成

## 定义

与class的定义方法类似，使用trait关键字

```php
<?php
  trait HelloTrait{
    public $a = 1;
  	public function aaa{
      return true;
  	}
  }
```

使用

```php
<?php
  class HelloClass{
    use HelloTrait;
  	public function out(){
      return $this->aaa();
  	}
  }
```

