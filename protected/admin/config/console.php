<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$backend=dirname(dirname(__FILE__));
$frontend=dirname($backend);
Yii::setPathOfAlias('backend',$backend);
$frontendArray=require_once($frontend.'/config/console.php');
$backendArray=array(
	'name'=>'SMG移动端信息管理系统',
	'basePath'=>$frontend,
//    'viewPath'=>$backend.'/views',
//	'controllerPath'=>$backend.'/controllers',
//    'runtimePath'=>$backend.'/runtime',
	'import'=>array(	
    'application.models.*',
    'application.components.*',
    'application.extensions.upload.*',
    'application.extensions..gallerymanager.*',
    'application.extensions..gallerymanager.models.*',      
    'backend.models.*',
    'backend.components.*',      
	),
	'components'=>array(
//		'urlManager'=>array(
//			'urlFormat'=>'path',
//			'urlSuffix'=>null,
//			'showScriptName'=>true, 
//			'rules'=>null,
//		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
                	'class'=>'CFileLogRoute', 
					'levels'=>'error,warning,trace,info',
           	 	),        
                )
            ),
	),
	'params'=>CMap::mergeArray(require($frontend.'/config/params.php'),require($backend.'/config/params.php')),
);
//return $backendArray;
return CMap::mergeArray($frontendArray,$backendArray);