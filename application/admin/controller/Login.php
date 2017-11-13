<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Admin;
use think\Request;
use think\Session;

class Login extends Base
{
    //显示登录界面
    public function index()
    {
//        $where = ['username'=>'admin'];
//       $result = Admin::get($where);
//        dump($result);
//        die;
        $this->repeatLogin();
        return $this->fetch('login');
    }

    //登录提交表单处理
    public function formHandle()
    {
        $username = $_POST['username'];
        $where = ['username'=>$username];
        $admin = Admin::get($where);
        if($admin){//验证账号，true表示username=name有数据
            $data = $admin->getdata();
            if(md5($_POST['password']) == $data['password']){//验证密码

                //更新数据库登录次数和时间
                $admin->setInc('login_count');
                $admin->save(['last_time'=>time()]);

                //保存数据到session，以别其它控制器验证是否登录
                Session::set('user_id',$username);
                Session::set('user_info',$data);


                $this->success('用户登录成功，正在跳转',url('index/index'));
            }else{
                return $this->fetch('login');
            }
        }else{
            return $this->fetch('login');
        }
    }

    //退出账号，回到登录界面
    public function logout()
    {
        Session::delete('user_id');
        Session::delete('user_info');
        return $this->fetch('login');
    }


}
