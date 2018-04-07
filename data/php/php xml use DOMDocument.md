# php xml use  Domdocument

> 包含字符串/文件编解码

```php
<?php
class xml_tool {
	protected $_config = [
		'root' => 'root',
	];
	function __construct($config = null) {
		if ($config) {
			$this->config($config);
		}
	}
	function config($config) {
		if (!is_array($config)) {
			return;
		}
		foreach ($config as $k => $v) {
			$this->_config[$k] = $v;
		}
	}
	function xml_encode($mixed, $domElement = null, $DOMDocument = null) {
		if (is_null($DOMDocument)) {
			$DOMDocument = new DOMDocument('1.0', 'UTF-8');
			$DOMDocument->formatOutput = true;
			$root = $DOMDocument->createElement($this->_config['root']);
			$this->xml_encode($mixed, $root, $DOMDocument);
			$DOMDocument->appendChild($root);
			return $DOMDocument->saveXML();
		} else {
			if (is_array($mixed)) {
				foreach ($mixed as $index => $mixedElement) {
					if (is_int($index)) {
						if ($index == 0) {
							$node = $domElement;
						} else {
							$node = $DOMDocument->createElement($domElement->tagName);
							$domElement->parentNode->appendChild($node);
						}
					} else {
						$plural = $DOMDocument->createElement($index);
						$domElement->appendChild($plural);
						$node = $plural;
					}
					$this->xml_encode($mixedElement, $node, $DOMDocument);
				}
			} else {
				$domElement->appendChild($DOMDocument->createTextNode($mixed));
			}
		}
	}
	function to_file($data, $file_name) {
		file_put_contents($file_name, $this->xml_encode($data));
	}
	function from_file($file_name) {
		return json_decode(json_encode(simplexml_load_file($file_name)), true);
	}
	function from_string($string) {
		return json_decode(json_encode(simplexml_load_string($string)), true);
	}
	function to_string($data) {
		return $this->xml_encode($data);
	}
}
$tool = new xml_tool();
print_r($tool->from_file('H:\代码备份\wwwroot\baas\config\model\t31_order.xml'));

```



