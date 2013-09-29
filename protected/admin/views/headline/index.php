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
<button class="sexybutton sexysimple sexylarge" onclick="window.location='<?php echo Yii::app()->createUrl('headline/create',array('menupanel'=>'content|headline|headline_create'));?>'">新增头图</button>
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
    		'name'=>'create_time',
    		'value'=>'date("Y-m-d H:i:s",$data->create_time)',
    		'htmlOptions'=>array(
    			'width'=>'110px',
    			'align'=>'center',
    		),
    		'visible'=>'false',
    	),
//    	array(
//    		'name'=>'update_time',
//    		'value'=>'date("Y-m-d",$data->update_time)',
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
    		'updateButtonUrl'=>'Yii::app()->createUrl("headline/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]"))',
    	),
    ),
));
 ?>
