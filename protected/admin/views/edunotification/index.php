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
<button class="sexybutton sexysimple sexylarge" onclick="window.location='<?php echo Yii::app()->createUrl('edunotification/create',array('menupanel'=>'content|edunotification|edunotification_create','cid'=>$_GET['cid']));?>'">发布通知</button>
<?php //$this->widget('SearchForm',array('categorys'=>$categorys));?>
</div>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'pager'=>Yii::app()->params['pager'],
    'ajaxUpdate'=>false,
    'columns'=>array(
    	array(
            'selectableRows' => 2,
    		'class'=>'CCheckBoxColumn',
           // 'footer' => '<button type="button" onclick=";" style="width:76px">批量删除</button>',
    		'value'=>'$data->id',
    		'htmlOptions'=>array(
    			'width'=>'5px',
                //'name' => 'selectids[]',
    		),
            'checkBoxHtmlOptions' => array('name' => 'selectids[]'), 
    	),
    	array(
    		'name'=>'序号',
    		'value'=>'$row+1',
    		'htmlOptions'=>array(
    			'width'=>'5px',
    		),
    	),
    	array(
            'name' => 'title',
            //'footer' => '<button type="button" onclick=";" style="width:76px">批量删除</button>',
        ),
//    	array(
//    		'class'=>'CButtonColumn',
//    		'header'=>'缩略图',
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
    		'value'=>'date("Y-m-d H:i:s", $data->createtime)',
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
    		//'class'=>'CButtonColumn',
    		'name'=>'status',
            'sortable' => true,
            'value' => 'Yii::app()->params[statusLabel][$data->status]',
    		//'viewButtonUrl'=>'Yii::app()->controller->showViewUrl("article",$data)',
    		//'viewButtonOptions'=>array('target'=>'_blank'),
    		//'updateButtonUrl'=>'Yii::app()->createUrl("edunotification/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]","cid"=>"$_GET[cid]","title"=>"$_GET[title]"))',
    	),        
    	array(
    		'class'=>'CButtonColumn',
    		'header'=>'操作',
            'template' => '{update}{delete}',
    		//'viewButtonUrl'=>'Yii::app()->controller->showViewUrl("article",$data)',
    		//'viewButtonOptions'=>array('target'=>'_blank'),
    		'updateButtonUrl'=>'Yii::app()->createUrl("edunotification/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]","cid"=>"$_GET[cid]","title"=>"$_GET[title]"))',
    	),
    ),
));
 ?>
