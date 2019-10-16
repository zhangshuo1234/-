<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\facade\Cookie;
use think\facade\Session;


class Login extends Controller
{
    public function login()
    {
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            //接值
            $admin_name=request()->post("admin_name",'');
            $admin_pwd=request()->post("admin_pwd","");
            $admin_save=request()->post("save")?1:0;
            //判断对比
            //连接数据库
            $admin=Db::name("admin")->where(["admin_name"=>$admin_name])->find();

            if($admin){
                if(Db::name("admin")->where(["admin_pwd"=>$admin_pwd])->find()){
                    //存储cookie  session
                    if($admin_save==1){
                        Cookie::set('admin',$admin,7*24*3600);
                    }
                     Session::set('admin',$admin);
                     $this->success("登录成功","index/index");
                }else{
                    echo "密码错误";
                }

            }else{
                echo "管理员不存在";
            }
        }
    }
    public function loginout(){

        if(!Cookie::delete('admin')){
            if(!Session::delete('admin')){
                $this->success('退出成功','Login/login');
            }else{
                $this->error('退出失败');
            }
        }else{
            $this->error('退出失败');
        }
    }
}