<?php

//CMS应用参数配置
return array(
	'actionInfo'=>array(
		'saveSuccess'=>'信息添加成功！请继续添加。',
		'saveFail'=>'信息添加失败！请重新添加。',
		'updateSuccess'=>'信息更新成功！',
		'updateFail'=>'信息更新失败！请重新保存。',
		'deleteSuccess'=>'信息删除成功！',
		'deleteFail'=>'信息删除失败！',
	),
	'role'=>array(
		'1'=>'超级管理员',
		'2'=>'网站管理员',
		'3'=>'网站会员',
	),
	'roleact'=>array(
		'article_create'=>array(
			'1'=>true,
			'2'=>true,
			'3'=>true,
		)
	),
	'feedback'=>array(
		'1'=>'网站留言'
	),
	'girdpagesize'=>15,
	'menuoption'=>array(
		'content'=>array(
			'article'=>false,
			'product'=>false,
			'link'=> false,
			'picture'=>false,
			'feedback'=> false,
			'job'=>false,
            'video' => true,
            'headline' => true,
			'school' => true,
			'live' => true,
            'autoupgrade' => true,
            'edunotification' => true,
		),
	),
	'seo'=>false,
	'urltarget'=>array(
		'_blank'=>'在新页面打开',
		'_self'=>'在当前页打开',
	),
	'school' => array(
		'stage' => array(
			'0' => '请选择',
			'1' => '幼儿园',
			'2' => '小学',
			'3' => '中学',			
		),
		'property' => array(
			'0' => '请选择',
			'1' => '公办',
			'2' => '民办',
		),
		'type' => array(
			'0' => '请选择',
			'1' => '全日制',
			'2' => '分科补习',
		),
        'region' => array(
            '0' => '请选择',
            '1' => '黄浦区',
            '2' => '卢湾区',
            '3' => '徐汇区',
            '4' => '长宁区',
            '5' => '静安区',
            '6' => '普陀区',
            '7' => '闸北区',
            '8' => '虹口区',
            '9' => '杨浦区',
            '10' => '闵行区',
            '11' => '宝山区',
            '12' => '嘉定区',
            '13' => '浦东新区',
            '14' => '金山区',
            '15' => '松江区',
            '16' => '青浦区',
            '17' => '南汇区',
            '18' => '崇明县',            
        )
	),
	'recommend'=>array(
		'article_display'=>false,
		'product_display'=>false,
        'video_display'=>true,
        'headline_display'=>true,
		'school_display'=> false,
		'live_display'=>true,
		'article'=>array(
			'0'=>'请选择',
			'1'=>'推荐',
		),
		'product'=>array(
			'0'=>'请选择',
			'1'=>'推荐',
		),
		'video'=>array(
			'0'=>'请选择',
			'1'=>'推荐',
		), 
		'headline'=>array(
			'0'=>'请选择',
			'1'=>'推荐',
		), 
		'school'=>array(
			'0'=>'请选择',
			'1'=>'推荐',
		), 
		'live'=>array(
			'0'=>'请选择',
			'1'=>'推荐',
		), 		
	),
    'week' => array(
        '1'=>'周一',
        '2'=>'周二',
        '3'=>'周三',
        '4'=>'周四',
        '5'=>'周五',
        '6'=>'周六',
        '7'=>'周日',
    ),
    'statusLabel' => array(
        '0' => '审核中',
        '-1' => '已删除',
        '1' => '已通过',
    ),
    'statusAction' => array(
        '0' => '不通过审核',
        '1' => '通过审核', 
    ),
    'recommendLevel' => array(
        '不推荐',
        '首页推荐',
        '本栏目推荐',
    ),
);
