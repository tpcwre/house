<?php if (!defined('THINK_PATH')) exit();?><head>
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

<div style='margin:20 0 30 0;text-align:center'>	<!--导航-->
	<?php echo ($arr["bt"]); ?>
</div>
<div style='font:normal normal 12px normal;border-bottom:0px solid;height:500px'>
	<div style='border:0px solid;width:150px;height:150px;padding-top:15px;margin-left:5px' class='float'>
		<?php if($arr['fwtp']=='null'){ $imgs[0]='01.png'; }else{ $imgs = json_decode($arr['fwtp']); } ?>
		<img src='/house/Public/<?php echo ($imgs[0]); ?>' width=150 height=150/>
	</div>
	<div style='border:0px solid;width:48%;display;margin-left:10px;font-size:18px' class='float'>
		<div style='margin-bottom:5px'>房源类型：<?php echo ($arr["lx"]); ?></div>
		<div style='margin-bottom:5px'>户型：<?php echo ($arr["hx"]); ?></div>
		<div style='margin-bottom:5px'>售价：<?php echo ($arr["sj"]); ?>万元</div>
		<div style='margin-bottom:5px'>面积：<?php echo ($arr["mj"]); ?>平米</div>
		<div style='margin-bottom:5px'>位置：<?php echo ($arr["wz"]); ?></div>
		<div style='margin-bottom:5px'>电话：<?php echo ($arr["dh"]); ?></div>
		<div style='margin-bottom:5px'>联系人：<?php echo ($arr["lxr"]); ?></div>
		<div ></div>
	</div>
	<div style='clear:both;' ></div>
	<div style='margin-top:30px;border-bottom:1px solid;border-color:#ccc' ></div>

	<div style='margin-top:35px;font-size:20px;text-align:center'>房屋详细信息：</div>

	<div style='padding:10 20;width:80%;margin:0 auto;padding:15px;border:0px solid;font:normal normal 15px/18px normal'>
		<?php echo ($arr["xxxx"]); ?>
	</div>

	<div style='width:80%;margin:0 auto;padding:15px;border:0px solid'>
		<?php if(is_array($imgs)): $i = 0; $__LIST__ = $imgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style='margin-top:10px'><img src='/house/Public/<?php echo ($vo); ?>' width=100%/></div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
<div>
</div>

</body>