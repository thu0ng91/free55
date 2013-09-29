
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'option-form',
	'focus'=>array($model,'seotitle'),
	'enableAjaxValidation'=>false,
)); ?>

	<p>以下<span class="required">*</span>为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php $this->widget('ActionInfo');?>

	
	<?php echo $form->hiddenField($model,'id',array('value'=>$model->id)); ?>



	<div style="width:90%;margin-left:5%">
		<fieldset>
    		<legend><strong>SEO设置</strong></legend>
    		<div class="row">
			<?php echo $form->labelEx($model,'seotitle'); ?>
			<?php echo $form->textField($model,'seotitle',array('size'=>50)); ?>
			</div>
    		<div class="row">
			<?php echo $form->labelEx($model,'seokeywords'); ?>
			<?php echo $form->textField($model,'seokeywords',array('size'=>50)); ?>
			</div>
			<div class="row">
			<?php echo $form->labelEx($model,'seodescription'); ?>
			<?php echo $form->textArea($model,'seodescription',array('cols'=>45,'rows'=>5)); ?>
			</div>
  		</fieldset>
	</div>

		<div class="row buttons">
	<button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->