<?php
namespace app\admin\controller;

use app\admin\common\Base;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }
    public function welcome()
    {
        return $this->fetch();
    }
    public function question_list()
    {
        return $this->fetch();
    }
    public function question_del()
    {
        return $this->fetch();
    }
    public function banner_list()
    {
        return $this->fetch();
    }
    public function category()
    {
        return $this->fetch();
    }
    public function admin_list()
    {
        return $this->fetch();
    }
    public function sys_set()
    {
        return $this->fetch();
    }
}
