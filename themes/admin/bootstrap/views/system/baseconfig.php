<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'baseconfig-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
//      'htmlOptions'=>array('class'=>'well'),
      'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    )); ?>

      <?php echo $form->textFieldRow($model, 'SiteName'); ?>
      <?php echo $form->textFieldRow($model, 'SiteAdminEmail'); ?>
      <?php echo $form->textAreaRow($model, 'SiteKeywords', array(
        'hint'=> '多个关键字逗号分隔'
    )); ?>
      <?php echo $form->textAreaRow($model, 'SiteIntro'); ?>
      <?php echo $form->textFieldRow($model, 'SiteAttachmentPath'); ?>
      <?php echo $form->textAreaRow($model, 'SiteCopyright'); ?>


      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>

    <?php $this->endWidget(); ?>

