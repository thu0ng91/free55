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
    <table class=" table table-bordered">
        <tbody>
            <tr>
            <?php foreach ($book->chapter as $k => $v): ?>
                <?php if (($k + 1) % 4 == 0): ?>
                </tr><tr>
                <?php endif;?>
                <td><a href="<?php echo $this->createUrl('article/view', array('id' => $v->id));?>"><?php echo $v->title;?></a></td>
            <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</div>