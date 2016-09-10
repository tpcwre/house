<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {


    //首页
    public function index(){
        session('uid',401);
    	$h = D('House');
        $myfn = new \Myfn\Myfn();
        $page = $myfn->page($h,10);
    	//$page = $this->page($h);
    	$this->assign('page2',$page);
    	$arr = $h->field('id,bt,wz,mj,sj,lx,fbsj')->page($page['pnow'],$page['pline'])->order("id desc")->select();
      //  echo '<pre>';
       // dump($arr);exit;
      //  dump($arr[0]);

    	$this->assign('arr',$arr);
    	$this->display();
    }


    //更多信息
    public function moreinfo(){
        $id = I('get.id');
        $h = D('House');
        $arr = $h->find($id);
        if($arr['fwtp']=='null'){
            $arr['fwtp']='http://cdnweb.b5m.com/web/cmsphp/article/201505/a9758a02bc1be1d7659c4a1b490d6adc.jpg';
        }else{
            echo 222;
        }
        $this->assign('arr',$arr);
        $this->display();
    }




    //添加信息
    public function addinfo(){
        $errors = I("session.error");
        if($errors){
            $this->assign('errors',$errors);
            session('error',null);
        }
        $this->display();
    }


    //添加信息处理
    public function addinfo_c(){
        echo '<pre>';
        $_POST['fbsj'] =  date("Y-m-d H:i:s");
        $_POST['uid'] = session('uid');
        $_POST['hx']=$_POST['hx_s'].'室'.$_POST['hx_t'].'厅'.$_POST['hx_c'].'厨'.$_POST['hx_w'].'卫';

      //  dump(I("post."));exit;

        $h = new \Model\HouseModel;
        $st = $h->create();
        if(!$st){
            session('error',$h->getError());
            $this->redirect('addinfo');exit;
        }
        $h->add();
        $this->redirect('index');
    }



    //我的租售
    public function myhouse(){
        $uid = session('uid');
        $h = D('House');
        $arr = $h->field('id,bt,mj,sj,wz,hx,fbsj')->where("uid=$uid")->select();
        $this->assign('arr',$arr);
        $this->display();
    }



    //删除房屋信息
    public function del(){
        $id = I("get.id");
        $h = D('House');
        $h->delete($id);
        $this->redirect('myhouse');
    }

}