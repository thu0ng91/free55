
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'autoupgrade-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'title'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p>以下<span class="required">*</span>为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php $this->widget('ActionInfo');?>

	
	<?php echo $form->hiddenField($model,'id',array('value'=>$model->id)); ?>
    <?php //echo $form->hiddenField($model,'userid',array('value'=>Yii::app()->user->id)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>20)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>50)); ?> 
        <?php //echo $form->hiddenField($model,'createtime',array('value'=> time())); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
        <?php //echo $form->hiddenField($model,'createtime',array('value'=> time())); ?>
	</div> 
    

    <div class="row buttons">
        <button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->