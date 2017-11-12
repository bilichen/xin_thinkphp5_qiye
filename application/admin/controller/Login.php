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

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
