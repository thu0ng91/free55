
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50)); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'gallaryid'); ?>
	</div> 
	<div class="row">
		<?php
			$this->widget('ext.gallerymanager.GalleryManager', array(
							'gallery' => $model->galleryBehavior->getGallery(),
							'controllerRoute' => 'gallery' , //route to gallery controller
						));		
		?>
		<?php echo $form->hiddenField($model,'gallaryid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('style'=>'width:50%;height:200px')); ?>
	</div>

    <?php if ($this->action->id == 'update'): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',Yii::app()->params['statusAction']); ?>
	</div>
    <?php endif; ?>
    
	<div class="row buttons">
        <button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->