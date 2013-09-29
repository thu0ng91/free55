
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'live-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'title'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p>以下<span class="required">*</span>为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php $this->widget('ActionInfo');?>

	
	<?php echo $form->hiddenField($model,'id',array('value'=>$model->id)); ?>
    <?php echo $form->hiddenField($model,'userid',array('value'=>Yii::app()->user->id)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'linkurl'); ?>
		<?php echo $form->textField($model,'linkurl',array('size'=>50)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'starttime'); ?>
		<?php echo $form->dateField($model,'starttime', array('value' => $model->starttime ? date('Y-m-d H:i', $model->starttime) : date('Y-m-d H:i'))); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'endtime'); ?>
		<?php echo $form->dateField($model,'endtime', array('value' => $model->endtime ? date('Y-m-d H:i', $model->endtime) : date('Y-m-d H:i'))); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'repeat'); ?>
    </div>
    
    <div class="row">    
		<?php echo $form->checkBoxList($model,'repeat', Yii::app()->params['week'], array('template' => '<p class="week-checkbox">{label}&nbsp;{input}</p>', 'separator'=>'')); ?>
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
    
	<div style="width:90%;margin-left:5%">
    		<?php 
    		if(Yii::app()->params['recommend_level']['school_display']){
    		?>
    		<div class="row">
			<?php echo $form->labelEx($model,'recommend_level'); ?>
			<?php echo $form->dropDownList($model,'recommend_level',Yii::app()->params['recommend_level']['video']); ?>
			<p class="hint">数值越大排序越靠前</p>
			</div>
			<?php }?>
	</div>
	<div class="row buttons">
	<button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->