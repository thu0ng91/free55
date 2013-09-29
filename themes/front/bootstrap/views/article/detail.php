<?php
/* @var $this SiteController */

$this->pageTitle = $chapter->title . " - " . $chapter->book->title . " - " . Yii::app()->name;
?>

<style type="text/css">
.list-view{padding-top: 0}
.grid-view{padding-top: 0}
</style>
<div class="row">
    <?php
    $nav1 = $chapter->book->category->title;
    $nav2 = $chapter->book->title;
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=> array(
            $nav1 => $this->createUrl('category/index', array('title' => $chapter->book->category->shorttitle)),
            $nav2 => $this->createUrl('book/view', array('id' => $chapter->book->id)),
            $chapter->title
        ),
    ));
    ?>
</div>
<div class="row">
    <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
        'heading'=> $chapter->title  .  $this->widget('bootstrap.widgets.TbLabel', array(
            'type' => 'default', // 'success', 'warning', 'important', 'info' or 'inverse'
            'label' =>  "作者：" . $chapter->book->author,
        ), true),
        'encodeHeading' => false,
    )); ?>

        <p><?php echo $chapter->content;?></p>

    <?php $this->endWidget(); ?>
</div>

<div class="row">
    <table class=" table table-bordered">
        <tbody>
        <tr>
            <td width="50%">上一章：<a href="<?php echo $this->createUrl('article/view', array('id' => $prevChapter->id));?>"><?php echo $prevChapter->title;?></a></td>
            <td>下一章：<a href="<?php echo $this->createUrl('article/view', array('id' => $nextChapter->id));?>"><?php echo $nextChapter->title;?></a></td>
        </tr>
        </tbody>
    </table>
</div>