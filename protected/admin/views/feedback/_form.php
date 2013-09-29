
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-form',
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
	<?php echo $form->hiddenField($model,'type',array('value'=>1)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50)); ?>
	</div>

	<div style="width:90%;margin-left:5%">
		<fieldset>
    		<legend><strong>联系方式</strong></legend>
			<div class="row">
				<?php echo $form->labelEx($model,'realname'); ?>
				<?php echo $form->textField($model,'realname',array('size'=>50)); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'telephone'); ?>
				<?php echo $form->textField($model,'telephone',array('size'=>50)); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('size'=>50)); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'qq'); ?>
				<?php echo $form->textField($model,'qq',array('size'=>50)); ?>
			</div>
  		</fieldset>
	</div>
	
	
	
	<?php /*Yii::app()->clientScript->registerScript("Feedback_content","KE.show({id:'Feedback_content',items:[
				'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'link']});")*/?>
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