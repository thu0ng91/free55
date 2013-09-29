
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-form',
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
		<?php echo $form->labelEx($model,'stage'); ?>
		<?php echo $form->dropDownList($model,'stage',Yii::app()->params['school']['stage']); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'property'); ?>
		<?php echo $form->dropDownList($model,'property',Yii::app()->params['school']['property']); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',Yii::app()->params['school']['type']); ?>
	</div>		

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->dropDownList($model,'region',Yii::app()->params['school']['region']); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'addr'); ?>
		<?php echo $form->textField($model,'addr',array('size'=>50)); ?>
	</div>
	
    <div class="row">
		<?php echo $form->labelEx($model,'lg'); ?>
		<?php echo $form->textField($model,'lg',array('size'=>10)); ?>
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'lt'); ?>
		<?php echo $form->textField($model,'lt',array('size'=>10)); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>20)); ?>
	</div>  
 
 	<div class="row">
		<?php echo $form->labelEx($model,'tel'); ?>
		<?php echo $form->textField($model,'tel',array('size'=>20)); ?>
	</div> 
    
  	<div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>20)); ?>
	</div>   
    
  	<div class="row">
		<?php echo $form->labelEx($model,'headmaster'); ?>
		<?php echo $form->textField($model,'headmaster',array('size'=>20)); ?>
	</div>
    
   	<div class="row">
		<?php echo $form->labelEx($model,'clerk'); ?>
		<?php echo $form->textField($model,'clerk',array('size'=>20)); ?>
	</div>	
    
   	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age',array('size'=>20)); ?>
	</div>	    
	
 	<div class="row">
		<?php echo $form->labelEx($model,'gallaryid'); ?>
	</div>
    
	<div style="padding-left: 40px">
		<div class="row">
			<?php
				$this->widget('ext.gallerymanager.GalleryManager', array(
								'gallery' => $model->galleryBehavior->getGallery(),
								'controllerRoute' => 'gallery' , //route to gallery controller
							));		
			?>
			<?php echo $form->hiddenField($model,'gallaryid'); ?>
		</div>
	</div>
	<div class="row">
		<label class="required" for="">学校说明<span class="required">*</span></label>
	</div>
	<div style="padding-left: 40px">
		<div class="row">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active"><a href="#summary">学校简介</a></li>
				<li><a href="#feature">办学特色</a></li>
				<li><a href="#teacher">师资力量</a></li>
				<li><a href="#evaluate">用户评价</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="summary">
					<textarea name="School[summary]" style="width:70%;height:200px"><?php echo $model->summary;?></textarea>
				</div>
				<div class="tab-pane" id="feature">
					<textarea name="School[feature]" style="width:70%;height:200px"><?php echo $model->feature;?></textarea>
				</div>
				<div class="tab-pane" id="teacher">
					<textarea name="School[teacher]" style="width:70%;height:200px"><?php echo $model->teacher;?></textarea>
				</div>
				<div class="tab-pane" id="evaluate">
					<textarea name="School[evaluate]" style="width:70%;height:200px"><?php echo $model->evaluate;?></textarea>
				</div>
			</div>		
		</div>
    </div>	

	<div class="row buttons">
	<button class="sexybutton" type="submit"><span><span><span class="ok">提交</span></span></span></button>&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="sexybutton" type="reset"><span><span><span class="reload">重置</span></span></span></button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	$(function () {
		$('#myTab a:first').tab('show');
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})	
	})
</script>	