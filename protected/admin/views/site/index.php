<H4 align='center'>你好，<span style="color:blue"><?php echo Yii::app()->user->name;?></span> ! 欢迎使用 <?php echo Yii::app()->name; ?></H4>
<!--网站导航-->
<style>
#sitemap_div div{float:left;}
</style>
<?php if($this->menupanel[2]==='sitemap'):?>
	<script type="text/javascript">
		$(function(){
			$('#sitemap_div').window('open');
		});
	</script>
<?php endif;?>	
<div id="sitemap_div" class="easyui-window" title="网站导航" iconCls="icon-save" class="easyui-window" minimizable="false" maximizable="false" closed="true" modal="true" style="width:925px;height:525px;padding:5px;background:#fafafa;">
<?php if(Yii::app()->params['menuoption']['content']['article']){ ?>	
<div class="easyui-panel" title="新闻栏目" icon="icon-save" collapsible="true" minimizable="false" maximizable="false" closable="false" style="width:300px;height:240px;">
		<ul class="vlist" style="text-align:left;">
		<?php 
		$articlecategorys=Category::model()->findAll('module='.Yii::app()->params['module']['article']);
		$articlecategoryList=array();
		Category::model()->showAllCategory($articlecategoryList,$articlecategorys);
		foreach($articlecategoryList as $vo):
		?>
		<li><a href="<?php echo Yii::app()->createUrl('article/index',array('menupanel'=>'content|article|article_index','cid'=>$vo->id));?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo->title;?></a></li>
		<?php 
		endforeach;
		?>
	</ul>
</div>
<?php }?>	
<?php if(Yii::app()->params['menuoption']['content']['product']){ ?>	
<div class="easyui-panel" title="产品分类" icon="icon-save" collapsible="true" minimizable="false" maximizable="false" closable="flase" style="width:300px;height:240px;">
		<ul class="vlist"  style="text-align:left;">
		<?php 
		$productcategorys=Category::model()->findAll('module='.Yii::app()->params['module']['product']);
		$productcategoryList=array();
		Category::model()->showAllCategory($productcategoryList,$productcategorys);
		foreach($productcategoryList as $vo):
		?>
		<li><a href="<?php echo Yii::app()->createUrl('product/index',array('menupanel'=>'content|product|product_index','cid'=>$vo->id));?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo->title;?></a></li>
		<?php 
		endforeach;
		?>
	</ul>
</div>
<?php }?>	


<?php if(Yii::app()->params['menuoption']['content']['link']){ ?>
<div class="easyui-panel" title="链接分类" icon="icon-save" collapsible="true" minimizable="false" maximizable="false" closable="flase" style="width:300px;height:240px;">
	<ul class="vlist"  style="text-align:left;">
		<?php 
		$linkcategorys=Category::model()->findAll('module='.Yii::app()->params['module']['link']);
		$linkcategoryList=array();
		Category::model()->showAllCategory($linkcategoryList,$linkcategorys);
		foreach($linkcategoryList as $vo):
		?>
		<li><a href="<?php echo Yii::app()->createUrl('link/index',array('menupanel'=>'content|link|link_index','cid'=>$vo->id));?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo->title;?></a></li>
		<?php 
		endforeach;
		?>
	</ul>
</div>
<?php }?>

<?php if(Yii::app()->params['menuoption']['content']['picture']){ ?>
<div class="easyui-panel" title="图片分类" icon="icon-save" collapsible="true" minimizable="false" maximizable="false" closable="flase" style="width:300px;height:240px;">
	<ul class="vlist"  style="text-align:left;">
		<?php 
		$picturecategorys=Category::model()->findAll('module='.Yii::app()->params['module']['picture']);
		$picturecategoryList=array();
		Category::model()->showAllCategory($picturecategoryList,$picturecategorys);
		foreach($picturecategoryList as $vo):
		?>
		<li><a href="<?php echo Yii::app()->createUrl('picture/index',array('menupanel'=>'content|picture|picture_index','cid'=>$vo->id));?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo->title;?></a></li>
		<?php 
		endforeach;
		?>
	</ul>
</div>
<?php }?>	
	

<?php if(Yii::app()->params['menuoption']['content']['feedback']){ ?>
<div class="easyui-panel" title="留言反馈" icon="icon-save" collapsible="true" minimizable="false" maximizable="false" closable="flase" style="width:300px;height:240px;">
	<ul class="vlist"  style="text-align:left;">
	
		<li><a href="<?php echo Yii::app()->createUrl('feedback/index',array('menupanel'=>'content|feedback|feedback_index','cid'=>$vo->id));?>">&nbsp;&nbsp;&nbsp;&nbsp;网站留言</a></li>
		
	</ul>
</div>
<?php }?>	

<?php if(Yii::app()->params['menuoption']['content']['job']){ ?>
<div class="easyui-panel" title="招聘分类" icon="icon-save" collapsible="true" minimizable="false" maximizable="false" closable="flase" style="width:300px;height:240px;">
	<ul class="vlist"  style="text-align:left;">
		<?php 
		$jobcategorys=Category::model()->findAll('module='.Yii::app()->params['module']['job']);
		$jobcategoryList=array();
		Category::model()->showAllCategory($jobcategoryList,$jobcategorys);
		foreach($jobcategoryList as $vo):
		?>
		<li><a href="<?php echo Yii::app()->createUrl('job/index',array('menupanel'=>'content|job|job_index','cid'=>$vo->id));?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo->title;?></a></li>
		<?php 
		endforeach;
		?>
	</ul>
</div>
<?php }?>
<!--网站导航-->