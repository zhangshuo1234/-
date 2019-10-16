<?php
namespace app\admin\controller;

use think\Controller;
use think\facade\Cookie;
use think\facade\Session;

class Common extends Controller{
    public function __construct()
    {
        parent::__construct();
        if(Cookie::get('admin')&&!Session::get('admin')){
            $data=Cookie::get('admin');
            Session::set('admin',$data);
        }
        if(!Session::get('admin')){
            $this->success("非法登录",'login/login');
        }
    }
}