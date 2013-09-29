
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
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
		<?php echo $form->labelEx($model,'bid'); ?>
		<?php echo $form->dropDownList($model,'bid',$bcategorys); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'imagefile'); ?>
		<?php echo $form->fileField($model,'imagefile',array('size'=>50)); 
			  if(!empty($model->imgurl))
			  	echo "<img src='".BASEURL."/resources/icons/picture.png' title='缩略图'/>";
		?>
	</div>
	<?php Yii::app()->clientScript->registerScript("Product_content","KE.show({id:'Product_content'});")?>
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('style'=>'width:70%;height:300px')); ?>
	</div>
	<div style="width:90%;margin-left:5%">
		<fieldset>
    		<legend><strong>相关设置</strong></legend>
    		
    		<?php 
    		if(Yii::app()->params['recommend']['product_display']){
    		?>
    		<div class="row">
			<?php echo $form->labelEx($model,'recommend'); ?>
			<?php echo $form->dropDownList($model,'recommend',Yii::app()->params['recommend']['product']); ?>
			</div>
			<?php }?>
    		<?php 
    		if(Yii::app()->params['recommend_level']['product_display']){
    		?>
    		<div class="row">
			<?php echo $form->labelEx($model,'recommend_level'); ?>
			<?php echo $form->dropDownList($model,'recommend_level',Yii::app()->params['recommend_level']['product']); ?>
			<p class="hint">数值越大排序越靠前</p>
			</div>
			<?php }?>
			
			<div class="row">
			<?php echo $form->labelEx($model,'summary'); ?>
			<?php echo $form->textArea($model,'summary',array('cols'=>45,'rows'=>5)); ?>
			</div>
  		</fieldset>
	</div>
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

</div><!-- form -->