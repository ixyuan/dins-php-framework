<?php

namespace dins;

class Config
{
	// 配置参数
	protected $config = [];

	// 配置文件目录
	protected $path;

	public function __construct(string $name, string $file)
	{
		if (isset($this->config[$file])) {
			return $this->config[$file][$name];
		} else {
			load($name, $file);
		}
	}

	// public static function __make(App $app)
	// {
	// 	$path = $app->getConfigPath();
	// 	return new static($path);
	// }

	static public function load($name, $file)
	{
		// 判断配置文件是否存在
		$path = __DIR__ . '/config/' . $file . '.php';
	}
}