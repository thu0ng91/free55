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
<button class="sexybutton" onclick="window.location='<?php echo Yii::app()->createUrl('category/create',array('menupanel'=>$_GET['menupanel'],'module'=>$_GET['module']));?>'"><span><span><span class="ok">新增标签</span></span></span></button>

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
    		'name'=>'id',
    		'value'=>'$data->id',
    		'htmlOptions'=>array(
    			'width'=>'5px',
    		),
    	),
    	'title',
    	array(
    		'class'=>'CButtonColumn',
    		'header'=>'缩略图',
    		'buttons'=>array(
    			'preview'=>array(    
    				'url'=>'',
    				'imageUrl'=>BASEURL.'/resources/icons/picture.png',
    				'visible'=>'Yii::app()->controller->girdShowImg($data);',
    			),
    		),
    		'template'=>'{preview}',
    	),
    	array(
    		'class'=>'CButtonColumn',
    		'header'=>'操作',
    		'viewButtonUrl'=>'',
    		'viewButtonOptions'=>array(
    			'style'=>'display:none',
    		),
    		'updateButtonUrl'=>'Yii::app()->createUrl("category/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]"))',
    	),
    ),
));

 ?>
