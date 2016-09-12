<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-sclae=1.0,user-scalable=0" />
<script src='/house/Public/js/jquery.js'></script>
<script>
	sessionStorage.navigation='fyxx';
</script>
<style>
	.inptext{
		width:30px;
	}

	.iorb{
		display:inline-block;
	}
	.float{
		float:left;
	}
	
	.dh div{
		border:1px solid #4192E3;
		display:inline-block;
		padding:4px 8px;
		font-size:12px;
		margin-left:10px;
	}

</style>
</head>
<body style="padding:0;margin:0">



<!--引入house 导航栏-->
<div style='height:40;background:#4192E3;text-align:center;font:normal bold 15px/40px normal'>
	<div id='navback' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:12%;height:40px;background:url(/house/Public/01.png);background-repeat:no-repeat'></div>
	
	<div id='fyxx' class='navc' style='background:#fff;float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%;color:#4192E3' >房源信息</div>
	<div id='fbxx' class='navc' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%' >发布信息</div>
	<div id='wdxx' class='navc' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>我的信息</div>
	<div style='float:left;color:#4192E3;font:normal normal 12px/40px normal;text-align:center;width:22%;background:#fff'></div>
</div>
<script>
$(function(){
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
		location="/house/index.php/Home/Index/myhouse";
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


<!--
<div style='height:40;background:#4192E3;text-align:center;font:normal bold 15px/40px normal'>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:12%;height:40px;background:url(/house/Public/01.png);background-repeat:no-repeat'></div>
	
	<div id='fyxx' style='background:#fff;float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%;color:#4192E3' onclick="location='/house/index.php/Home/Index/index'">房源信息</div>
	<div id='fbxx' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%' onclick="location='/house/index.php/Home/Index/addinfo'">发布信息</div>
	<div id='wdxx' style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>我的信息</div>
	<div style='float:left;color:#4192E3;font:normal normal 12px/40px normal;text-align:center;width:22%;background:#fff'></div>
</div>
-->


<div style='font:normal normal 12px normal;padding-left:15px;margin-bottom:20px'>

	<div class='dh' style='margin-top:15px'>
		<div onclick="location='/house/index.php/Home/Index/index/type/qb'">全部</div>
		<div onclick="location='/house/index.php/Home/Index/index/type/qx'">全新</div>
		<div onclick="location='/house/index.php/Home/Index/index/type/es'">二手</div>
		<div onclick="location='/house/index.php/Home/Index/index/type/cz'">出租</div>
		<!---
		<div style='border:0px;font:normal normal 12px/50px normal'>
			<a style='text-decoration:none' href='/house/index.php/Home/Index/addinfo'>发布信息</a>
		</div>
		-->
	</div>


	<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style='border-bottom:1px solid #ccc;height:80px;margin-top:25px;'>	<!--信息展示-->
			<div style='height:70px;width:22%;border:0px solid' class='float'>
				<?php if($vo['fwtp']=='null'){ $imgs[0]='01.png'; }else{ $imgs = json_decode($vo['fwtp']); } ?>
				<img src='/house/Public/<?php echo ($imgs[0]); ?>' width=70 height=70/>
			</div>
			<div style='height:50px;width:75%;border:0px solid' class='float'>
				<div style='padding:3 0 0 30px '><?php echo ($vo["bt"]); ?>　类型：<?php echo ($vo["lx"]); ?></div>
				<div style='padding:3 0 0 30px '>户型：<?php echo ($vo["hx"]); ?></div>
				<div style='padding:3 0 0 30px '>面积：<?php echo ($vo["mj"]); ?>平　售价：<?php echo ($vo["sj"]); ?>万</div>
				<div style='padding:3 0 0 30px;' >
					<?php echo ($vo["fbsj"]); ?>
					<a href='/house/index.php/Home/Index/moreinfo?id=<?php echo ($vo["id"]); ?>' style='text-decoration:none'>　详细信息...</a>
				</div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>



<!--分页-->
<?php if($page2['pnum'] > 0): ?><div style='margin-bottom:100px'>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'> < </a>
		</div>
		<?php $__FOR_START_21568__=$page2['pmin'];$__FOR_END_21568__=$page2['pmax'];for($k=$__FOR_START_21568__;$k <= $__FOR_END_21568__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px;background:#2E6AB1;font-weight:bold'>
					<a style='text-decoration:none;color:#fff' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($k); ?>'><?php echo ($k); ?></a>
				</div>	
			<?php else: ?>
				<div style='display:inline-block;margin:3px;border:1px solid #9AAFE5;padding:3px;font-weight:bold'>
					<a style='color:#000099;text-decoration:none;' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($k); ?>'><?php echo ($k); ?></a>
				</div><?php endif; } ?>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['pnext']); ?>'> > </a>
		</div>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=1'>首页</a>
		</div>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['pnum']); ?>'>尾页</a>
		</div>
	</div><?php endif; ?>



<!--
<div id='bottom' style="position:fixed;top:650px;width:100%;height:200px;">
	<img src='/house/Public/bottom.png' width=100% onclick="location='/house/index.php/Home/Index/myhouse'"/>

</div>
-->



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
		$("#navigation_bottom").css('background','url(/house/Public/bottom.png)');
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














<!--
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?>--<?php echo ($vo["lxr"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>




<div style='display:inline-block;margin:3px'>
	<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'>上页</a>
</div>
<?php $__FOR_START_3961__=$page2['pmin'];$__FOR_END_3961__=$page2['pmax'];for($k=$__FOR_START_3961__;$k <= $__FOR_END_3961__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px'>
			<a style='text-decoration:none;color:#000' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($k); ?>'><?php echo ($k); ?></a>
		</div>	
	<?php else: ?>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none;' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($k); ?>'><?php echo ($k); ?></a>
		</div><?php endif; } ?>
<div style='display:inline-block;margin:3px'>
	<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['pnext']); ?>'>下页</a>
</div>
<div style='display:inline-block;margin:3px'>
	<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=1'>首页</a>
</div>
<div style='display:inline-block;margin:3px'>
	<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['pnum']); ?>'>尾页</a>
</div>

-->