<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php
    $menus = Category::getMenus();

    $leftItems = array(
//        array('label'=>'Home', 'url'=>array('/site/index')),
//        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//        array('label'=>'Contact', 'url'=>array('/site/contact')),
//        array('label'=>'登陆', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//        array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
    );

    foreach ($menus as $v) {
        $item = array(
            'label' => $v['title'],
            'url' => $this->createUrl('category/index', array('title' => $v['shorttitle'])),
            'active' => $_GET['title'] == $v['shorttitle'] ? true : false,
        );
//        $items[] = $item;
        array_unshift($leftItems, $item);
    }

    $this->widget('bootstrap.widgets.TbNavbar',array(
        'type' => 'inverse',
        'items' => array(
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'items'=> $leftItems,
            ),
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'htmlOptions'=>array('class'=>'pull-right'),
                'items'=> array(
                    array('label'=>'登陆', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                )
            ),
        ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name; ?> <br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
