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
    public function questionList()
    {
        return $this->fetch();
    }
    public function question_del()
    {
        return $this->fetch();
    }
}
