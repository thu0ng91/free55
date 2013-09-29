<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        <title><?php echo Yii::app()->name;?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASEURL?>/resources/backend/style.css" />
        <?php Yii::app()->clientScript->registerCoreScript('jquery');?>
    </head>

    <body>
		<div class="wrapper">
			<h1>&nbsp;</h1>
			<div class="content">

				<div id="form_wrapper" class="form_wrapper">
				<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableAjaxValidation'=>false,
					'focus'=>array($model,'username'),
					'htmlOptions'=>array(
					'class'=>'login active',
					),
				));?>
				<h3>登录窗口</h3>
				<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('actionInfo'))
			 echo "<div class='flash-error' id='flash-success'><b>"."<img border='0' src='"
			 .BASEURL."/resources/icons/info.png' width='16px' height='16px'>提示："
			 .Yii::app()->user->getFlash('actionInfo')
			 ."</b><a href='javascript:void(0)' onclick=\"$('#flash-success').slideToggle();\" style='float:right'><img border='0' src='"
			 .BASEURL."/resources/icons/cancel.png'></a></div>";
?>
					<div>
						<?php echo $form->labelEx($model,'username'); ?>
						<?php echo $form->textField($model,'username'); ?>
					</div>
					<div style="clear:both">
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password'); ?>
					</div>

						<div class="bottom">
							<input type="submit" value="登录"/>
							<div class="clear"></div>
						</div>
				<?php $this->endWidget(); ?>
				</div>
					
				</div>

				<div class="clear"></div>

			</div>
		</div>

		



    </body>

</html>