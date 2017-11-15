<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    //创建时间获取器，当模型对象调用此属性时，自动调用此方法
    public function getLastTimeAttr($val){

        return date('Y-m-d',$val);
    }

    public function setPasswordAttr($val){
        return md5($val);
    }

    public function setUpdateTimeAttr(){

        return time();
    }
}
