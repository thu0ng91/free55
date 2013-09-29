<?php $this->beginContent('/layouts/main'); ?>
<div region="north" style="height:65px;border:0px;">
	<div id="nav">
		<div class="logo_admin"></div>
		<div class="toolbar"></div>
		<div id="menu">
			<button class="sexybutton sexysimple sexylarge <?php if($this->menupanel[0]=='content') echo 'sexymagenta';?>" url="<?php echo Yii::app()->createUrl('site/index',array('menupanel'=>'content'));?>">内容管理</button>
			<!--<button class="sexybutton sexysimple sexylarge sexygreen" url='<?php echo Yii::app()->createUrl('site/index',array('menupanel'=>'content|short|sitemap'));?>'>网站导航</button>-->
            <?php if (Yii::app()->user->userInfo->roleid <= 1): ?>
			<button class="sexybutton sexysimple sexylarge <?php if($this->menupanel[0]=='usermanager') echo 'sexymagenta';?>" url="<?php echo Yii::app()->createUrl('site/index',array('menupanel'=>'usermanager'));?>">用户管理</button>
			<!--<button class="sexybutton sexysimple sexylarge <?php if($this->menupanel[0]=='optionmanager') echo 'sexymagenta';?>" url="<?php echo Yii::app()->createUrl('site/index',array('menupanel'=>'optionmanager'));?>">系统设置</button>-->
            <?php endif; ?>
			<button class="sexybutton sexysimple sexylarge" url="<?php echo Yii::app()->createUrl('site/logout');?>">退出系统</button>
		</div>
		<div id="technology">技术支持：<a href="http://www.smg.cn/" target="_blank"><b>SMG-技术运营中心-网络工程部-软件系统科</b></a></div>
	</div>
</div>

<?php
if($this->menupanel[0]==='content'):
?>
<div region="west" split="true" title="内容管理" iconCls="icon-cash" style="width:185px;padding1:1px;overflow:hidden;">
	<div class="easyui-accordion" fit="true" border="false">

	<?php if(Yii::app()->params['menuoption']['content']['video'] && Yii::app()->user->userInfo->roleid <= 1){ ?>	
		<div title="视频管理"  <?php if($this->menupanel[1]==='video')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='video_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('video/create',array('menupanel'=>'content|video|video_create'));?>">新增视频</a>
				</li>
				<li <?php if($this->menupanel[2]==='video_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('video/index',array('menupanel'=>'content|video|video_index'));?>">视频管理</a>
				</li>
				<li <?php if($this->menupanel[2]==='video_category')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('category/index',array('menupanel'=>'content|video|video_category','module'=>Yii::app()->params['module']['video']));?>">视频标签</a>
				</li>
			</ul>
		</div>
	<?php }?>  
    
  	<?php if(Yii::app()->params['menuoption']['content']['headline'] && Yii::app()->user->userInfo->roleid <= 1){ ?>	
		<div title="头图管理"  <?php if($this->menupanel[1]==='headline')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='headline_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('headline/create',array('menupanel'=>'content|headline|headline_create'));?>">新增头图</a>
				</li>
				<li <?php if($this->menupanel[2]==='headline_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('headline/index',array('menupanel'=>'content|headline|headline_index'));?>">头图管理</a>
				</li>
			</ul>
		</div>
	<?php }?> 
        
  	<?php if(Yii::app()->params['menuoption']['content']['live'] && Yii::app()->user->userInfo->roleid <= 1){ ?>	
		<div title="直播管理"  <?php if($this->menupanel[1]==='live')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='live_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('live/create',array('menupanel'=>'content|live|live_create'));?>">新增直播</a>
				</li>
				<li <?php if($this->menupanel[2]==='live_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('live/index',array('menupanel'=>'content|live|live_index'));?>">直播管理</a>
				</li>
			</ul>
		</div>
	<?php }?>  

  	<?php if(Yii::app()->params['menuoption']['content']['school'] && Yii::app()->user->userInfo->roleid <= 2){ ?>	
		<div title="学校管理"  <?php if($this->menupanel[1]==='school')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='school_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('school/create',array('menupanel'=>'content|school|school_create'));?>">新增学校</a>
				</li>
				<li <?php if($this->menupanel[2]==='school_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('school/index',array('menupanel'=>'content|school|school_index'));?>">学校管理</a>
				</li>
			</ul>
		</div>
	<?php }?> 		
	
	<?php if(Yii::app()->params['menuoption']['content']['article'] && Yii::app()->user->userInfo->roleid <= 1){ ?>
		<div title="文章"  <?php if($this->menupanel[1]==='article')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='article_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('article/create',array('menupanel'=>'content|article|article_create'));?>">新增文章</a>
				</li>
				<li <?php if($this->menupanel[2]==='article_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('article/index',array('menupanel'=>'content|article|article_index'));?>">文章管理</a>
				</li>
				<li <?php if($this->menupanel[2]==='article_category')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('category/index',array('menupanel'=>'content|article|article_category','module'=>Yii::app()->params['module']['article']));?>">栏目管理</a>
				</li>
			</ul>
		</div>
	<?php }?>
	
	<?php if(Yii::app()->params['menuoption']['content']['product'] && Yii::app()->user->userInfo->roleid <= 1){ ?>
		<div title="产品"  <?php if($this->menupanel[1]==='product')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='product_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('product/create',array('menupanel'=>'content|product|product_create'));?>">新增产品</a>
				</li>
				<li <?php if($this->menupanel[2]==='product_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('product/index',array('menupanel'=>'content|product|product_index'));?>">产品管理</a>
				</li>
				<li <?php if($this->menupanel[2]==='product_category')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('category/index',array('menupanel'=>'content|product|product_category','module'=>Yii::app()->params['module']['product']));?>">产品分类</a>
				</li>
				<li <?php if($this->menupanel[2]==='brand_category')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('category/index',array('menupanel'=>'content|product|brand_category','module'=>Yii::app()->params['module']['brand']));?>">品牌管理</a>
				</li>
			</ul>
		</div>
	<?php }?>	

		
	<?php if(Yii::app()->params['menuoption']['content']['link'] && Yii::app()->user->userInfo->roleid <= 1){ ?>	
		<div title="链接"  <?php if($this->menupanel[1]==='link')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='link_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('link/create',array('menupanel'=>'content|link|link_create'));?>">新增链接</a>
				</li>
				<li <?php if($this->menupanel[2]==='link_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('link/index',array('menupanel'=>'content|link|link_index'));?>">链接管理</a>
				</li>
				<li <?php if($this->menupanel[2]==='link_category')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('category/index',array('menupanel'=>'content|link|link_category','module'=>Yii::app()->params['module']['link']));?>">链接分类</a>
				</li>
			</ul>
		</div>
	<?php }?>	
		
	<?php if(Yii::app()->params['menuoption']['content']['picture'] && Yii::app()->user->userInfo->roleid <= 1){ ?>		
		<div title="图片广告"  <?php if($this->menupanel[1]==='picture')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='picture_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('picture/create',array('menupanel'=>'content|picture|picture_create'));?>">新增图片广告</a>
				</li>
				<li <?php if($this->menupanel[2]==='picture_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('picture/index',array('menupanel'=>'content|picture|picture_index'));?>">图片广告管理</a>
				</li>
				<li <?php if($this->menupanel[2]==='picture_category')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('category/index',array('menupanel'=>'content|picture|picture_category','module'=>Yii::app()->params['module']['picture']));?>">图片广告分类</a>
				</li>
			</ul>
		</div>
	<?php }?>		

	<?php if(Yii::app()->params['menuoption']['content']['edunotification'] && Yii::app()->user->userInfo->roleid <= 1){ ?>
		<div title="上海教委通知"  <?php if($this->menupanel[1]==='edunotification')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='edunotification_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('edunotification/create',array('menupanel'=>'content|edunotification|edunotification_create'));?>">发布通知</a>
				</li>
				<li <?php if($this->menupanel[2]==='edunotification_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('edunotification/index',array('menupanel'=>'content|edunotification|edunotification_index'));?>">管理通知</a>
				</li>
			</ul>
		</div>
	<?php }?>
        
	<?php if(Yii::app()->params['menuoption']['content']['autoupgrade'] && Yii::app()->user->userInfo->roleid <= 1){ ?>
		<div title="APP升级维护"  <?php if($this->menupanel[1]==='autoupgrade')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='autoupgrade_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('autoupgrade/create',array('menupanel'=>'content|autoupgrade|autoupgrade_create'));?>">发布新版本</a>
				</li>
				<li <?php if($this->menupanel[2]==='autoupgrade_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('autoupgrade/index',array('menupanel'=>'content|autoupgrade|autoupgrade_index'));?>">历史版本管理</a>
				</li>
			</ul>
		</div>
	<?php }?>
        
	<?php if(Yii::app()->params['menuoption']['content']['feedback'] && Yii::app()->user->userInfo->roleid <= 1){ ?>
		<div title="留言反馈"  <?php if($this->menupanel[1]==='feedback')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='feedback_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('feedback/create',array('menupanel'=>'content|feedback|feedback_create'));?>">新增留言反馈</a>
				</li>
				<li <?php if($this->menupanel[2]==='feedback_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('feedback/index',array('menupanel'=>'content|feedback|feedback_index'));?>">留言反馈管理</a>
				</li>
			</ul>
		</div>
	<?php }?>
	
	<?php if(Yii::app()->params['menuoption']['content']['job'] && Yii::app()->user->userInfo->roleid <= 1){ ?>	
		<div title="招聘职位"  <?php if($this->menupanel[1]==='job')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='job_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('job/create',array('menupanel'=>'content|job|job_create'));?>">新增招聘职位</a>
				</li>
				<li <?php if($this->menupanel[2]==='job_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('job/index',array('menupanel'=>'content|job|job_index'));?>">招聘职位管理</a>
				</li>
				<li <?php if($this->menupanel[2]==='job_category')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('category/index',array('menupanel'=>'content|job|job_category','module'=>Yii::app()->params['module']['job']));?>">招聘职位分类</a>
				</li>
			</ul>
		</div>
	<?php }?>
        
	</div>
</div>
<?php
endif;
if($this->menupanel[0]==='usermanager' && Yii::app()->user->userInfo->roleid <= 1):
?>
<div region="west" split="true" title="用户管理" iconCls="icon-cash" style="width:185px;padding1:1px;overflow:hidden;">
	<div class="easyui-accordion" fit="true" border="false">
	
		<div title="用户管理" <?php if($this->menupanel[1]==='user')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='user_create')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('user/create',array('menupanel'=>'usermanager|user|user_create'));?>">新增用户</a>
				</li>
				<li <?php if($this->menupanel[2]==='user_index')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('user/index',array('menupanel'=>'usermanager|user|user_index'));?>">用户管理</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php
endif;
if($this->menupanel[0]==='optionmanager' && Yii::app()->user->userInfo->roleid <= 1):
?>
<div region="west" split="true" title="系统设置" iconCls="icon-cash" style="width:185px;padding1:1px;overflow:hidden;">
	<div class="easyui-accordion" fit="true" border="false">
		<div title="系统设置" <?php if($this->menupanel[1]==='system')echo "selected='true'";?>>
			<ul class="vlist">
				<li <?php if($this->menupanel[2]==='site')echo "class='active'";?>>
					<a href="<?php echo Yii::app()->createUrl('option/update',array('menupanel'=>'optionmanager|system|site'));?>">网站参数设置</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php
endif;
?>

<div region="center" title="操作面板" id="content">
        <?php echo $content?>
</div>









<?php $this->endContent(); ?>







