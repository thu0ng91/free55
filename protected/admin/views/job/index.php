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
<button class="sexybutton sexysimple sexylarge" onclick="window.location='<?php echo Yii::app()->createUrl('job/create',array('menupanel'=>'content|job|job_create'));?>'">添加招聘职位</button>
<?php $this->widget('SearchForm',array('categorys'=>$categorys));?>
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
    	array(
    		'name'=>'cid',
    		'value'=>'$data->category->title',
    		'htmlOptions'=>array(
    			'width'=>'80px',
    			'align'=>'center',
    		),
    	),
    	array(
    		'name'=>'create_time',
    		'value'=>'date("Y-m-d",$data->create_time)',
    		'htmlOptions'=>array(
    			'width'=>'70px',
    			'align'=>'center',
    		),
    		'visible'=>'false',
    	),
    	array(
    		'name'=>'update_time',
    		'value'=>'date("Y-m-d",$data->update_time)',
    		'htmlOptions'=>array(
    			'width'=>'70px',
    			'align'=>'center',
    		),
    		'visible'=>'false',
    	),
    	array(
    		'name'=>'end_time',
    		'value'=>'date("Y-m-d",$data->end_time)',
    		'htmlOptions'=>array(
    			'width'=>'70px',
    			'align'=>'center',
    		),
    		'visible'=>'false',
    	),
    	array(
    		'class'=>'CButtonColumn',
    		'header'=>'操作',
    		'viewButtonUrl'=>'Yii::app()->createUrl("job/view",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]"))',
    		'updateButtonUrl'=>'Yii::app()->createUrl("job/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]"))',
    	),
    ),
));
 ?>
