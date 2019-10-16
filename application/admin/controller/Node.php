<?php

namespace app\admin\controller;
use think\Request;
class Node extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function node_show()
    {
        return view();
    }


    public function addnode()
    {
        if(request()->isGet()){
            $data=\app\admin\model\Node::all()->toArray();
            return view('',['node_cate'=>$data]);
        }
        if(request()->isPost()){
            $data=input("post.",'');
            $node_two=new \app\admin\model\Node();
            $node_two->save($data);
            if($node_two){
                $this->success("权限添加成功","add");
            }else{
                $this->error("添加失败");
            }
        }

    }

    public function updata(){
        echo "我是权限修改";
    }
    public function delete(){
        echo "我是修改";
    }

}
