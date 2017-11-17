<?php

namespace app\admin\model;

use think\Model;
use app\extra\CateGoryClass;


class Category extends Model
{
    //
    static public function getCate(){
        $data = Category::all();
        $data = collection($data)->toArray();
//        p($data);die;
       return CateGoryClass::subtree($data);
    }

    //获取父级分类名称
    static public function getParentName($cate,$id){
        return CateGoryClass::getParent($cate,$id);
    }
}
