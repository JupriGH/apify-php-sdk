<?php
namespace apify;

spl_autoload_register(function ($name) {
	$name = strtolower($name);
	$ns = strtolower(__NAMESPACE__) .'\\';
	if (strpos($name, $ns) !== 0) return;
	
	$name = str_replace([$ns, '\\', '/'], ['', DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $name);
	$path = __DIR__ . DIRECTORY_SEPARATOR . $name .'.php';
	
	if (is_readable($path)) require_once($path);
	else echo 'TODO:'. $path. PHP_EOL;
});

require_once 'shared/consts.php';
require_once 'utils.php';
