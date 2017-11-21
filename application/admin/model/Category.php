<?php

namespace app\admin\model;

use think\Model;
use app\extra\CateGoryClass;


class Category extends Model
{
    //方法一
    static public function getCate(){
        $data = Category::all();
        $data = collection($data)->toArray();
       return CateGoryClass::subtree($data);
    }
    //方法二,视频教的方法，获取分类表，也是用递归，大同小易
//    static public function getCate(){
//
//        return CateGoryClass::getCate();
//    }

    //获取父级分类名称
    static public function getParentName($cate,$id){
        $parentName = CateGoryClass::getParent($cate,$id);
//        $var = '';
//        p($parentName);die;
        if(empty($parentName)){
            $var = '顶级';
        }else{
            $var = $parentName[0];//这里只判断只有一个父级，如果是多层则要改变方法
        }


        return $var;
    }
}
