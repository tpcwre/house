<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
	<!--引入head公共属性   (固定)  -->
	<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-sclae=1.0,user-scalable=0" />
<script src='/house/Public/js/jquery.js'></script>
	
	
	<script>
		sessionStorage.navigation='wdxx';
	</script>
	<title>图片管理</title>

	
</head>
<body style="padding:0;margin:0;background:#eee">
	<!--引入house 导航栏   (固定)  -->
	<div style='height:40;background:#4192E3;text-align:center;font:normal bold 15px/40px normal'>
	<div id='navback' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:12%;height:40px;background:url(/house/Public/imgs/01.png);background-repeat:no-repeat'></div>

	<div id='fyxx' class='navc' style='background:#fff;float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%;color:#4192E3' >房源信息</div>
	
	<div id='fbxx' class='navc' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%' >发布信息</div>
	<div id='wdxx' class='navc' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:26%'>管理我的信息</div>
	<div style='float:left;color:#4192E3;font:normal normal 12px/40px normal;text-align:center;width:18%;background:#fff'></div>

</div>
<script>
$(function(){
	var uid = '<?php echo (session('uid')); ?>';
	if(uid == '401'){
		$('#fyxx').html('信息管理');
	}
	$("#navback").click(function(){
		history.go(-1);
	});
	$('#fyxx').click(function(){
			location='/house/index.php/Home/Index/index';
	});
	$('#fbxx').click(function(){
		location="/house/index.php/Home/Index/addinfo";
	});
	$('#wdxx').click(function(){
		if(uid == '401'){
			location="/house/index.php/Home/Index/myhouse";
		}else{
			location="/house/index.php/Home/Index/myhouse";
		}
	});
	var navigation = sessionStorage.navigation;
	if(navigation){
		$('.navc').css('background','#4192E3');
		$('.navc').css('color','#fff');
		$('#'+navigation).css('background','#fff');
		$('#'+navigation).css('color','#4192E3');
	}

});
</script>

	
	
	<div style='height:40;background:#fee;text-align:center;font:normal bold 15px/40px normal'>
		图片管理
	</div>
	<div style="width:60%;margin:0 auto">

	<!--图片上传-->
	<form action='/house/index.php/Home/Index/addimg_c' method='post' enctype="multipart/form-data">
		<input type='hidden' name='id' value='<?php echo ($id); ?>' />
		<p><input type='file' name='img' /></p>
		<p style='text-align:center'><input type='submit' value='上传'/></p>
	</form>
	</div>
	
	<!--遍历以上传的图片-->
	<?php if(is_array($arr2)): $i = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style='width:80%;margin:10 auto'>
			<img src='/house/Public/<?php echo ($vo); ?>' width=100%/>
		</div>
		<div style="color:#faa;text-align:center" onclick="location='/house/index.php/Home/Index/imgdel/id/<?php echo ($id); ?>/item/<?php echo ($key); ?>'">删除</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<div style='margin:100px'></div>


	<!--引入底部导航   (固定)  -->
	

<div id='navigation_bottom' >
	<div style='height:100%;width:20%;border:0px solid;float:left;box-sizing:border-box' onclick="location='http://miaoto.com/dating/dating_filter'"></div>
	<div style='height:100%;width:20%;border:0px solid;float:left;box-sizing:border-box' onclick="location='http://miaoto.com/group/group_index'"></div>
	<div style='height:100%;width:20%;border:0px solid;float:left;box-sizing:border-box' onclick="location='http://miaoto.com/owner/gold_index'"></div>
	<div style='height:100%;width:20%;border:0px solid;float:left;box-sizing:border-box' onclick="location='http://miaoto.com/life/l_life_index'"></div>
	<div style='height:100%;width:20%;border:0px solid;float:left;box-sizing:border-box' onclick="location='http://miaoto.com/owner/ownerindex2'"></div>
</div>
<script>
	<!--设置底部功能栏-->
	$(function(){
		var ssw = window.screen.width;		//屏幕宽度
		var tth = ssw*0.165;				//计算出底部导航条的高度
		$("#navigation_bottom").css('height',tth);
		$("#navigation_bottom").css('background','url(/house/Public/imgs/bottom.png)');
		$("#navigation_bottom").css('backgroundSize','cover');
		var ssh = window.screen.height;		//屏幕高度
		var tttop = ssh - tth;				//底部导航的定位点
		$('#navigation_bottom').css('width','100%');
		$("#navigation_bottom").css("position",'fixed');
		$("#navigation_bottom").css('top',tttop);
	});
</script>

</body>
</html>