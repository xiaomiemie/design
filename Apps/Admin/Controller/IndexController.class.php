<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      $m=D('Manager');
      $r=$m->checkSession();
      if($r){
        $this->display('index');
      }else{
        $this->show('<a href="{:U("Login/index/")}">请先登录</a>');
      }
      
    }
    //信息
    public function searchInfo(){
      $m=D('Manager');
      $r=$m->checkSession();
      if($r){
        $pageSize=I('pageSize');
        $pageNum=I('pageNum');
        $keyvalue=I('keyvalue');
        $good=M('goods');
        $where['gooddetail']=array('like',"%$keyvalue%");
      $where['goodname']=array('like',"%$keyvalue%");
      $where['_logic']='OR'; 
      $map['_complex'] = $where;
        $info= $good->where($map)->order('good_id desc')->page($pageNum,$pageSize)->select();
        $count=count($good->where($map)->select());
        if($info==false){
          $res=0;
        }else {
          $res[data]=$info;
          $res[totalCount]=$count;
        }
      }else{
        $res=1;
      }
      
      $this->ajaxReturn($res,'JSON');
    }
    
    
    public function delInfo(){
     $good_id=I('goodid');
     $good=M('goods');
     $info=$good->where("good_id='$good_id'")->delete();
     $this->ajaxReturn($info,'JSON');
    }
    
   public function searchUser(){
      $m=D('Manager');
      $r=$m->checkSession();
      if($r){
         $pageSize=I('pageSize');
        $pageNum=I('pageNum');
        $keyvalue=I('keyvalue');
        $u=M('user');
        $where['nickname']=array('like',"%$keyvalue%");
        $where['realname']=array('like',"%$keyvalue%");
        $where['_logic']='OR'; 
        $map['_complex'] = $where;
        $info=$u->where($map)->order('user_id desc')->page($pageNum,$pageSize)->select();
        $count=count($u->where($map)->select());
        if($info!=false){
          $res[data]=$info;
          $res[totalCount]=$count;
        }else{
          $res=0;
        }
      }else{
        $res=1;
      }
    
      $this->ajaxReturn($res,'JSON');
   }
   
    
    
}