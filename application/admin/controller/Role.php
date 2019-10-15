<?php
namespace app\admin\controller;


use think\Controller;

class Role extends Controller{

    public function role_show(){
        return view();
    }
    public function addrole(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            $role_name=request()->post("role_name");
            $role_desc=request()->post("role_desc");
            $data=[
                'role_name'=>$role_name,
                'role_desc'=>$role_desc
            ];
            $role=new \app\admin\model\Role();
            if($role->roleadd($data)){
                $this->success("添加角色成功");
            }else{
                $this->error("添加失败");
            }
        }
    }
}