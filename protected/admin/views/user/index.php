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
<button class="sexybutton sexysimple sexylarge" onclick="window.location='<?php echo Yii::app()->createUrl('user/create',array('menupanel'=>'usermanager|user|user_create'));?>'">新增用户</button>
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
    	'username',
    	array(
    		'name'=>'roleid',
    		'value'=>'Yii::app()->params[role][$data->roleid]',
    		'htmlOptions'=>array(
    			'width'=>'70',
    			'align'=>'center',
    		),
    	),
    	array(
    		'name'=>'login_hits',
    		'value'=>'$data->login_hits',
    		'htmlOptions'=>array(
    			'width'=>'70px',
    			'align'=>'center',
    		),
    	),
    	array(
    		'name'=>'lastlogin_time',
    		'value'=>'date("Y-m-d",$data->lastlogin_time)',
    		'htmlOptions'=>array(
    			'width'=>'90px',
    			'align'=>'center',
    		),
    		'visible'=>'false',
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
    		'class'=>'CButtonColumn',
    		'header'=>'操作',
    		'viewButtonUrl'=>'',
    		'viewButtonOptions'=>array(
    			'style'=>'display:none',
    		),
    		'updateButtonUrl'=>'Yii::app()->createUrl("user/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]"))',
    	),
    ),
));
 ?>
