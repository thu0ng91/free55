
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form',
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
		<?php echo $form->labelEx($model,'cid'); ?>
		<?php echo $form->dropDownList($model,'cid',$categorys); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'linkurl'); ?>
		<?php echo $form->textField($model,'linkurl',array('size'=>50)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'imagefile'); ?>
		<?php echo $form->fileField($model,'imagefile',array('size'=>50)); 
			  if(!empty($model->imgurl))
			  	echo "<img src='".BASEURL."/resources/icons/picture.png' title='链接图'/>";
		?>
	</div>

	<div style="width:90%;margin-left:5%">
		<fieldset>
    		<legend><strong>相关设置</strong></legend>
			<div class="row">
			<?php echo $form->labelEx($model,'summary'); ?>
			<?php echo $form->textField($model,'summary',array('size'=>50)); ?>
			</div>
			<div class="row">
			<?php echo $form->labelEx($model,'target'); ?>
			<?php echo $form->dropDownList($model,'target',Yii::app()->params['urltarget']); ?>
			</div>
  		</fieldset>
	</div>
		<div class="row buttons">
	<button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->