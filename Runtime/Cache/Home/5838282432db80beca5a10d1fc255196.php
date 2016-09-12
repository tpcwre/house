<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
<meta charset='utf-8' />
<title>发布房源信息</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-sclae=1.0,user-scalable=0" />
<script src='/house/Public/js/jquery.js'></script>
<script>
	sessionStorage.navigation='fbxx';
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



<!--引入house导航-->
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
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:12%;height:40px;background:url(/house/Public/01.png);background-repeat:no-repeat' onclick="history.go(-1)"></div>
	
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>物业缴费</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快速报修</div>
	<div style='float:left;color:#fff;font:normal normal 12px/40px normal;text-align:center;width:22%'>快递代收</div>
	<div style='float:left;color:#4192E3;font:normal normal 12px/40px normal;text-align:center;width:22%;background:#fff'>房屋出售</div>
</div>
-->


<div style='height:60;background:#fee;text-align:center;font:normal bold 20px/60px normal'>
	发布房源信息
</div>

<div style='padding: 0 25px;margin:50px auto;width:280px'>
	<form action='/house/index.php/Home/Index/addinfo_c' method='post'>
		<p><input type='hidden' name='id' value='null' /></p>
		<p>　　标题：<input type='text' name='bt' style="width:155px"  /></p>
		<p>　　类型：
			<?php if($_SESSION['uid']== 401): ?><input type='hidden' name='lx' value='2' />全新
			<?php else: ?>
				<input type='radio' name='lx' id='lx3' value='3'  checked/><label for='lx3'>二手</label>
				<input type='radio' name='lx' id='lx4' value='4' /><label for='lx4'>出租</label><?php endif; ?>
		</p>
		<p>　　户型：<input type='text' name='hx_s' style="width:25px" />室
					<input type='text' name='hx_t' style="width:25px"/>厅
					<input type='text' name='hx_c' style="width:25px"/>厨
					<input type='text' name='hx_w' style="width:25px"/>卫
		</p>
		<p>　　面积：<input type='tex' name='mj' style="width:155px" />平米</p>
		<p>　　售价：<input type='tex' name='sj' style="width:155px" />万元</p>
		<p>　　位置：<input type='tex' name='wz' style="width:155px" /></p>
		<p><input type='hidden' name='fwtp' value='null' /></p>
		<p>　　电话：<input type='tex' name='dh' style="width:155px" /></p>
		<p>　联系人：<input type='tex' name='lxr' style="width:155px"  /></p>
		<p>详细信息：<textarea rows=8 style='resize:none' name='xxxx'></textarea></p>
		<p>
			<?php if(is_array($errors)): $i = 0; $__LIST__ = $errors;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p style='color:red;text-align:center'><?php echo ($vo); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
		</p>
		<p style='text-align:center'>
			<input type='submit' value='提交' />
			<input type='reset' value='重置' />
		</p>
	</form>
</div>


<script>

</script>

</body>
</html>