<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Cate extends Controller
{
    public function product_category(){
            $cates=Db::name('cate')->select();
            return view('',['cates'=>$cates]);
    }
    public function add_product_category(){
        if(request()->isGet()){
            //调用模型层取得所有分类
            $cate=new \app\admin\model\Cate();
            $cates=$cate->cate_pid();
            return view('',['cates'=>$cates]);
        }
        if(request()->isPost()){
            //接值
            $cate_name=request()->post("cate_name");     //分类名称
            $cate_intro=request()->post("cate_intro"); //别名
            $cate_keyword=request()->post("cate_keyword"); //关键字
            $cate_desc=request()->post("cate_desc");//简单描述
            $cate_order=request()->post("cate_order");//排序
            $cate_pid=request()->post("cate_pid");
            //存入数据库
            $is=Db::name("cate")->insert(['cate_name'=>$cate_name,'cate_intro'=>$cate_intro,'cate_keyword'=>$cate_keyword,'cate_desc'=>$cate_desc,'cate_pid'=>$cate_pid,'cate_order'=>$cate_order]);
            if($is){
                $this->success("提交成功,请等待","cate/product_category");
            }else{
                $this->error("提交失败");
            }
        }
    }
}
