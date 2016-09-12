<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {


    //首页
    public function index(){
        session('uid',401);
        $uid = I('session.uid');
        if($uid == 401){
            $this->redirect('Admin/Index/index');exit;
        }
        if(!$uid){
            echo "<script>alert('请登陆！')</script>";exit;
        }

        $h = D('House');
        $myfn = new \Myfn\Myfn();

        //分类搜索设置
        switch(I('get.type')){
           // case 'qb':$where = "";break;
           // case 'qx':$where = "lx=2";break;
           // case 'es':$where = "lx=3";break;
           // case 'cz':$where = "lx=4";
            case 'qx':$where = 2;break;
            case 'es':$where = 3;break;
            case 'cz':$where = 4;
        }
        if(I("get.type") && I("get.type")!='qb'){
            $w['lx']=$where;
        }
        $w['stat']=1;
        //$where2 = "stat=1";

        $count = $h->where($w)->count();           //总条数
        $page = $myfn->page($count,5);
        $this->assign('page2',$page);

    	$arr = $h->field('id,bt,hx,mj,sj,lx,fbsj,fwtp')->where($w)->page($page['pnow'],$page['pline'])->order("id desc")->select();
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


    //详细信息
    public function moreinfo(){
        $id = I('get.id');
        $h = D('House');
        $arr = $h->find($id);

        switch($arr['lx']){
            case 2:$arr['lx']='全新';break;
            case 3:$arr['lx']='二手';break;
            case 4:$arr['lx']='出租';break;
        }
       // vardump($arr);exit;
        $hxs = explode(',',$arr['hx']);
        $arr['hx']=$hxs[0].'室'.$hxs[0].'厅'.$hxs[0].'厨'.$hxs[0].'卫';
       // vardump($arr);
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
        $_POST['hx']=$_POST['hx_s'].','.$_POST['hx_t'].','.$_POST['hx_c'].','.$_POST['hx_w'];

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
        $count = $h->where("uid=$uid")->count();
        $myfn = new \Myfn\Myfn();
        $page = $myfn->page($count,3);
      //  vardump($page);
        $this->assign('page2',$page);
        $arr = $h->field('id,bt,mj,sj,wz,hx,fbsj,stat')->page($page['pnow'],$page['pline'])->where("uid=$uid")->order("id desc")->select();
        foreach($arr as $k=>$v){
            $hxs = explode(',',$arr[$k]['hx']);
            $arr[$k]['hx']=$hxs[0].'室'.$hxs[0].'厅'.$hxs[0].'厨'.$hxs[0].'卫';
        }
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









    //修改信息
    public function edit(){
        /*
        $errors = I("session.error");
        if($errors){
            $this->assign('errors',$errors);
            session('error',null);
        }
        */
        $id = I('get.id');
        $h = D('house');
        $arr = $h->find($id);
        $this->assign('arr',$arr);
        $this->display();
    }


    //修改信息处理
    public function edit_c(){
        vardump(I('post.'));
        $_POST['hx']=I('post.hx_s').','.I('post.hx_t').','.I('post.hx_c').','.I('post.hx_w');
        unset($_POST['hx_s'],$_POST['hx_t'],$_POST['hx_c'],$_POST['hx_w'],$_POST['fwtp']);
        //vardump(I('post.'));
        $h = D('House');
        $h->create();
        $h->field("fwtp,stat,fbsj",true)->save(I('post.'));
        $this->redirect('myhouse');
    }




    //图片管理
    public function addimg(){
        $id = I("get.id");
        $h = D('House');
        $arr = $h->field('fwtp')->find($id);
        $arr2 = json_decode($arr['fwtp']);
        //vardump($arr2);
        //echo $arr2[0];
        session('imgs',$arr2);
        $this->assign('id',$id);
        $this->assign('arr2',$arr2);
        $this->display();
    }


    //图片添加处理
    public function addimg_c(){
        $id = I("post.id");
        if($_FILES{'img'}{'size'}<=0){
            echo "<script>alert('没有选择文件！');history.go(-1);</script>";exit;
        }
        $config=array(
                'rootPath'=>'./Public/',
                'savePath'=>'imgs/',
                'mimes'=>array(             //允许的mimes类型
                        'image/jpeg',
                        'image/png',
                        'image/gif'
                    ),
                'exts'=>array(              //允许的后缀 
                        'jpg','png','gif','jpeg','JPG','JPEG','PNG','GIF'
                    ),
                'maxSize'=>1024*900,        //最大300k
            );
        $upload = new \Think\Upload($config);
        $st = $upload->uploadOne($_FILES['img']);
        if($st){
            $src = $st['savepath'].$st['savename'];
            $h = D('House');

            $arr = $h->where("id=$id")->find();
            $arr2 = json_decode($arr['fwtp']);
            if($arr2 == null){
                $src2[]=$src;
                $arr3['fwtp']=json_encode($src2);
            }else{
                array_unshift($arr2,$src);
                $arr3['fwtp'] = json_encode($arr2);

            }
            echo $arr3['fwtp'];


            $st = $h->field('fwtp')->where("id=$id")->save($arr3);
            $this->redirect('addimg',array('id'=>$id));
        }else{

            dump($upload->getError());
        }



    }





    //删除图片
    public function imgdel(){
        $item = I("get.item");
        $id = I("get.id");
        $arr = session('imgs');
        unset($arr[$item]);
        foreach($arr as $v){
            $arr2[] = $v;
        }
        $arr3['fwtp'] = json_encode($arr2);
        $h = D('House');
        $h->field('fwtp')->where("id=$id")->save($arr3);
        $this->redirect('addimg',array("id"=>$id));
    }








}