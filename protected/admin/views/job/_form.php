
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'title'),
)); ?>
<?php
if($this->action->id==='view'){
	$viewFlag=true;
}
?>
	<p>以下<span class="required">*</span>为必填项.<?php if($viewFlag) echo "<br><b>提示：现在为浏览操作，此操作不提供保存功能！</b>"?></p>

	<?php echo $form->errorSummary($model); ?>

	<?php $this->widget('ActionInfo');?>

	
	<?php echo $form->hiddenField($model,'id',array('value'=>$model->id)); ?>
    <?php echo $form->hiddenField($model,'userid',array('value'=>Yii::app()->user->id)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50)); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cid'); ?>
		<?php echo $form->dropDownList($model,'cid',$categorys); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>25)); ?>
	</div>
	<div class="row">
		<?php Yii::app()->clientScript->registerScriptFile(BASEURL.'/resources/plugins/My97DatePicker/WdatePicker.js',CClientScript::POS_END);?>
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php 
			if(!empty($model->end_time))
				$value=date('Y-m-d',$model->end_time);
			echo $form->textField($model,'end_time',array('size'=>25,'value'=>$value,'onClick'=>"WdatePicker()")); ?>
	</div>
	
	<?php 
	Yii::app()->clientScript->registerScript("Job_content","KE.show({id:'Job_content'});")?>
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('style'=>'width:70%;height:300px')); ?>
	</div>

<?php
if(!$viewFlag){
?>
		<div class="row buttons">
	<button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>
<?php
}
 $this->endWidget(); 
?>
</div><!-- form -->