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
<button class="sexybutton sexysimple sexylarge" onclick="window.location='<?php echo Yii::app()->createUrl('video/create',array('menupanel'=>'content|video|video_create','cid'=>$_GET['cid']));?>'">新增视频</button>
<?php $this->widget('SearchForm',array('categorys'=>$categorys));?>
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
    		'name'=>'视频编号',
    		//'value'=>'$row+1',
            'value' => '$data->id',
    		'htmlOptions'=>array(
    			'width'=>'50px',
    		),
    	),
    	array(
            'name' => 'title',
            //'footer' => '<button type="button" onclick=";" style="width:76px">批量删除</button>',
        ),
    	array(
    		'name'=>'cid',
    		'value'=>'$data->category->title',
    		'htmlOptions'=>array(
    			'width'=>'80px',
    			'align'=>'center',
    		),
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
//    	array(
//    		'name'=>'hits',
//    		'value'=>'$data->hits',
//    		'htmlOptions'=>array(
//    			'width'=>'40px',
//    			'align'=>'center',
//    		),
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
            'template' => '{update}{delete}',
    		'viewButtonUrl'=>'Yii::app()->controller->showViewUrl("article",$data)',
    		'viewButtonOptions'=>array('target'=>'_blank'),
    		'updateButtonUrl'=>'Yii::app()->createUrl("video/update",array("id"=>"$data->id","menupanel"=>"$_GET[menupanel]","cid"=>"$_GET[cid]","title"=>"$_GET[title]"))',
    	),
    ),
));
 ?>
