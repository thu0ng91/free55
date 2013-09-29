<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/resources/plugins/easyui/themes/default/easyui.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/resources/plugins/easyui/themes/icon.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/resources/plugins/SexyButtons/sexybuttons.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/resources/backend/backend.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/css/form.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/resources/plugins/bootstrap/css/bootstrap.min.css">
		<?php 
			  Yii::app()->clientScript->registerCoreScript('jquery');
			  //Yii::app()->clientScript->registerScriptFile(BASEURL.'/JS/jquery-1.9.1.min.js');
		 	  Yii::app()->clientScript->registerScriptFile(BASEURL.'/resources/plugins/easyui/jquery.easyui.min.1.3.2.js');
  			  Yii::app()->clientScript->registerScriptFile(BASEURL.'/resources/backend/backend.js');
		      Yii::app()->clientScript->registerScriptFile(BASEURL.'/resources/plugins/kindeditor/kindeditor-min.js');
			  Yii::app()->clientScript->registerScriptFile(BASEURL.'/resources/plugins/bootstrap/js/bootstrap.min.js');
		?>
		<title><?php echo CHtml::encode(Yii::app()->name);?></title>
        <style>
            .MultiFile-wrap{padding-left: 110px;}
            .modal-backdrop{position:static;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}
        </style>
	</head>
	<body class="easyui-layout">
	<?php echo $content?>
	</body>
</html>