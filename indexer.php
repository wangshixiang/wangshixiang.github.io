<?php
define('ROOT', './data/');
function process_dir($dir) {
	run($dir . '/');
	return "<br/>" . '[' . $dir . '/](?name=' . $dir . '/index)';
}
function process_md($md) {
	$name = get_md_name($md);

	$content = "<br/>" . '[' . $name . '](?name=' . $name . ')';
	return $content;
}
function is_md($file_name) {
	if (preg_match('/.md$/', $file_name)) {
		return true;
	}
	return false;
}
function get_md_name($file_name) {
	$length = strlen($file_name);
	return substr($file_name, 0, $length - 3);
}
function get_dir($path) {
	$path = ROOT . $path;
	$list = scandir($path);
	return $list;
}
function write_index($path, $content) {
	$path = ROOT . $path . 'index.md';
	file_put_contents($path, $content);
}
function get_parent_path($path) {
	$path_arr = explode('/', $path);
	if (count($path_arr) < 3) {
		return '';
	}
	array_pop($path_arr);
	array_pop($path_arr);
	$rst = implode('/', $path_arr);
	return $rst;
}
function run($path) {
	$list = get_dir($path);
	$content = '<br/>';
	if ($path != '') {
		$parent_path = get_parent_path($path);
		if ($parent_path) {
			$content .= '[<<](?name=' . get_parent_path($path) . '/index)';
		} else {
			$content .= '[<<](?name=index)';
		}
	}
	foreach ($list as $item) {
		if (
			$item == '.'
			|| $item == '..'
		) {
			continue;
		}
		if (is_dir(ROOT . $path . $item . '/')) {
			$content .= process_dir($path . $item);
			continue;
		}
		if (
			is_md($path . $item)
			&& $item != 'index.md'
		) {
			$content .= process_md($path . $item);
		}
	}
	write_index($path, $content);
}
run('');