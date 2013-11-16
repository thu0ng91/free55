<?php
    $menus = array();

    if ($this->menupanel[0] == 'book') {
        $menus = array(
            array('label'=>'小说栏目管理', 'url'=> $this->createUrl('category/index'), 'active'=> $this->id == 'category' ? true : false),
            array('label'=>'小说管理', 'url'=> $this->createUrl('book/index'),  'active'=> $this->id == 'book' ? true : false),
            array('label'=>'小说章节管理', 'url'=> $this->createUrl('article/index'),  'active'=> $this->id == 'article' ? true : false),
        );
    } elseif ($this->menupanel[0] == 'user') {
        $menus = array(
            array('label'=>'会员管理', 'url'=> $this->createUrl('user/index'), 'active'=> $this->id == 'user' ? true : false),
            array('label'=>'管理员管理', 'url'=> $this->createUrl('adminuser/index'), 'active'=> $this->id == 'adminuser' ? true : false),
        );
    } elseif ($this->menupanel[0] == 'system') {
        $menus = array(
            array('label'=>'基础属性', 'url'=> $this->createUrl('system/base'), 'active'=> $this->action->id == 'base' ? true : false),
            array('label'=>'伪静态设置', 'url'=> $this->createUrl('system/rewrite'), 'active'=> $this->action->id == 'rewrite' ? true : false),
        );
    } else {
        $menus = array(
            array('label'=>'小说', 'url'=> $this->createUrl('site/index'), 'active'=> $this->id == 'site' ? true : false),
        );
    }
    $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=> true, // whether this is a stacked menu
    'htmlOptions' => array (
        'class' => 'nav-tabs',
    ),
    'items'=> $menus,
)); ?>