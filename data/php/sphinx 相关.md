[TOC]

## 设置多属性筛选

```php
<?php
require_once "sphinxapi.php";
$search = new SphinxClient;
$search->setServer("localhost", 9312);
$search->setMatchMode(SPH_MATCH_ANY);
$search->SetArrayResult ( true );
$search->setMaxQueryTime(3);
$search->SetFilter("author_id",array(3));//设置要被筛选的属性
print_r($search->query("php"));
?>
```

