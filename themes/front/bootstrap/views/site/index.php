<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<style type="text/css">
.list-view{padding-top: 0}
.grid-view{padding-top: 0}
</style>

<div class="row">
    <div class="span8">
        <?php
            $this->widget('bootstrap.widgets.TbTabs', array(
                'type' => 'tabs', // 'tabs' or 'pills'
                'tabs' => array(
                    array(
                        'label' => '热门推荐',
                        'active' => true,
                        'content'=> $this->widget('bootstrap.widgets.TbThumbnails', array(
                            'dataProvider'=> $recommendDataProvider,
                            'template'=>"{items}",
                            'itemView'=>'_thumb',
                        ), true),
                    ),
                    array(
                        'label' => '最新小说',
                        'content'=> $this->widget('bootstrap.widgets.TbThumbnails', array(
                            'dataProvider'=> $newestDataProvider,
                            'template'=>"{items}",
                            'itemView'=>'_thumb',
                        ), true),
                        'active' => false,
                    ),
                )
            ));
        ?>

        <div class="row">
            <div class="span8">
                <?php $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
                    'stacked'=>false, // whether this is a stacked menu
                    'items'=>array(
                        array('label'=>'最近更新', 'url'=>'#', 'active'=>true),
                    ),
                )); ?>
                <?php $this->widget('bootstrap.widgets.TbGridView', array(
                    'type'=>'condensed',
                    'dataProvider' => $lastUpdateDataProvider,
                    'template'=>"{items}",
                    'hideHeader' => true,
                    'columns'=>array(
                        array(
                            'name' => 'cid',
                            'type' => 'raw',
                            'value' => '"[" . $data->category->title . "]"',
                            'htmlOptions' => array('style' => 'width:15%')
                        ),
                        array(
                            'name' => 'title',
                            'type' => 'raw',
                            'value' => '"<a href=\"" . Yii::app()->controller->createUrl("book/view", array("id" => $data->id)) . "\">《" . $data->title . "》</a>" . "<a href=\"" . Yii::app()->controller->createUrl("article/view", array("id" => $data->lastchapterid)) . "\">" . $data->lastchaptertitle . "</a>"',
                            'htmlOptions' => array('style' => 'width:65%')
                        ),
                        array(
                            'name' => 'author',
                            'type' => 'raw',
                            'value' => '$data->author . " (" . date("m-d", $data->lastchaptertime) . ")"',
                            'htmlOptions' => array('style' => 'width:20%')
                        ),
                        //            array(
                        //                'name'=>'imgurl',
                        //                'type' => 'html',
                        //                'value' => 'CHtml::image(Yii::app()->baseUrl . $data->imgurl, "", array("style"=>"width: 50px;height:50px"))',
                        //                'htmlOptions'=>array('style'=>'width: 20px;height:20px'),
                        //            ),
                    )
                ));
                ?>
            </div>
        </div>
    </div>
    <div clas="span2">
        <div class="row offset9">
            <div class="span2">
            <?php
                $this->widget('bootstrap.widgets.TbTabs', array(
                        'type' => 'tabs', // 'tabs' or 'pills'
                        'tabs' => array(
                            array(
                                'label' => '日榜',
                                'active' => true,
                                'content'=> $this->widget('bootstrap.widgets.TbThumbnails', array(
                                    'dataProvider'=> $dayDataProvider,
                                    'template'=>"{items}",
                                    'itemView'=>'_item',
                                ), true),
                            ),
                            array(
                                'label' => '周榜',
                                'active' => false,
                                'content'=> $this->widget('bootstrap.widgets.TbThumbnails', array(
                                    'dataProvider'=> $weekDataProvider,
                                    'template'=>"{items}",
                                    'itemView'=>'_item',
                                ), true),
                            ),
                            array(
                                'label' => '月榜',
                                'active' => false,
                                'content'=> $this->widget('bootstrap.widgets.TbThumbnails', array(
                                    'dataProvider'=> $monthDataProvider,
                                    'template'=>"{items}",
                                    'itemView'=>'_item',
                                ), true),
                            ),
                        )
                ));
            ?>
            </div>
        </div>
    </div>
</div>
