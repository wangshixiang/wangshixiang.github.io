格式化txt词库的php代码

[http://jockchou.github.io/blog/2015/08/24/coreseek-mmseg.html](http://jockchou.github.io/blog/2015/08/24/coreseek-mmseg.html)

```php
/*
* 把txt词库转换成mmseg词库
* 注意源文件必须是utf8编码
*/

$sourcefile = null;
$targetfile = null;

$options = getopt("s:o:");
if (!isset($options['s'])) {
    $sourcefile = "words.txt";
} else {
    $sourcefile = $options['s'];
}

if (!isset($options['o'])) {
    $targetfile = "mmseg-dict.txt";
} else {
    $targetfile = $options['o'];
}

convert_file($sourcefile, $targetfile);

function convert_file($sourcefile, $targetfile) {
    $rhandle = fopen($sourcefile, "r");
    $whandle = fopen($targetfile, "w");

    if ($rhandle) {
        while (($buffer = fgets($rhandle, 4096)) !== false) {
            $line = trim($buffer, "\r\n\t ");
            fwrite($whandle, "$line\t1\r\nx:1\r\n");
        }
        if (!feof($rhandle)) {
            echo "Error: unexpected fgets() fail\n";
        }
        fclose($rhandle);
        fclose($whandle);
    }
}
```

