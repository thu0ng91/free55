<?php
$this->widget('ActionInfo');
?>

<?php
if((int)$dataProvider->totalItemCount===0){
?>
<div style="margin:10px 0px 0px 20px">
<?php
}else{
?>
<div style="margin:10px 0px -30px 20px">
<?php
}
?>
<button class="sexybutton sexysimple sexylarge" onclick="window.location='<?php echo Yii::app()->createUrl('school/create',array('menupanel'=>'content|school|school_create'));?>'">新增学校</button>
<?php //$this->widget('SearchForm',array('categorys'=>$categorys));?>
</div>

<?php 
 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
   	'pager'=>Yii::app()->params['pager'],
    'ajaxUpdate'=>false,
    'columns'=>array(
    	array(
    		'class'=>'CCheckBoxColumn',
    		'value'=>'$data->id',
    		'htmlOptions'=>array(
    			'width'=>'5px',
    		),
    	),
    	array(
    		'name'=>'序号',
    		'value'=>'$row+1',
    		'htmlOptions'=>array(
    			'width'=>'5px',
    		),
    	),
    	'title',
//    	array(
//    		'name'=>'title',
//    		'value'=>'$data->title',
//    		'htmlOptions'=>array(
//    			'width'=>'80px',
//    			'align'=>'center',
//    		),
//    	),
//    	array(
//    		'class'=>'CButtonColumn',
//    		'header'=>'链接图',
//    		'buttons'=>array(
//    			'preview'=>array(    
//    				'url'=>'',
//    				'imageUrl'=>BASEURL.'/resources/icons/picture.png',
//    				'visible'=>'Yii::app()->controller->girdShowImg($data);',
//    			),
//    		),
//    		'template'=>'{preview}',
//    	),
    	array(
    		'name'=>'createtime',
    		'value'=>'date("Y-m-d H:i:s",$data->createtime)',
    		'htmlOptions'=>array(
    			'width'=>'110px',
    			'align'=>'center',
    		),
    		'visible'=>'false',
    	),
//    	array(
//    		'name'=>'updatetime',
//    		'value'=>'date("Y-m-d",$data->updatetime)',
//    		'htmlOptions'=>array(
//    			'width'=>'70px',
//    			'align'=>'center',
//    		),
//    		'visible'=>'false',
//    	),
    	array(
    		'class'=>'CButtonColumn',
    		'header'=>'操作',
    		'viewButtonUrl'=>'',
    		'viewButtonOptions'=>array(
    			'style'=>'display:none',
    		),
    		'updateButtonUrl'=>'Yii::app()->createUrl("school/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]"))',
    	),
    ),
));
 ?>
