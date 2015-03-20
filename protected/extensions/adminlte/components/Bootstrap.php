<?php
/**
 * 由jorry整合，980522557@qq.com
 * admin lte启动类
 */
class Bootstrap extends CComponent
{
    // admin LTE plugins
    /*
     * 每加一个插件都在此处注册一下并使用
     * 将它们定义为一个一个的包
    const PLUGIN_AFFIX = 'affix';
    const PLUGIN_ALERT = 'alert';
    const PLUGIN_BUTTON = 'button';
    const PLUGIN_CAROUSEL = 'carousel';
    const PLUGIN_COLLAPSE = 'collapse';
    const PLUGIN_DROPDOWN = 'dropdown';
    const PLUGIN_MODAL = 'modal';
    const PLUGIN_POPOVER = 'popover';
    const PLUGIN_SCROLLSPY = 'scrollspy';
    const PLUGIN_TAB = 'tab';
    const PLUGIN_TOOLTIP = 'tooltip';
    const PLUGIN_TRANSITION = 'transition';
    const PLUGIN_TYPEAHEAD = 'typeahead';
    */
    
    /**
     * @var array $assetsJs of javascript library names to be registered when initializing the library.
     */
    public $assetsJs = array();
    /**
     * @var array $assetsCss of style library names to be registered when initializing the library.
     */
    public $assetsCss = array();
    /**
     * @var string holds the published assets
     */
    protected $_assetsUrl;

    /**
     * Widget's initialization
     */
    public function init()
    {
        /* ensure all widgets - plugins are accessible to the library */
    	//Yii::app()->setImport(array());
    	//响应设计
    	Yii::app()->getClientScript()->registerMetaTag('example', 'description', null, array('lang' => 'en'));
    	Yii::app()->getClientScript()->registerMetaTag('width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no','viewport');
    	 
    	//加载远程字体
    	Yii::app()->getClientScript()->registerCssFile('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    	Yii::app()->getClientScript()->registerCssFile('http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css');
    	
        /* register css assets */
        foreach ($this->assetsCss as $css) {
            $this->registerAssetCss($css);
        }
        /* register js assets */
        foreach ($this->assetsJs as $js) {
            $this->registerAssetJs($js);
        }
    }

    /**
     * Returns the assets URL.
     * Assets folder has few orphan and very useful utility libraries.
     * @return string
     */
    public function getAssetsUrl()
    {
        if (isset($this->_assetsUrl)) {
            return $this->_assetsUrl;
        } else {
        	//是否开启强制复制整个assets目录
            $forceCopyAssets = false;
            $path = Yii::getPathOfAlias('adminlte.assets');
            $assetsUrl = Yii::app()->assetManager->publish($path, false, -1, $forceCopyAssets);
            return $this->_assetsUrl = $assetsUrl;
        }
    }

    /**
     * Register a specific js file in the asset's js folder
     * @param string $jsFile
     * @param int $position the position of the JavaScript code.
     * @see CClientScript::registerScriptFile
     * @return $this
     */
    public function registerAssetJs($jsFile, $position = CClientScript::POS_END)
    {
    	//导入之前依赖jquery，这里只依赖一次
        Yii::app()->getClientScript()->registerCoreScript('jquery')->registerScriptFile($this->getAssetsUrl()."{$jsFile}", $position);
        return $this;
    }

    /**
     * Registers a specific css in the asset's css folder
     * @param string $cssFile the css file name to register
     * @param string $media the media that the CSS file should be applied to. If empty, it means all media types.
     * @return $this
     */
    public function registerAssetCss($cssFile, $media = '')
    {
        Yii::app()->getClientScript()->registerCssFile($this->getAssetsUrl()."{$cssFile}", $media);
        return $this;
    }

    /**
     * Registers a specific Bootstrap plugin using the given selector and options.
     * @param string $name the plugin name.
     * @param string $selector the CSS selector.
     * @param array $options the JavaScript options for the plugin.
     * @param int $position the position of the JavaScript code.
     */
    public function registerPlugin($name, $selector, $options = array(), $position = CClientScript::POS_END)
    {
        $options = !empty($options) ? CJavaScript::encode($options) : '';
        $script = "jQuery('{$selector}').{$name}({$options});";
        $id = __CLASS__ . '#Plugin' . self::$counter++;
        Yii::app()->clientScript->registerScript($id, $script, $position);
    }
} 