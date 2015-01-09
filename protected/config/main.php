<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'5884游戏媒体群站',

	// preloading 'log' component
	'preload'=>array('log'),
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.controllers.layout.*',
		'application.components.*',
		'application.extensions.mylib.*',
		'application.extensions.temp.*',
		'application.extensions.PHPExcel.*',
		'application.extensions.PHPExcel.PHPExcel.*',
	),

	'defaultController'=>'stage',
	'modules' => array(
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'nan111111',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
			'generatorPaths' => array(
				'bootstrap.gii',
				'application.gii',
			),
		),
		'ycm' => array(
			'username' => 'xianshannan',
			'password' => 'nan111111',
			'registerModels' => array(
				//'application.models.Blog', // one model
				'application.models.*', // all models in folder
			),
			'uploadCreate' => true, // create upload folder automatically
			'redactorUpload' => true, // enable Redactor image upload
		),
		'forum'=>array(
			'class'=>'application.modules.bbii.BbiiModule',
			'adminId'=>1,
			'userClass'=>'User',
			'userIdColumn'=>'id',
			'userNameColumn'=>'username',
		),
		'rbac'=>array(
	        'class'=>'application.modules.rbacui.RbacuiModule',
	        'userClass' => 'User',
	        'userIdColumn' => 'id',
	        'userNameColumn' => 'username',
	        'rbacUiAdmin' => true,
	        'rbacUiAssign' => true,
	    ),
	),
	// application components
	'components'=>array(
		'bootstrap' => array(
			'class' => 'bootstrap.components.Bootstrap',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        //'loginUrl'=>array('main/login.html'),
		),
/*              'db'=>array(
                        'connectionString' => 'sqlite:protected/data/blog.db',
                        'tablePrefix' => 'tbl_',
                ),	*/
		// uncomment the following to use a MySQL database
 
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=game2',
			'emulatePrepare' => true,
			// 'username' => 'root',
			// 'password' => '',
			'username' => 'xianshannan',
			'password' => 'nan111111',
			// 'username'=>'led',
			// 'password'=>'led111111',
			'charset' => 'utf8',
			// 'tablePrefix' => 'g_',
			'tablePrefix' => 'g_',
		),
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
        ),
		'memcache'=>array(
			'class'=>'CMemCache',
//                    'useMemcached'=>true,
			'behaviors'=>array(
				'ext.behaviors.NMemCache',
			),
			'servers'=>array(
				array(
					'host'=>'127.0.0.1',
					'port'=>11211,
					'weight'=>60,
				),
			),
		 ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false, // 这一步是将代码里链接的index.php隐藏掉。
            // 'urlSuffix' => '.html', //后缀    
            'rules'=>array(
                    'post/<id:\d+>/<title:.*?>'=>'post/view',
                    'posts/<tag:.*?>'=>'post/index',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),
//please don't config cache module ,use baememcache in baeconfig.php
/*'cache'=>array(
            'class'=>'system.caching.CMemCache',
            ),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);
