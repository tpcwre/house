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
	<title>我的信息</title>

	
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

	
	
	<!--引入myhouse-->
	
<div style='height:60;background:#fee;text-align:center;font:normal bold 20px/60px normal'>
	我发布的信息
</div>
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="border-bottom:7px solid #eee;height:130px;padding:20px 10px;font-size:12px">
		<div style='height:20px;border:0px solid'>
			<div style='float:left'><span style='color:#999'>标题：</span><span style='color:#555'><?php echo ($vo["bt"]); ?></span></div>
			<div style='float:right;border:0px solid;color:#ED5565'>
				<?php echo $vo['stat']==1?'正常显示':'暂封'; ?>
			</div>
		</div>
		<div style='margin-top:10px'>
			<span style='color:#999'>面积：</span><span style='color:#555'><?php echo ($vo["mj"]); ?>平方</span>　　
			<span style='color:#999'>售价：</span><span style='color:#555'><?php echo ($vo["sj"]); ?>万元</span>
		</div>
		<div style='margin-top:10px'>
			<span style='color:#999'>位置：</span><span style='color:#555'><?php echo ($vo["wz"]); ?></span>　　
			<span style='color:#999'>户型：</span><span style='color:#555'><?php echo ($vo["hx"]); ?></span>
		</div>
		<div style='margin-top:10px'>
			<span style='color:#999'>发布时间：</span><span style='color:#555'><?php echo ($vo["fbsj"]); ?></span>
		</div>
		<div style='border:10x solid;margin:10px 0'>
			<div style='border:1px solid #66CC66;padding:5px;color:#66CC66;float:left;margin-right:10px' onclick="location='/house/index.php/Home/Index/moreinfo/id/<?php echo ($vo["id"]); ?>'">查看</div>
			<div style='border:1px solid #66CC66;padding:5px;color:#66CC66;float:left;margin-right:10px;' onclick="location='/house/index.php/Home/Index/edit/id/<?php echo ($vo["id"]); ?>'">修改资料</div>
			<div style='margin-right:10px;border:1px solid #66CC66;padding:5px;color:#66CC66;float:left' onclick="location='/house/index.php/Home/Index/addimg/id/<?php echo ($vo["id"]); ?>'">图片管理</div>
			<div style='border:1px solid #4192E3;padding:5px;color:#4192E3;float:right' onclick="location='/house/index.php/Home/Index/del?id=<?php echo ($vo["id"]); ?>'">删除</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<!--分页-->
	<?php if($page2['pnum'] > 0): ?><div style='margin-bottom:100px'>
		<div style='display:inline-block;margin:3px'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'> < </a>
		</div>

		<div style='display:inline-block;margin:3px;border:1px solid #9AAFE5;padding:3px;font-weight:bold'>
			<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=1'> 1 </a>
		</div>..

		<?php $__FOR_START_22394__=$page2['pmin'];$__FOR_END_22394__=$page2['pmax'];for($k=$__FOR_START_22394__;$k <= $__FOR_END_22394__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px;background:#2E6AB1;font-weight:bold'>
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