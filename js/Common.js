var currentpage=1;
function ShowPage(page)
{
	if(currentpage !=page)
	{
		$("#aritcleP_"+currentpage).css("display", "none");
		$("#aritcleP_"+page).css("display", "block");
		
		$("#page_"+currentpage).removeClass("pageSelected");
		$("#page_"+page).addClass("pageSelected");
		currentpage=page;
	}
}
function createFlash(ur, w, h) {
    document.write('<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,40,0" border="0" width="' + w + '" height="' + h + '">');
    document.write('<param name="movie" value="' + ur + '">');
    document.write('<param name="quality" value="high"> ');
    document.write('<param name="wmode" value="transparent"> ');
    document.write('<param name="menu" value="false"> ');
    document.write('<embed src="' + ur + '" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="' + w + '" height="' + h + '" quality="High" wmode="transparent">');
    document.write('</embed>');
    document.write('</object>');
}

var defID="";
var defaultNavID="1";
function navHover(id){
	if(id != defID)
	{
		$("#nav_"+defID).removeClass("hovera");
		$("#nav_"+defID+"_menu").hide();
		$("#nav_"+id).addClass("hovera");
		$("#nav_"+id+"_menu").fadeIn("normal");
		$("#nav_"+defaultNavID).addClass("hovera");
		defID=id;
	}
}
function navMouseOut()
{
	if(defaultNavID !="" && defID !=defaultNavID)
	{
/*		$("#nav_"+defID).removeClass("hovera");
		$("#nav_"+defID+"_menu").hide();
		$("#nav_"+defaultNavID).addClass("hovera");
		$("#nav_"+defaultNavID+"_menu").fadeIn("normal");*/
		navHover(defaultNavID)
	}
}
function setDefaultNav(id)
{
	defaultNavID=id;
	navHover(id);
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function goToURL()
{
	
}
function changecode()
{
	$("#cc").attr("src","/CheckCode.aspx?"+Math.random());
}
function changeFontSize(id,size)
{
	//var obj=document.getElementById(id);
    //obj.style.fontSize=size+'px';
    $('#' + id+" *").css("font-size", size + 'px');
}

function getTopPost()
{
	$.ajax({type:'POST',
		   url:'AJAX/GetPost.aspx',
		   data:'',
		   success:function(data)
		   {
			   $("#TopPost").html(data);
		   }
		   });
	}
	
function getsearch()
{
	var key=$("#key").val();
	if(key =="")
	{
		alert("搜索关键不能为空！");
		return false;
	}
	else
	{
		//$("#searchform").submit();
		window.location.href='/Search.aspx?k='+escape(key);
		return false;
	}
}
function CheckApply()
{
	var title=$("#title").val();
	var UserName=$("UserName").val();
	var tel=$("#tel").val();
	var cc=$("#checkcode").val();
	if(title =="")
	{
		alert("服务名称不能为空！");
		$("#title").focus();
		return false;
	}
	if(UserName =="")
	{
		alert("联系人不能为空！");
		$("UserName").focus();
		return false;
	}
	if(tel=="")
	{
		alert("联系电话不能为空！");
		$("#tel").focus();
		return false;
	}
	if(cc=="")
	{
		alert("验证码不能为空！");
		$("#checkcode").focus();
		return false;
	}
}