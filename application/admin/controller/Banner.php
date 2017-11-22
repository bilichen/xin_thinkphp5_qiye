<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\admin\model\Banner as BannerModel;

class Banner extends Base
{
    //显示轮播页面
    public function index()
    {
        $data = BannerModel::all();
//        $data = collection($data)->toArray();
        $this->assign('data',$data);
//        p($data);die;
        return $this->fetch('banner_list');
    }

    //显示添加轮播页面
    public function addIndex()
    {

        return $this->fetch('banner_add');
    }

    //添加轮播处理方法
    public function addHandle(Request $request)
    {
        //
        p('addHandle');die;
    }


//    public function upload()
//    {
//        //
//        p('upload');die;
//    }


    public function upload(){
       //1、判断是否post提交
        if($this->request->isPost()){
            //2、获取提交过来的数据，最后true参数，表示连上传文件一起获取
            $data = $this->request->param(true);
            //3、获取上传的文件对象
            $file = $this->request->file('image');
            //4、判断上传的文件对象是否为空
            if(empty($file)){
                $this->error('上传文件不存在');
            }
            //5、对上传文件做出条件限制（类型，大小等）
            $map = [
                'ext'=>'jpg,png',//后辍名
                'size'=>3000000,//最大3M
            ];
            //6、对上传的文件进行较验，如果合格就进行转移到预定设定好的public/uploads目录下
            //返回保存的文件信息info，包括文件名和大小等数据
            $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
            if(is_null($info)){
                $this->error($info->getError());
            }
            $data['image'] = $info->getSaveName();

           $res = BannerModel::create($data);
            if(is_null($res)){
                $this->error('文件添加失败');
            }else{

                $this->success('文件添加成功...');
            }
        }

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
