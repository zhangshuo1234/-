<?php
namespace app\admin\model;

use think\Model;

class RoleModel extends Model{
    public function roleadd($data){
        $choudidi=self::name('role')->insert($data);
        if($choudidi){
            return true;
        }else{
            return false;
        }
    }
}