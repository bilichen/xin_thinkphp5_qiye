<?php
namespace app\admin\controller;

use app\admin\common\Base;

class Index extends Base
{
    public function index()
    {
        $this->isLogin();
        return $this->fetch();
    }
    public function welcome()
    {
        return $this->fetch();
    }


}
