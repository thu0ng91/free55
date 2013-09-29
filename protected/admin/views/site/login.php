<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>SMG新媒体运营平台</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/resources/backend/login.css" media="all"/>
	
    <style type="text/css">
        html {
            background: #383F48 url("<?php echo BASEURL?>/resources/backend/images/bg_tile.jpg") repeat;
        }
		input { border:0 none; background: none; }
        #content {
            position: absolute;
            width: 905px;
            height: 500px;
            left: 50%;
            margin-left: -452px;
            margin-top: 50px;
            top: 50px;
			background: url(<?php echo BASEURL?>/resources/backend/images/cms.png) no-repeat; 
        }
        #footer {
            height: 26px;
			line-height: 26px;
            position: absolute;
            bottom: 0;
            right: 0;
			padding-right:15px;
			color:#fff;
			font-size:14px;
			font-weight:700;
        }
		.input_b {
			float: left;
			overflow:hidden;
			margin-right: 10px; 
			width:247px;
			height:42px;
			text-align:left;
			display:inline;
			background: url(<?php echo BASEURL?>/resources/backend/images/sprite.png) no-repeat -10px -120px; 
		}
		.input_b input { float:left; text-align:left; width: 226px; height: 41px; line-height: 41px; padding:0px 10px; overflow:hidden; }
		#username {
		}
		#password {
		}
		#submit { float: left; cursor: pointer; border: 0 none; width: 86px; height: 42px; }
		#cform { margin: 250px 0 0 150px;  }
		#seperator {
			background: url("<?php echo BASEURL?>/resources/backend/images/hr_1x2.png") repeat-x;
			height: 2px;
			width: 615px;
			overflow:hidden;
		}
		
		#ms { height:80px; clear:both;  margin:10px 0 15px 0; display:block; }	
		
		
		
    </style>
<script>
<?php if(Yii::app()->user->hasFlash('actionInfo')): ?>
    alert('<?php echo Yii::app()->user->getFlash('actionInfo');?>');
 <?php endif; ?>
function CheckLogin(obj){
	if(obj.username.value=='')
	{
		alert('请输入用户名');
		obj.username.focus();
		return false;
	}
	if(obj.password.value=='')
	{
		alert('请输入登录密码');
		obj.password.focus();
		return false;
	}
//	if(obj.loginauth!=null)
//	{
//		if(obj.loginauth.value=='')
//		{
//			alert('请输入认证码');
//			obj.loginauth.focus();
//			return false;
//		}
//	}
//	if(obj.key!=null)
//	{
//		if(obj.key.value=='')
//		{
//			alert('请输入验证码');
//			obj.key.focus();
//			return false;
//		}
//	}
	return true;
}
</script>
 <!-- ie png 透明 -->
<!--[if IE 6]>
	<script type="text/javascript" src="http://skin.kankanews.com/kkv3/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">
	// <![CDATA[
		DD_belatedPNG.fix('#content,#seperator,.input_b,#submit,#ms,background');
		if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand))
			try{
				document.execCommand("BackgroundImageCache", false, true);
			}
		catch(e){}
	// ]]>
	</script>
<![endif]-->
</head>
<body>
<div id="wrap">
    <div id="content">
        <form id="cform" name="LoginForm"  method="post" action="<?php echo $this->createUrl('site/login');?>" onsubmit="return CheckLogin(this);">
			<div id="seperator"></div>
			<img id="ms" src="<?php echo BASEURL?>/resources/backend/images/qt01.png" alt="SMG新媒体运营平台"/>
			<div id="cc" class="fn-clearfix">
				<div class="input_b"><input type="text" name="LoginForm[username]" id="username" /></div>
				<div class="input_b"><input type="password" name="LoginForm[password]" id="password" /></div>
				<input name="imageField" type="image" src="<?php echo BASEURL?>/resources/backend/images/btn.png" id="submit"> 
			</div>
        </form>
    </div>
    <p id="footer">
		SMG技术运营中心出品
    </p>
</div>
<script type="text/javascript" charset="utf-8">
if(document.login.equestion.value==0)
{
	showanswer.style.display='none';
}
	
</script>

</body>
</html>
