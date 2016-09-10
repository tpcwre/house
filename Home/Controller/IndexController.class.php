<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
    	$h = D('House');
        $myfn = new \Myfn\Myfn();
        $page = $myfn->page($h);
    	//$page = $this->page($h);
    	$this->assign('page2',$page);
    	$arr = $h->field('bt,wz,mj,sj,lx,fbsj')->page($page['pnow'],$page['pline'])->select();
      //  echo '<pre>';
       // dump($arr);exit;
      //  dump($arr[0]);

    	$this->assign('arr',$arr);
    	$this->display();
    }
}