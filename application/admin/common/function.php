<?php
/**
 * Created by PhpStorm.
 * User: zhangshuo
 * Date: 2019/10/14
 * Time: 8:49
 */
function css($path=null){
    //var_dump($_SERVER);
    if($path){
        return $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/tp5/public/static".$path;
    }else{
        return $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/tp/public/static";
    }

}

