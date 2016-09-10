<?php if (!defined('THINK_PATH')) exit();?>

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
<body>

<div style='height:40;background:#4192E3;text-align:center;font:normal bold 15px/40px normal'>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:12%;height:40px;background:url(01.png)'></div>
	
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>物业缴费</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快速报修</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快递代收</div>
	<div style='float:left;color:#4192E3;font:normal normal 12px/40px normal;text-align:center;width:22%;background:#fff'>房屋出售</div>
</div>

<div style='font:normal normal 12px normal;padding-left:15px'>

	<div class='dh' style='margin-top:15px'>
		<div >全新房源</div>
		<div >二手房源</div>
		<div >出租</div>
	</div>


	<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style='border-bottom:1px solid #ccc;height:80px;margin-top:25px;'>	<!--信息展示-->
			<div style='height:70px;width:70px;border:1px solid' class='float'>
				<img src='http://cdnweb.b5m.com/web/cmsphp/article/201505/a9758a02bc1be1d7659c4a1b490d6adc.jpg' width=70 height=70/>
			</div>
			<div style='height:50px;width:250px;' class='float'>
				<div style='padding:3 0 0 30px '><?php echo ($vo["bt"]); ?>　类型：<?php echo ($vo["lx"]); ?></div>
				<div style='padding:3 0 0 30px '>位置：<?php echo ($vo["wz"]); ?></div>
				<div style='padding:3 0 0 30px '>面积：<?php echo ($vo["mj"]); ?>平　售价：<?php echo ($vo["sj"]); ?>万</div>
				<div style='padding:3 0 0 30px;' >
					<?php echo ($vo["fbsj"]); ?>
					<a href='moreinfo.html' style='text-decoration:none'>　更多信息...</a>
				</div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>

</body>















<!--
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?>--<?php echo ($vo["lxr"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>




<div style='display:inline-block;margin:3px'>
	<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'>上页</a>
</div>
<?php $__FOR_START_14913__=$page2['pmin'];$__FOR_END_14913__=$page2['pmax'];for($k=$__FOR_START_14913__;$k <= $__FOR_END_14913__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px'>
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