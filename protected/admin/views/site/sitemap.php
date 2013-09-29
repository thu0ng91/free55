<?php 

	$htmlfilecontent.="<meta charset='utf-8'/><a href='http://www.qzdxwj.com' target='_blank'>网站首页</a>\n";
	$sitemapcontent="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n\t<url>\n\t\t<loc>http://www.qzdxwj.com</loc>\n\t\t<lastmod>".date("Y-m-d",time())."</lastmod>\n\t\t<changefreq>Daily</changefreq>\n\t\t<priority>1.0</priority>\n\t</url>\n";

$criteria=new CDbCriteria(array(
        	'order'=>'id desc',
    	));
$categoryList=array();
$categoryList[]=5;
Category::model()->getAllCategoryIds($categoryList,Category::model()->findAll('module='.Yii::app()->params['module']['article']),5);
$criteria->addInCondition('cid',$categoryList);
$list=Article::model()->findAll($criteria);
foreach($list as $vo){
	$url="http://www.qzdxwj.com/index.php/article/$vo->id.html";
	$htmlfilecontent.="<a href='".$url."' target='_blank' title='$vo[title]'>$vo[title]</a>\n";
	$sitemapcontent.="\t<url>\n\t\t<loc>".$url."</loc>\n\t\t<lastmod>".date("Y-m-d",$vo->create_time)."</lastmod>\n\t\t<changefreq>Monthly</changefreq>\n\t\t<priority>0.2</priority>\n\t</url>\n";
}

$list1=Article::model()->order('id desc')->findAll('cid=14');
foreach($list1 as $vo){
	$url="http://www.qzdxwj.com/index.php/baike/$vo->id.html";
	$url=str_replace('admin.php','index.php',$url);
	$htmlfilecontent.="<a href='".$url."' target='_blank' title='$vo[title]'>$vo[title]</a>\n";
	$sitemapcontent.="\t<url>\n\t\t<loc>".$url."</loc>\n\t\t<lastmod>".date("Y-m-d",$vo->create_time)."</lastmod>\n\t\t<changefreq>Monthly</changefreq>\n\t\t<priority>0.2</priority>\n\t</url>\n";
}


$criteria1=new CDbCriteria(array(
        	'order'=>'id desc',
    	));
$categoryList1=array();
$categoryList1[]=10;
Category::model()->getAllCategoryIds($categoryList1,Category::model()->findAll('module='.Yii::app()->params['module']['article']),10);
$criteria1->addInCondition('cid',$categoryList1);
$list2=Article::model()->order('id desc')->findAll($criteria1);
foreach($list2 as $vo){
	$url="http://www.qzdxwj.com/index.php/anli/$vo->id.html";
	$url=str_replace('admin.php','index.php',$url);
	$htmlfilecontent.="<a href='".$url."' target='_blank' title='$vo[title]'>$vo[title]</a>\n";
	$sitemapcontent.="\t<url>\n\t\t<loc>".$url."</loc>\n\t\t<lastmod>".date("Y-m-d",$vo->create_time)."</lastmod>\n\t\t<changefreq>Monthly</changefreq>\n\t\t<priority>0.2</priority>\n\t</url>\n";
}



$criteria2=new CDbCriteria(array(
        	'order'=>'id desc',
    	));
$categoryList2=array();
$categoryList2[]=22;
Category::model()->getAllCategoryIds($categoryList2,Category::model()->findAll('module='.Yii::app()->params['module']['product']),22);
$criteria2->addInCondition('cid',$categoryList2);
$list3=Product::model()->order('id desc')->findAll($criteria2);
foreach($list3 as $vo){
	$url="http://www.qzdxwj.com/index.php/product/$vo->id.html";
	$url=str_replace('admin.php','index.php',$url);
	$htmlfilecontent.="<a href='".$url."' target='_blank' title='$vo[title]'>$vo[title]</a>\n";
	$sitemapcontent.="\t<url>\n\t\t<loc>".$url."</loc>\n\t\t<lastmod>".date("Y-m-d",$vo->create_time)."</lastmod>\n\t\t<changefreq>Monthly</changefreq>\n\t\t<priority>0.2</priority>\n\t</url>\n";
}



$criteria3=new CDbCriteria(array(
        	'order'=>'id desc',
    	));
$categoryList3=array();
$categoryList3[]=17;
Category::model()->getAllCategoryIds($categoryList3,Category::model()->findAll('module='.Yii::app()->params['module']['article']),17);
$criteria3->addInCondition('cid',$categoryList3);
$list4=Article::model()->order('id desc')->findAll($criteria3);
foreach($list4 as $vo){
	$url="http://www.qzdxwj.com/index.php/blog/$vo->id.html";
	$url=str_replace('admin.php','index.php',$url);
	$htmlfilecontent.="<a href='".$url."' target='_blank' title='$vo[title]'>$vo[title]</a>\n";
	$sitemapcontent.="\t<url>\n\t\t<loc>".$url."</loc>\n\t\t<lastmod>".date("Y-m-d",$vo->create_time)."</lastmod>\n\t\t<changefreq>Monthly</changefreq>\n\t\t<priority>0.2</priority>\n\t</url>\n";
}


	
	$sitemapcontent.="</urlset>";


$htmlfile=Yii::app()->basePath."/../sitemap.html";
$sitefile=Yii::app()->basePath."/../sitemap.xml";
file_put_contents($htmlfile,$htmlfilecontent);
echo "生成html网站地图<br>";
file_put_contents($sitefile,$sitemapcontent);
echo "生成xml网站地图<br>";
 
 
 ?>