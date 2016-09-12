<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-sclae=1.0,user-scalable=0" />
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

<div style='height:40;background:#4192E3;text-align:center;font:normal bold 15px/40px normal'>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:12%;height:40px;background:url(/house/Public/01.png);background-repeat:no-repeat' onclick="history.go(-1)"></div>
	
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>物业缴费</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快速报修</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快递代收</div>
	<div style='float:left;color:#4192E3;font:normal normal 12px/40px normal;text-align:center;width:22%;background:#fff'>房屋出售</div>
</div>





<div style='height:40;background:#fee;text-align:center;font:normal bold 15px/40px normal'>
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
			<div style='margin-right:10px;border:1px solid #66CC66;padding:5px;color:#66CC66;float:left' onclick="location='/house/index.php/Home/Index/addimg/id/<?php echo ($vo["id"]); ?>'">添加图片</div>
			<div style='border:1px solid #66CC66;padding:5px;color:#66CC66;float:left' onclick="location='/house/index.php/Home/Index/edit/id/<?php echo ($vo["id"]); ?>'">修改资料</div>
			<div style='border:1px solid #4192E3;padding:5px;color:#4192E3;float:right' onclick="location='/house/index.php/Home/Index/del?id=<?php echo ($vo["id"]); ?>'">删除</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>



<!--分页-->
<div style='margin-bottom:100px'>
	<div style='display:inline-block;margin:3px'>
		<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'>上页</a>
	</div>
	<?php $__FOR_START_13012__=$page2['pmin'];$__FOR_END_13012__=$page2['pmax'];for($k=$__FOR_START_13012__;$k <= $__FOR_END_13012__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px'>
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
<div>




<div id='bottom' style="position:fixed;top:650px;width:100%;height:10%;">
	<img src='/house/Public/bottom.png' width=100% onclick="location='/house/index.php/Home/Index/myhouse'"/>
</div>
<script>
	<!--设置底部功能栏-->
	var sh = window.screen.height;
	var oh = sh - 68;
	var bottom = document.getElementById('bottom');
	bottom.style.top=oh+'px';
</script>
</body>
</html>