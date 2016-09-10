<?php if (!defined('THINK_PATH')) exit();?>



<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["id"]); ?>--<?php echo ($vo["lxr"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>




<div style='display:inline-block;margin:3px'>
	<a style='text-decoration:none' href='<?php echo ($_SERVER['PHP_SELF']); ?>?pnow=<?php echo ($page2['plast']); ?>'>上页</a>
</div>
<?php $__FOR_START_4056__=$page2['pmin'];$__FOR_END_4056__=$page2['pmax'];for($k=$__FOR_START_4056__;$k <= $__FOR_END_4056__;$k+=1){ if($page2['pnow'] == $k): ?><div style='display:inline-block;margin:3px;border:1px solid blue;padding:3px'>
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