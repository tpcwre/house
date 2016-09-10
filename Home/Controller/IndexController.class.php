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
    	$arr = $h->field('id,lxr')->page($page['pnow'],$page['pline'])->select();
    	$this->assign('arr',$arr);
    	$this->display();
    }
}