[TOC]

# composer常用的两种自动加载方式

## psr-4

psr-4 是php fig （框架互用小组）制定的开发规范，这里指psr-4 中的autoload 规范。

psr-4自动加载规范将namespace的路径转换标识符后匹配成文件路径实现自动加载。在composer 中的用法示例如下。

- composer.json

```json
{
  "autoload":{
    "psr4":{
      "lib\\":"lib/"
    }
  }
}
```

- lib/test.php

```php
<?php
  namespace lib;
  class test {
    
  }
```

## classmap

在此方式中，composer会将配置文件（composer.json）中指定目录下所有的class文件读取出来写到文件autoload_classmap.php中，实现自动加载。

- composer.json

```json
{
  "autoload":{
    "classmap":[
      "lib/"
    ]
  }
}
```

## files

需要autoload 函数的场景下，可以使用这种方式

- composer.json

```json
{
  "autoload":{
    "files":[
      "function/common.php"
    ]
  }
}
```



