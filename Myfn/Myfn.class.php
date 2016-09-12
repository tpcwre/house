<?php
namespace Myfn;
class Myfn{



/*
*@功能 		分页
*@param 	$h 		要分页的数据表模型
*@param 	$pline 	设置每页显示条数，默认10条
*
*@return 	pnow 	当前页
*			pmin 	显示分页的最小页
*			pmax 	显示分页的最大页
* 			pline 	每页显示的行数
			plast 	上页
			pnext 	下页
			pnum 	最后一页
*/    
    public function page($count,$pline=''){
     	$pnow = I('get.pnow')?:1;		//当前页
    	//$count = $h->count();			//总条数
    	$pline = empty($pline)?10:$pline;					//每页显示的条数
    	$pnum = ceil($count/$pline);	//总页数

    	$min = $pnow-2;
    	$max = $pnow+2;
    	if($min < 1){
    		$min = 1;
    	}
    	if($max > $pnum){
    		$max = $pnum;
    		if($pnum >=5 ){
    			$min=$pnum-4;
    		}
    	}
    	if($pnow<3 && $pnum >5){
    		$max = 5;
    	}
    	$page['pnow']=$pnow;
    	$page['pmin']=$min;
    	$page['pmax']=$max;
    	$page['pline']=$pline;
    	$page['plast']=$pnow-1>0?$pnow-1:1;
    	$page['pnext']=$pnow+1<$pnum?$pnow+1:$pnum;
    	$page['pnum']=$pnum;
    	return $page;
    }

}

