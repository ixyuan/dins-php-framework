<?php

namespace dins;

class Config
{
	// 配置参数
	protected $config = [];

	// 配置文件目录
	protected $path;

	public function __construct(string $file, string $name = null)
	{
		if (!is_null($name)) {
			// 获取全部加载项目
		} else {
			// 获取单项
		}
	}

	static public function load($file, $name)
	{
		// 判断配置文件是否存在
		$path = __DIR__ . '/config/' . $file . '.php';
	}
}