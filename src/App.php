<?php

// dins php framework

namespace dins;

class App {

	protected $rootPath;
	protected $appPath;
	protected $runtimePath;

	public function __construct ()
	{
		// 项目根目录
		$this->rootPath		= dirname(__DIR__) . DIRECTORY_SEPARATOR;

		// 应用目录
		$this->appPath		= $this->rootPath . 'app' . DIRECTORY_SEPARATOR;

		// 日志目录
		$this->runtimePath	= $this->rootPath . 'runtime' . DIRECTORY_SEPARATOR;
	}

	public function initialize ()
	{
		// ..
	}

    static public function run ()
    {


        // 调试模式

        // 配置路径
        $appPath = $this->getAppPath();
        $configPath = $this->getConfigPath();



        // 路由分发

        
    }

    static public function loader ($class)
    {

    }

	/**
	 * 获取应用根目录
	 * @access public
	 * @return string
	 */
	public function getRootPath(): string
	{
		return $this->rootPath;
	}

	/**
     * 获取应用基础目录
     * @access public
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->rootPath . 'app' . DIRECTORY_SEPARATOR;
    }

    /**
     * 获取当前应用目录
     * @access public
     * @return string
     */
    public function getAppPath(): string
    {
        return $this->appPath;
    }

    /**
     * 设置应用目录
     * @param string $path 应用目录
     */
    public function setAppPath(string $path)
    {
        $this->appPath = $path;
    }

    /**
     * 获取应用运行时目录
     * @access public
     * @return string
     */
    public function getRuntimePath(): string
    {
        return $this->runtimePath;
    }

    /**
     * 设置runtime目录
     * @param string $path 定义目录
     */
    public function setRuntimePath(string $path): void
    {
        $this->runtimePath = $path;
    }

    /**
     * 获取核心框架目录
     * @access public
     * @return string
     */
    public function getThinkPath(): string
    {
        return $this->thinkPath;
    }

    /**
     * 获取应用配置目录
     * @access public
     * @return string
     */
    public function getConfigPath(): string
    {
        return $this->rootPath . 'config' . DIRECTORY_SEPARATOR;
    }

    /**
     * 获取配置后缀
     * @access public
     * @return string
     */
    public function getConfigExt(): string
    {
        return $this->configExt;
    }

	static public function say ()
	{
		echo "hello world";
	}

}
