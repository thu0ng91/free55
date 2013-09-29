<?php
    $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=> true, // whether this is a stacked menu
    'htmlOptions' => array (
        'class' => 'nav-tabs',
    ),
    'items'=>array(
        array('label'=>'小说', 'url'=> $this->createUrl('site/index'), 'active'=> $this->id == 'site' ? true : false),
        array('label'=>'小说栏目管理', 'url'=> $this->createUrl('category/index'), 'active'=> $this->id == 'category' ? true : false),
        array('label'=>'小说管理', 'url'=> $this->createUrl('book/index'),  'active'=> $this->id == 'book' ? true : false),
        array('label'=>'小说章节管理', 'url'=> $this->createUrl('article/index'),  'active'=> $this->id == 'article' ? true : false),
    ),
)); ?>