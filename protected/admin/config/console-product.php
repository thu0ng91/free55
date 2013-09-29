<?php
/**
 * 生成环境所用配置文件
 */
$backend=dirname(dirname(__FILE__));
$frontend=dirname($backend);
Yii::setPathOfAlias('backend',$backend);
$frontendArray=require_once($frontend.'/config/console-product.php');
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
    'application.extensions.gallerymanager.*',
    'application.extensions.gallerymanager.models.*',      
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