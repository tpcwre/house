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
	图片管理
</div>
<div style="width:60%;margin:0 auto">
<form action='/house/index.php/Home/Index/addimg_c' method='post' enctype="multipart/form-data">
	<input type='hidden' name='id' value='<?php echo ($id); ?>' />
	<p><input type='file' name='img' /></p>
	<p style='text-align:center'><input type='submit' value='上传'/></p>
</form>
</div>

<?php if(is_array($arr2)): $i = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style='width:80%;margin:10 auto'>
		<img src='/house/Public/<?php echo ($vo); ?>' width=100%/>
	</div>
	<div style="color:#faa;text-align:center" onclick="location='/house/index.php/Home/Index/imgdel/id/<?php echo ($id); ?>/item/<?php echo ($key); ?>'">删除</div><?php endforeach; endif; else: echo "" ;endif; ?>

<div style='margin:100px'></div>


<!--分页

	<div style='display:inline-block;margin:3px'>
		<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'>上页</a>
	</div>
	<?php $__FOR_START_25963__=$page2['pmin'];$__FOR_END_25963__=$page2['pmax'];for($k=$__FOR_START_25963__;$k <= $__FOR_END_25963__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px'>
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