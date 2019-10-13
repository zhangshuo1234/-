<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

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
            //判断对比
            //连接数据库
            $admin=Db::name("admin")->where(["admin_name"=>$admin_name])->find();

            if($admin){
                if(Db::name("admin")->where(["admin_pwd"=>$admin_pwd])->find()){
                     $this->success("登录成功","index/index");
                }else{
                    echo "密码错误";
                }

            }else{
                echo "管理员不存在";
            }
        }
    }
}