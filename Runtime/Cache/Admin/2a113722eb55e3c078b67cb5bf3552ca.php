<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
	<!--引入head公共属性   (固定)  -->
	<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-sclae=1.0,user-scalable=0" />
<script src='/house/Public/js/jquery.js'></script>
	
	
	<title>房屋信息后台管理</title>
	<script>sessionStorage.navigation='fyxx';</script>

	
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
			location='/house/index.php/Admin/Index/index';
	});
	$('#fbxx').click(function(){
		location="/house/index.php/Home/Index/addinfo";
	});
	$('#wdxx').click(function(){
		if(uid == '401'){
			location="/house/index.php/Home/Index/myhouse";
		}else{
			location="/house/index.php/Admin/Index/myhouse";
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

<div style='font:normal normal 12px normal;padding-left:15px;margin-bottom:0px'>
	<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style='border-bottom:1px solid #ccc;margin:25px auto;'>	<!--信息展示-->
			<div style='height:70px;width:22%;border:0px solid' class='float'>
				<?php if($vo['fwtp']=='null'){ $imgs[0]='imgs/01.jpg'; }else{ $imgs = json_decode($vo['fwtp']); } ?>
				<img src='/house/Public/<?php echo ($imgs[0]); ?>' width=70 height=70/>
			</div>
			<div style='height:50px;width:75%;border:0px solid' class='float'>
				<div style='padding:3 0 0 30px '><?php echo ($vo["bt"]); ?>　类型：<?php echo ($vo["lx"]); ?></div>
				<div style='padding:3 0 0 30px '>户型：<?php echo ($vo["hx"]); ?></div>
				<div style='padding:3 0 0 30px '>面积：<?php echo ($vo["mj"]); ?>平　售价：<?php echo ($vo["sj"]); ?>万</div>
				<div style='padding:3 0 0 30px;' >
					<?php echo ($vo["fbsj"]); ?>
				</div>
			</div>
			<div style='clear:both;padding:10 0'>
				<a href='/house/index.php/Home/Index/moreinfo/id/<?php echo ($vo["id"]); ?>' style='text-decoration:none'>　查看 </a>
				<a href='/house/index.php/Admin/Index/del/id/<?php echo ($vo["id"]); ?>' style='text-decoration:none'>　删除 </a>
				　状态：<a href='/house/index.php/Admin/Index/stat/id/<?php echo ($vo["id"]); ?>/pnow/<?php echo ($page2["pnow"]); ?>/stat/<?php echo ($vo["stat"]); ?>' style='text-decoration:none'><?php echo $vo['stat']==1?'显示':"<span style='color:red'>暂封</span>" ?> </a>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

	<!--分页-->
	<?php if($page2['pnum'] > 0): ?><div style='margin-bottom:100px'>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'> < </a>
		</div>

		<div style='display:inline-block;margin:3px;border:1px solid #9AAFE5;padding:3px;font-weight:bold'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=1'> 1 </a>
		</div>..

		<?php $__FOR_START_8727__=$page2['pmin'];$__FOR_END_8727__=$page2['pmax'];for($k=$__FOR_START_8727__;$k <= $__FOR_END_8727__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px;background:#2E6AB1;font-weight:bold'>
					<a style='text-decoration:none;color:#fff' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($k); ?>'><?php echo ($k); ?></a>
				</div>	
			<?php else: ?>
				<div style='display:inline-block;margin:3px;border:1px solid #9AAFE5;padding:3px;font-weight:bold'>
					<a style='color:#000099;text-decoration:none;' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($k); ?>'><?php echo ($k); ?></a>
				</div><?php endif; } ?>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['pnext']); ?>'> > </a>
		</div>
		..
		<div style='display:inline-block;margin:3px;border:1px solid #9AAFE5;padding:3px;font-weight:bold'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['pnum']); ?>'><?php echo ($page2['pnum']); ?></a>
		</div>
	</div><?php endif; ?>


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