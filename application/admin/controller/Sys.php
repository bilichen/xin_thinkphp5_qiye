<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\System;
use think\Request;

class Sys extends Base
{
    //系统设置显示模版
    public function index()
    {
        $system = System::get(1);
        $this->assign('system',$system);
        return $this->fetch('sys_set');
    }

   //更新系统设置
    public function update(Request $request)
    {

        if($request->isAjax(true)){
            $data = $request->param();

            if($data['is_update']==1){
                $map = ['is_update' => $data['is_update']];
                System::update($data,$map);
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
