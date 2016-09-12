<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(!I('session.uid') || I('session.uid')!=401){
            $this->redirect("Home/Index/index");exit;
        }
        $h = D('House');
        $myfn = new \Myfn\Myfn();

        //分类搜索设置
        switch(I('get.type')){
            case 'qb':$where = "";break;
            case 'qx':$where = "lx=2";break;
            case 'es':$where = "lx=3";break;
            case 'cz':$where = "lx=4";
        }

        $count = $h->where($where)->count();           //总条数
        $page = $myfn->page($count,5);
        $this->assign('page2',$page);

    	$arr = $h->field('id,bt,hx,mj,sj,lx,fbsj,fwtp,stat')->where($where)->page($page['pnow'],$page['pline'])->order("id desc")->select();
        //vardump($arr);
        foreach($arr as $k=>$v){
            switch($arr[$k]['lx']){
                case 2:$arr[$k]['lx']='全新';break;
                case 3:$arr[$k]['lx']='二手';break;
                case 4:$arr[$k]['lx']='出租';break;
            }
            $hxs = explode(',',$arr[$k]['hx']);
            $arr[$k]['hx']=$hxs[0].'室'.$hxs[0].'厅'.$hxs[0].'厨'.$hxs[0].'卫';
        }
       // vardump($arr);
    	$this->assign('arr',$arr);
    	$this->display();
    }



    //删除房屋信息
    public function del(){
        $id = I('get.id');
        $h = D('House');
        $st = $h->delete($id);
        $this->redirect('index');
    }



    //信息显示状态控制 
    public function stat(){
        
        $id = I('get.id');
        $stat = I("get.stat");
        $pnow = I('pnow');
  
        if($stat == 1){
            $data['stat']=0;
        }else{
            $data['stat']=1;
        }
        vardump($data);
        $h = D('House');
        $st = $h->where("id=$id")->save($data);
        $this->redirect('index',array('pnow'=>$pnow));
    }
}