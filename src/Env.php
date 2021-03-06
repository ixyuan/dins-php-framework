<?php

namespace dins;

class Env
{
	protected $data = [];

	public function __construct ()
	{
		$this->data = $_ENV;
	}

	/**
	 * 读取环境变量定义文件
	 * @access public
	 * @param  string  $file 
	 */
	public function load ()
	{
		$env = parse_ini_file($file, true) ?: [];
		$this->set($env);
	}

	// 获取环境变量值
	public function get(string $name = null, $default = null)
	{
		if (is_null($name)) {
			return $this->data;
		}
		$name = strtoupper(str_replace('.', '_', $name));

		if (isset($this->data[$name])) {
			return $this->data[$name];
		}

		return $this->getEnv($name, $default);
	}

	protected function getEnv(string $name, $default = null)
	{
		$result = getEnv('PHP_' . $name);

		if (false === $result) {
			return $default;
		}

		if ('false' === $result) {
			$result = false;
		} else if ('true' === $result) {
			$result = true;
		}

		if (!isset($this->data[$name])) {
			$this->data[$name] = $result;
		}

		return $result;
	}

	// 设置环境变量值
	public function set($env, $value = null): void
	{
		if (is_array($env)) {
			$env = array_change_key_case($env, CASE_UPPER);

			foreach ($env as $key => $val) {
				if (is_array($val)) {
					foreach ($val as $k => $v) {
						$this->data[$key . '_' . strtoupper($k)] = $v;
					}
				} else {
					$this->data[$key] = $val;
				}
			}
		} else {
			$name = strtoupper(str_replace('.', '_', $env));
			$this->data[$name] = $value;
		}
	}

	/**
	 * 
	 */
	public function has(string $name): bool
	{
		return !is_null($this->get($name));
	}

	public function __set(string $name, $value): void
	{
		$this->set($name, $value);
	}

	public function __get(string $name)
	{
		return $this->get($name);
	}

	public function __isset(string $name): bool
	{
		return $this->has($name);
	}

	public function offsetSet($name, $value): void
	{
		$this->set($name, $value);
	}

	public function offsetExists ($name): bool
	{
		return $this->__isset($name);
	}

	public function offsetUnset($name)
	{
		throw new Exception('not support: unset');
	}

	public function offsetGet($name)
	{
		return $this->get($name);
	}


}