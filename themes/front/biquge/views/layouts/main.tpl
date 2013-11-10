<!doctype html>
<html>
<head>
<title>{Yii::app()->name}_书友最值得收藏的网络小说阅读网</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="{Yii::app()->name},网络小说,小说阅读网,小说,biquge" />
<meta name="description" content="{Yii::app()->name}是广大书友最值得收藏的网络小说阅读网，网站收录了当前最火热的网络小说，免费提供高质量的小说最新章节，是广大网络小说爱好者必备的小说阅读网。" />
<link rel="stylesheet" type="text/css" href="{Yii::app()->theme->baseUrl}/css/biquge.css"/>
<script type="text/javascript" src="{Yii::app()->theme->baseUrl}/js/jquery.min.js"></script>
<script type="text/javascript" src="{Yii::app()->theme->baseUrl}/js/m.js"></script>
<script type="text/javascript" src="{Yii::app()->theme->baseUrl}/js/bqg.js"></script>
</head>
<body>
	<div id="wrapper">
		{*<script>login();</script>*}
		<div class="header">
			<div class="header_logo">
				<a href="{Yii::app()->baseUrl}">笔趣阁</a>
			</div>
			{*<script>bqg_panel();</script>*}
		</div>
		<div class="nav">
			<ul>
				<li><a href="{Yii::app()->baseUrl}">首页</a></li>
                {*{foreach Category::getMenus() as $menu}*}
                    {*{assign var="url" value=$this->createUrl('category/index', ['title' => $menu.shorttitle])}*}
                    {*<li><a href="{menulink menu=$menu}">{$menu.title}</a></li>*}
                {*{/foreach}*}

                {novel_menu name="top_menu"}
                    <li><a href="{novel_category_link id=$item->id}">{$item->title}</a></li>
                {/novel_menu}
			</ul>
		</div>

	<div id="main">
	{$content}
		<div id="firendlink">
		友情连接：<a href="http://www.biquge.com/" target="_blank">小说阅读网</a><a href="http://www.biquge.com/5_5419/" target="_blank">神级英雄最新章节</a><a href="http://www.biquge.com/4_4553/" target="_blank">修仙狂徒最新章节</a><a href="http://www.biquge.com/4_4901/" target="_blank">不败战神最新章节</a><a href="http://www.biquge.com/4_4385/" target="_blank">天骄无双最新章节</a><a href="http://www.kting.cn" target="_blank">酷听网</a><a href="http://www.qisuu.com" target="_blank">奇书网</a><a href="http://www.zhaoxiaoshuo.com/" target="_blank">找小说</a><a href="http://www.pingshu8.com" target="_blank">评书吧</a><a href="http://www.shushuw.cn/" target="_blank">书书网</a><a href="http://www.3gsc.com.cn" target="_blank">3G小说网</a><a href="http://www.3533.com" target="_blank">手机世界</a><a href="http://www.ysx8.net/" target="_blank">有声下吧</a><a href="http://www.59to.com/" target="_blank">伍九文学</a><a href="http://www.bxwx.org" target="_blank">笔下文学</a><a href="http://www.23hh.com/" target="_blank">爱尚小说网</a><a href="http://www.kanshu.com" target="_blank">小说阅读网</a><a href="http://www.5tps.com/" target="_blank">我听评书网</a><a href="http://www.sxcnw.net/" target="_blank">书香电子书</a><a href="http://www.qingkan.net" target="_blank">请看小说网</a><a href="http://www.aitxt.com/" target="_blank">爱txt电子书</a><a href="http://www.qududu.com" target="_blank">去读读小说网</a><a href="http://read.guanhuaju.com/" target="_blank">冠华居小说网</a>(邮箱见顶端)
		</div>
		<div class="footer">
			<div class="footer_link"></div>
			<div class="footer_cont">
				{*<script>footer();</script>*}
			</div>
		</div>
	</div>

        {debug}
</body>
</html>