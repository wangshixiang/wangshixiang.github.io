```php
<?php
function get_db_client($config){
    foreach([
        'dbms','host','dbName','user','pass','port','charset'
            ] as $v){
        if(isset($config[$v])){
            $$v = $config[$v];
        }
    }
    $dsn = "$dbms:host=$host;dbname=$dbName;port=$port;charset=$charset";
//    exit($dsn);
    return new PDO($dsn,$user,$pass);
};
$cli = get_db_client([
    'dbms'=>'mysql',
    'host'=>'120.27.54.128',
    'port'=>3306,
    'dbName'=>'ysd',
    'user'=>'ysdgw',
    'pass'=>'ysdyhxgz',
    'charset'=>'utf8'
]);
$rst = $cli->query('select G_NAME from think_hs');
$content = '';
foreach($rst as $item){
    $content.=$item['G_NAME']."\r\n";
}
file_put_contents('hs_name.txt',$content);
```

