<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'username'),
)); ?>

	<p>以下<span class="required">*</span>为必填项.</p>
	<?php echo $form->errorSummary($model); ?>
	<?php $this->widget('ActionInfo');?>

	
	<?php echo $form->hiddenField($model,'id',array('value'=>$model->id)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>52)); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'roleid'); ?>
		<?php echo $form->dropDownList($model,'roleid',Yii::app()->params['role']); ?>
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
			<?php echo $form->labelEx($model,'qq'); ?>
			<?php echo $form->textField($model,'qq',array('size'=>50)); ?>
			</div>
			<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>50)); ?>
			</div>
			<div class="row">
			<?php echo $form->labelEx($model,'address'); ?>
			<?php echo $form->textArea($model,'address',array('cols'=>45,'rows'=>5)); ?>
			</div>
  		</fieldset>
	</div>

		<div class="row buttons">
	<button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->