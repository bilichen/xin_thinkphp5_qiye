<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Admin;
use think\Request;

class Manger extends Base
{
    //管理员首页
    public function index()
    {
        $admin = Admin::get(['username'=>'admin']);
        $this->assign('admin',$admin);
        return $this->fetch('manger_list');
    }

    //管理员编辑
    public function edit(Request $request)
    {
        $admin = Admin::get($request->param('id'));
        $this->assign('admin',$admin);
        return $this->fetch('manger_edit');
    }

    //管理员数据更新
    public function update(Request $request){

        if($request->isAjax(true)){
         $data = $request->param();

            if($data['is_update']==1){
                $map = ['is_update' => $data['is_update']];
                Admin::update($data,$map);
                $status = 1;
                $message = '更新成功';
            }else{
                $status = 0;
                $message = '更新失败';
            }
        }
        return ['status'=>$status,'message'=>$message];


    }

}
