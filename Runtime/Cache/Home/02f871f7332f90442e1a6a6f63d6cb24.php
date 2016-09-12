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
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:12%;height:40px;background:url(/house/Public/01.png);background-repeat:no-repeat'></div>
	
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>物业缴费</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快速报修</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快递代收</div>
	<div style='float:left;color:#4192E3;font:normal normal 12px/40px normal;text-align:center;width:22%;background:#fff'>房屋出售</div>
</div>

<div style='font:normal normal 12px normal;padding-left:15px;margin-bottom:20px'>

	<div class='dh' style='margin-top:15px'>
		<div onclick="location='/house/index.php/Home/Index/index/type/qb'">全部</div>
		<div onclick="location='/house/index.php/Home/Index/index/type/qx'">全新</div>
		<div onclick="location='/house/index.php/Home/Index/index/type/es'">二手</div>
		<div onclick="location='/house/index.php/Home/Index/index/type/cz'">出租</div>
		<div style='border:0px;font:normal normal 12px/50px normal'>
			<a style='text-decoration:none' href='/house/index.php/Home/Index/addinfo'>发布信息</a>
		</div>
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
<div style='margin-bottom:100px'>
	<div style='display:inline-block;margin:3px'>
		<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'>上页</a>
	</div>
	<?php $__FOR_START_7963__=$page2['pmin'];$__FOR_END_7963__=$page2['pmax'];for($k=$__FOR_START_7963__;$k <= $__FOR_END_7963__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px'>
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
</div>


<div id='bottom' style="position:fixed;top:650px;width:100%;height:10%;">
	<img src='/house/Public/bottom.png' width=100% onclick="location='/house/index.php/Home/Index/myhouse'"/>
</div>
<script>
	<!--设置底部功能栏-->
	var sh = window.screen.height;
	var oh = sh - 68;
	var bottom = document.getElementById('bottom');
	//alert(bottom.style.top+'-'+sh+'-'+oh);
	bottom.style.top=oh+'px';
</script>
</body>
</html>














<!--
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?>--<?php echo ($vo["lxr"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>




<div style='display:inline-block;margin:3px'>
	<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'>上页</a>
</div>
<?php $__FOR_START_10424__=$page2['pmin'];$__FOR_END_10424__=$page2['pmax'];for($k=$__FOR_START_10424__;$k <= $__FOR_END_10424__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px'>
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