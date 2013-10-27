<?php
/* @var $this SiteController */

$this->pageTitle = $book->title . "-" . Yii::app()->name;
?>

<style type="text/css">
.list-view{padding-top: 0}
.grid-view{padding-top: 0}
</style>
<div class="row">
    <?php
    $nav = $book->category->title;
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=> array(
            $nav => $this->createUrl('category/index', array('title' => $book->category->shorttitle)),
            $book->title
        ),
    ));
    ?>
</div>
<div class="row">
    <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
        'heading'=> "《" . $book->title . "》" .  $this->widget('bootstrap.widgets.TbLabel', array(
            'type' => 'default', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label' =>  "作者：" . $book->author,
        ), true),
        'encodeHeading' => false,
    )); ?>

        <p><?php echo $book->summary;?></p>

    <?php $this->endWidget(); ?>
</div>
<div class="row">
    <table class="table table-bordered">
        <tr>
            <td style="text-align: center">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'ajaxButton',
                    'url' => $this->createUrl('book/like', array('id' => $book->id)),
                    'label'=> '推荐本书',
                    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=> 'normal', // null, 'large', 'small' or 'mini'
                    'ajaxOptions' => array(
                        'type' => 'post',
//                        'url' => $this->createURL('book/like'),
                        'data' => Yii::app()->request->csrfTokenName."=".Yii::app()->request->getCsrfToken(),
                        'success'=>"js:function(vals){
                        alert(vals);
                     }",
                    ),
                )); ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'ajaxButton',
                    'url' => $this->createUrl('user/addFavourite', array('id' => $book->id)),
                    'label'=> '收藏本书',
                    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=> 'normal', // null, 'large', 'small' or 'mini'
                    'ajaxOptions' => array(
                        'type' => 'post',
//                        'url' => $this->createURL('book/like'),
                        'data' => Yii::app()->request->csrfTokenName."=".Yii::app()->request->getCsrfToken(),
                        'success'=>"js:function(vals){
                        alert(vals);
                     }",
                    ),
                )); ?>
           </td>
        </tr>
    </table>
</div>
<div class="row">
    <table class=" table table-bordered">
        <tbody>
<!--            --><?php
//            $sections = explode("\n" , $book->sections);
//            foreach ($sections as $key => $value):
//            ?>
<!--            <tr><td colspan="4">--><?php //echo $value;?><!--</td> </tr>-->
<!--            <tr>-->
            <?php
//                reset($book->chapter);
                foreach ($book->chapter as $k => $v):
//                    if ($v->chapter == $key):
            ?>
                <?php if (($k % 4) == 0): ?>
                </tr><tr>
                <?php endif;?>
                <td><a href="<?php echo $this->createUrl('article/view', array('id' => $v->id));?>"><?php echo $v->title;?></a></td>
            <?php
//                endif;
                endforeach;
            ?>
            </tr>
<!--            --><?php
//                endforeach;
//            ?>
        </tbody>
    </table>
</div>