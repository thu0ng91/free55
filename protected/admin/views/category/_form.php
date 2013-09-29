<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'title'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p>以下<span class="required">*</span>为必填项.</p>
	<?php echo $form->errorSummary($model); ?>
	<?php $this->widget('ActionInfo');?>
	
    <?php echo $form->hiddenField($model,'id',array('value'=>$model->id)); ?>
    <?php echo $form->hiddenField($model,'module',array('value'=>$model->module)); ?>
    <?php echo $form->hiddenField($model,'userid',array('value'=>Yii::app()->user->id)); ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50)); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'parentid'); ?>
		<?php echo $form->dropDownList($model,'parentid',$categorys); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort',array('size'=>50)); ?>
		<p class="hint">排序数值为0-99</p>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'imagefile'); ?>
		<?php echo $form->fileField($model,'imagefile',array('size'=>50)); 
			  if(!empty($model->imgurl))
			  	echo "<img src='".BASEURL."/resources/icons/picture.png' title='缩略图'/>";
		?>
	</div>
	<?php
	if($model->module==1):
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array(''=>'请选择','1'=>'新闻','2'=>'页面')); ?>
	</div>
	<?php endif;?>
    <?php
    if(Yii::app()->params['seo']):
    ?>
	<div style="width:90%;margin-left:5%">
		<fieldset>
    		<legend><strong>SEO设置</strong></legend>
    		<div class="row">
			<?php echo $form->labelEx($model,'seotitle'); ?>
			<?php echo $form->textField($model,'seotitle',array('size'=>50)); ?>
			</div>
    		<div class="row">
			<?php echo $form->labelEx($model,'keywords'); ?>
			<?php echo $form->textField($model,'keywords',array('size'=>50)); ?>
			</div>
			<div class="row">
			<?php echo $form->labelEx($model,'description'); ?>
			<?php echo $form->textArea($model,'description',array('cols'=>45,'rows'=>5)); ?>
			</div>
  		</fieldset>
	</div>
	<?php
    endif;
    ?>

		<div class="row buttons">
	<button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>
<?php $this->endWidget(); ?>

</div>