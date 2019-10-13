<?php
namespace app\admin\model;
use think\Db;
use think\Model;
class CateModel extends Model{
    public function cate_pid(){
         $cates=Db::name('cate')->select();
        return $this->cateByRecursion($cates);

    }
    public function cateByRecursion($cate,$pid=0,$level=0){
        $orderCate=[];
        foreach($cate as $key=>$val) {
            if ($val['cate_pid'] == $pid) {

            $orderCate[] = $val;
            $val['level']=$level;
            $orderCate = array_merge($orderCate, $this->cateByRecursion($cate, $val['cate_id'], $level));
            }
        }
        return $orderCate;
    }

}