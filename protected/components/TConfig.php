<?php
/**
 * 统一管理数据库配置和文件配置
 * @author xia.q
 * 使用方法：
 * $var = Yii::app()->config->get($key);
 * Yii::app()->config->set($key, $value);
 * 
 * 有如下功能：
 * 1.后台数据库配置管理
 * 2.文件配置管理
 * 3.进程中动态配置管理
 * 4.统一缓存（进程配置不缓存）
 * 
 * 表结构如下：
 * $sql = 'CREATE TABLE IF NOT EXISTS `{{$this->configTableName}}` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`code` varchar(32) NOT NULL,
				`ckey` varchar(64) NOT NULL,
				`value` text NOT NULL,
				`serialized` tinyint(1) NOT NULL,
				PRIMARY KEY (`id`),
				UNIQUE KEY `ckey_2` (`ckey`),
				KEY `ckey` (`ckey`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';
 * 
 * 如果要更新缓存：
 * Yii::app()->cache->delete(TConfig::CACHE_KEY);
 * 
 */
class TConfig extends CApplicationComponent
{
	private $config_group = array('BASE','SITE','LOCAL','MAIL','SERVER','PIC','OTHER');
	const CACHE_KEY = 'Extension.TConfig';//存储键值
	const CONFIG_EXT = '_cofnig';
	
	//默认C:/xampp/htdocs/turen.pw\config
	public $configPath = '';
	public $configTableName = '{{setting}}';//设置表
	public $cacheID = 'cache';//指定一个缓存

	private $db;
	private $configs = array();
	
	private $configHtml = array();
	
	public function init()
	{
		parent::init();
		$this->db = Yii::app()->db;
		
		//配置文件的位置
		if(empty($this->configPath))
			$this->configPath = Yii::getPathOfAlias('webroot.config');
		
		//初始所有配置项到_config
		$this->getConfigs();
		
		fb($this->configs);
	}
	
	/**
	 * 取配置项
	 * @param string $key
	 * @throws CException
	 */
	public function get($key)
	{
		if(isset($this->configs[$key]))
			return $this->configs[$key];
		else
			return '';
			//throw new CException("Unable to get value - no entry present with key \"{$key}\".");
	}
	
	/**
	 * 临时设置配置项，只在同一个进程有效
	 * @param string $key
	 * @param mixd $value
	 * @return void
	 */
	public function set($key, $value)
	{
		if(is_array($value)) {
			$this->configs[$key] = serialize($value);
		} else {
			$this->configs[$key] = $value;
		}
	}
	
	/**
	 * 获取所有配置（数据库和文件）
	 */
	private function getConfigs()
	{
		$cacheKey = self::CACHE_KEY;
		if($this->cacheID !== false && ($cache = Yii::app()->getComponent($this->cacheID)) !== null) {
			if(($value = $cache->get($cacheKey)) !== false)
				$this->configs = unserialize($value);
			else {
				$this->load();
				$cache->set($cacheKey, serialize($this->configs));
			}
		} else
			$this->load();
	}
	
	/**
	 * 文件配置项，注意文件名的优先级
	 * @param string $path
	 * @return array
	 */
	public function getFilesForDir($path)
	{
		$files = array();
		$folder=@opendir($path);
		while(($file=@readdir($folder))!==false)
		{
			if($file!=='.' && $file!=='..' && $file!=='.svn' && $file!=='.gitignore' && is_file($this->configPath.DIRECTORY_SEPARATOR.$file))
				$files[] = $file;
		}
		closedir($folder);
		sort($files);
		return $files;
	}
	
	/**
	 * 动态加载所有配置项
	 */
	private function load()
	{
		//数据库配置项
		$dbReader = $this->db->createCommand('SELECT * FROM '.$this->configTableName)->query();
		while (false !== ($row = $dbReader->read())) {
			if(intval($row['serialized']) == 1)
				$this->configs[$row['ckey']] = unserialize($row['value']);
			else
				$this->configs[$row['ckey']] = $row['value'];
		}
			
		$files = $this->getFilesForDir($this->configPath);
		foreach ($files as $file) {
			if(strpos($file, self::CONFIG_EXT) !== false) {
				$data = require($this->configPath.DIRECTORY_SEPARATOR.$file);
				if(is_array($data)) {
					foreach ($data as $key=>$value)
						$this->configs[$key] = $value;
				}
			}
		}
	}
	
	/**
	 * 为非核心模块创建后台配置项
	 */
	public function createConfig()
	{
		$group = self::CONFIG_GROUP;
		
		//扫描每个非核心模块，并取得后台配置数据
		
		
		
		$this->config_group = '';
		
		
		
		
		
	}
	
	/**
	 * 返回显示指定组的后台配置
	 * @param string $group_name
	 */
	public function displayConfig($group_name = 'BASE')
	{
		return isset($this->config_group[$group_name])?$this->configHtml[$group_name]:'';
	}
}
