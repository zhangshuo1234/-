<?php
namespace app\admin\controller;
use app\admin\model\Admin;
use think\Controller;
class Manager extends Controller{
    public function admin_show(){

          return view();
    }
    public function addmanager(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            $data=input('post.','');
            $data['admin_time']=time();
            $data['admin_pwd']=md5($data['admin_pwd']);
            $manager=new Admin();
            $manager->admin_name=$data['admin_name'];
            $manager->admin_email=$data['admin_email'];
            $manager->admin_time=$data['admin_time'];
            $manager->admin_pwd=$data['admin_pwd'];
            $manager->save();
            if($manager){
                $this->success('添加管理员','addmanager');
            }else{
                $this->error('添加失败');
            }
        }
    }
}