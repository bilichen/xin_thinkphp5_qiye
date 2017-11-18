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

    public function add(Request $request){
        if($request->isAjax(true)){
            $data = $request->param();
//            p($data);die;
            //通过cate_id，查找相应的cate_order
            if($data['fid']==0){
                $order  = 1;
            }else{
                $order = CategoryModel::where('cate_id',$data['fid'])->value('cate_order')+1;
            }
            $data['cate_order'] =  $order;
//            p( $data['cate_order']);die;

            CategoryModel::create([
                'cate_name'  =>  $data['name'],
                'cate_order' => $data['cate_order'],
                'cate_pid' =>  $data['fid']
            ]);
            $status = 1;
            $message = '添加成功';

        }
//        p($message);die;
        return ['status'=>$status,'message'=>$message];
    }

    //分类编辑
    public function edit(Request $request)
    {
        $id = $request->param('id');
        $pid = CategoryModel::where('cate_id',$id)->value('cate_pid');
//        p($pid);die;
        $cate = CategoryModel::get($id);
        $data =  CategoryModel::all();
       $parentName = CategoryModel::getParentName($data,$pid);
//       p($cate);die;

        $this->assign('cate',$cate);
        $this->assign('parentName',$parentName);
        return $this->fetch('cate_edit');
    }

    public function update(Request $request){
        if($request->isAjax(true)){
            $data = $request->param();
//            p($data);die;

            if($data['is_update']==1){
//                $map = ['is_update' => $data['is_update']];
                CategoryModel::update(['cate_id'=>$request->param('id'),'cate_name'=>$data['cname']]);
                $status = 1;
                $message = '更新成功';
            }else{
                $status = 0;
                $message = '更新失败';
            }
        }
//        p($message);die;
        return ['status'=>$status,'message'=>$message];
    }

    public function del(Request $request)
    {
        if ($request->isAjax(true)) {
            //获取到要删除的id，要进行判断，是否还有子类，如果有要先删除子类，才能删除母类
            $id = $request->param('id');
            $data = CategoryModel::all();
            foreach ($data as $v) {
                if ($v['cate_pid'] == $id) {
                    $status = 0;
                    $message = '该类还有子类，不充许直接删除，请先删除子类';
                    return ['status' => $status, 'message' => $message];
                }
            }

            CategoryModel::destroy(['cate_id' => $id]);
            $status = 1;
            $message = '删除成功';
            return ['status' => $status, 'message' => $message];
        }
    }

}
