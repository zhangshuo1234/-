<?php
namespace app\admin\controller;

class Index
{
    public function index()
    {
        return view();
    }
    public function product_category(){
        return view();
    }
    public function add_product_category(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            request()->post("")
        }
    }
}
