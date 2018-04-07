# xml_encode & decode

> encode 函数摘自thinkphp3.2

```php
<?php
function data_to_xml($data, $item = 'item', $id = 'id') {
	$xml = $attr = '';
	foreach ($data as $key => $val) {
		if (is_numeric($key)) {
			$id && $attr = " {$id}=\"{$key}\"";
			$key = $item;
		}
		$xml .= "<{$key}{$attr}>";
		$xml .= (is_array($val) || is_object($val)) ? data_to_xml($val, $item, $id) : $val;
		$xml .= "</{$key}>";
	}
	return $xml;
}
function xml_encode($data, $root = 'eline', $item = 'item', $attr = '', $id = 'id', $encoding = 'utf-8') {
	if (is_array($attr)) {
		$_attr = array();
		foreach ($attr as $key => $value) {
			$_attr[] = "{$key}=\"{$value}\"";
		}
		$attr = implode(' ', $_attr);
	}
	$attr = trim($attr);
	$attr = empty($attr) ? '' : " {$attr}";
	$xml = "<?xml version=\"1.0\" encoding=\"{$encoding}\"?>";
	$xml .= "<{$root}{$attr}>";
	$xml .= data_to_xml($data, $item, $id);
	$xml .= "</{$root}>";
	return $xml;
}
$arr = [
	'a' => 1,
	'b' => 2,
	'c' => [
		'a' => 1,
	],
];
$xml = xml_encode($arr) . "\n";
$obj = simplexml_load_string($xml);
$arr = json_decode(json_encode($obj), true);
var_dump($arr);
```

