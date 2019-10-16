<?php

namespace app\admin\controller;
use app\admin\service\NodeService;
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
            $node_three=new \app\admin\model\Node();
            $node_four =new NodeService();
            $NodeOrder=$node_four->getNodeOrder($node_three->all());
            return view('',['NodeOrder'=>$NodeOrder]);
        }
        if(request()->isPost()){
            $data=input("post.",'');
            $node_two=new \app\admin\model\Node();
            $node_two->allowField(true)->save($data);
            if($node_two){
                $this->success("权限添加成功","addnode");
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
