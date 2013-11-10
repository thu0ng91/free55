<?php
/* @var $this SiteController */

$this->pageTitle = $type == 1 ? "我的推荐" : "我的收藏" . " - " . Yii::app()->name;
?>

<style type="text/css">
.list-view{padding-top: 0}
.grid-view{padding-top: 0}
</style>

    <?php
//    $nav1 = "我的收藏";
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=> array(
//            $nav1 => $this->createUrl('category/index', array('title' => $chapter->book->category->shorttitle)),
//            $nav2 => $this->createUrl('book/view', array('id' => $chapter->book->id)),
            $type == 1 ? '我的推荐' : '我的收藏',
        ),
    ));
    ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=> $dataProvider,
    'template'=>"{items}",
    'columns'=>array(
//        array('name'=>'id', 'header'=>'#'),
//        array('name'=>'id', 'header' => '#'),
        array('name'=> 'title', 'type' => 'html', 'value' => '"<a href=\"" . Yii::app()->controller->createUrl("book/view", array("id" => $data->bookid)) . "\">" . $data->title . "</a>"'),
        array('name'=> 'createtime', 'value' => 'date("Y-m-d H:i:s", $data->createtime)'),
//        array('name'=>'language', 'header'=>'Language'),
//        array(
//            'class'=>'bootstrap.widgets.TbButtonColumn',
//            'template'=>"{update}{delete}",
//            'htmlOptions'=>array('style'=>'width: 50px'),
//        ),
    ),
)); ?>