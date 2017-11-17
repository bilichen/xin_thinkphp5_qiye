<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Category as CategoryModel;
use think\Request;

class Category extends Base
{
    //显示分类页面
    public function index()
    {
       $cate = CategoryModel::getCate();
//        p($cate);die;
        $this->assign('cate',$cate);
        return $this->fetch('category');
    }

    //分类编辑
    public function edit(Request $request)
    {
        $id = $request->param('id');
        $pid = CategoryModel::where('cate_id',$id)->value('cate_pid');
        p($pid);die;
        $cate = CategoryModel::get($id);
        $data =  CategoryModel::all();
//        p($id);die;
       $parent = CategoryModel::getParentName($data,$id);
        p($parent);die;
        $this->assign('cate',$cate);
        return $this->fetch('cate_edit');
    }

}
