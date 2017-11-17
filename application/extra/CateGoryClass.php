<?php
namespace app\extra;

class CateGoryClass{

    //把所有的数据，压成分组数组
    static public function subtree($cate,$html = '&nbsp &nbsp -- &nbsp',$pid=0,$level=0) {
        $arr = array(); // 子孙数组
        foreach($cate as $v) {
            if($v['cate_pid'] == $pid) {
                $v['level'] = $level+1;
                $v['html'] = str_repeat($html,$level);
                $arr[] = $v; //
                $arr = array_merge($arr,self::subtree($cate,$html,$v['cate_id'],$level+1));
            }
        }
        return $arr;
    }
    //组合多维数组
    static public function unlimitedForLayer($cate,$name='child',$pid=0){
        $arr = array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $v[$name] = self::unlimitedForLayer($cate,$name,$v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }


    //获取当前数据的所有子数据
    static public function getChild($cate,$pid){
        $arr = array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $arr[] = $v;
                $arr = array_merge($arr,self::getChild($cate,$v['id']));
            }
        }
        return $arr;
    }
    //传进一个父级分类id,获取所有子级分类id
    static public function getChildsId($cate,$pid){
        $arr = array();
        foreach($cate as $v){
            if($v['pid'] == $pid){
                $arr[] = $v['id'];
                $arr = array_merge($arr,self::getChildsId($cate,$v['id']));
            }
        }
        return $arr;
    }

    //传进一个子级分类id，获取所有父级分类
    static public function getParent($cate,$id){
        $arr = array();
        foreach($cate as $v){
            if($v['cate_id'] == $id){
                $arr[] = $v;
                $arr = array_merge(self::getParent($cate,$v['cate_pid']),$arr);
            }
        }
        return $arr;
    }
    //传进一个子级分类pid，获取所有父级分类
    static public function getParentName($cate,$pid){
        $arr = array();
        foreach($cate as $v){
            if($v['cate_pid'] == $pid){
                $arr[] = $v;
                $arr = array_merge(self::getParent($cate,$v['cate_pid']),$arr);
            }
        }
        return $arr;
    }


}