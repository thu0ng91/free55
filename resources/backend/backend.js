$(document).ready(function(){
	$("#menu button").click(function(){
		if($(this).attr('url')!='')
			window.location.href=$(this).attr('url');
	});
});
function showMsg(msg){
	$.messager.show({
				title:'信息提示！',
				msg:msg,
				timeout:5000,
				showType:'slide'
			});
}
