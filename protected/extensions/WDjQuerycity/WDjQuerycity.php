<?php
/**
 * WDjQuerycity for Yii extensions  基于jquery的城市三级联动插件
 * @jquerycityRepository https://github.com/silentcloud/jQuerycity.git
 * @jquerycityAuthor  qiang.mou http://moonka.info  
 * @author WindsDeng <winds@dlf5.com> QQ:620088997 WindsDeng's Blog http://www.dlf5.com
 * @license BSD许可证
 * @version 1.0.0
 */
class WDjQuerycity extends CInputWidget 
{
	/******* widget private vars *******/
	private $baseUrl			= null;
	private $jsFiles			= array(
									'/src/jquerycity.js',
								);
    
    public $province = 'province';
    public $city = 'city';
    public $area = 'area';
    public $provinceOptions =array();
    public $cityOptions =array();
    public $areaOptions =array();
    public $provinceValue = '';
    public $cityValue = '';
    public $areaValue = '';
    /**
	* Initialize the widget
	*/
	public function init()
	{
		//Publish assets
		$this->publishAssets();
		$this->registerClientScripts();
		parent::init();
        
	}
	
	/**
	* Publishes the assets
	*/
	public function publishAssets()
	{
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'jQuerycity';
		$this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
	}
	
	/**
	* Registers the external javascript files
	*/
	public function registerClientScripts()
	{
		
		if ($this->baseUrl === '')
			throw new CException(Yii::t('jQuerycity', 'baseUrl must be set. This is done automatically by calling publishAssets()'));
		
		//Register the main script files
		Yii::app()->clientScript->registerCoreScript('jquery');
		$cs = Yii::app()->getClientScript();
		foreach($this->jsFiles as $jsFile) {
			$uploadifyJsFile = $this->baseUrl . $jsFile;
			$cs->registerScriptFile($uploadifyJsFile, CClientScript::POS_HEAD);
		}
        
		//Register the widget-specific script on ready
		$js = $this->onloadJavascript();
		$cs->registerScript('jQuerycity'.$this->getId(), $js, CClientScript::POS_READY);
	}
	
    /**
     *  onloadJavascript
     * @return type $js
     */
	protected function onloadJavascript()
	{
        $config['selectId']  = array(
            'province' => $this->province,
            'city'     => $this->city ,
            'area'     => $this->area
        );
        $config['default'] = array(
            'province' => $this->provinceValue,
            'city'     => $this->cityValue ,
            'area'     => $this->areaValue
        );
            
		$JQconfig = CJavaScript::encode($config);
		$js = "$('body').jQueryCity($JQconfig);";
		return $js;
	}
   
    // runs the  widget
    public function run() 
    {
        $provinceOptions['id'] = $this->province;
        $cityOptions['id'] = $this->city;
        $areaOptions['id'] = $this->area;
        if($this->provinceOptions)
        {
            $provinceOptions =  array_merge($this->htmlOptions,$this->provinceOptions);
            $cityOptions = array_merge($this->htmlOptions,$this->cityOptions);
            $areaOptions = array_merge($this->htmlOptions,$this->areaOptions);
        }
        $provinceValue = array(
            ''=>'请选择省'
        );
        $cityValue = array(
            ''=>'请选择市'
        );
        $areaValue = array(
            ''=>'请选择区'
        );
        echo CHtml::activeDropDownList($this->model, $this->province, $provinceValue,  $provinceOptions); 
        echo CHtml::activeDropDownList($this->model, $this->city, $cityValue, $cityOptions); 
        echo CHtml::activeDropDownList($this->model, $this->area, $areaValue, $areaOptions); 
        parent::run();
    }
}
