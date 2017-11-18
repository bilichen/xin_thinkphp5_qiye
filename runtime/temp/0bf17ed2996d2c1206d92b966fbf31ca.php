<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\category\category.html";i:1511021961;s:86:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\header.html";i:1510496935;s:88:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\admin_js.html";i:1510587375;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
    X-admin v1.0
  </title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="__STATIC__/admin/css/x-admin.css" media="all">
</head>

    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>分类管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form x-center" action="" style="width:50%">
                <div class="layui-form-pane" style="margin-top: 15px;">
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:60px">所属分类</label>
                    <div class="layui-input-inline" style="width:120px;text-align: left">
                        <select name="fid">
                            <option value="0">顶级分类</option>
                            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value=<?php echo $vo['cate_id']; ?>><?php echo $vo['html']; ?><?php echo $vo['cate_name']; ?></option>

                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </select>
                    </div>
                    <div class="layui-input-inline" style="width:120px">
                        <input type="text" name="name"  placeholder="分类名" autocomplete="off" class="layui-input">
                    </div>

                      <div class="layui-input-inline" style="width:80px">
                        <button id="add" type="button" class="layui-btn"  lay-submit="" lay-filter="add"><i class="layui-icon">&#xe608;</i>增加</button>
                    </div>
                  </div>
                </div> 
            </form>


            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            排序
                        </th>
                        <th>
                            分类名
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td>
                            <input type="checkbox" value="<?php echo $vo['cate_id']; ?>" name="">
                        </td>
                        <td>
                            <?php echo $vo['cate_id']; ?>
                        </td>
                        <td>
                            <?php echo $vo['cate_order']; ?>
                        </td>
                        <td>
                            <?php echo $vo['html']; ?><?php echo $vo['cate_name']; ?>
                        </td>
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="cate_edit('编辑','<?php echo url("category/edit"); ?>'+'?id='+<?php echo $vo['cate_id']; ?>,'4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>

                            <a title="删除" href="javascript:;" onclick="cate_del('<?php echo $vo['cate_name']; ?>','<?php echo $vo['cate_id']; ?>')"
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <script src="__STATIC__/admin/js/jquery.min.js"></script>
<script src="__STATIC__/admin/lib/layui/layui.js" charset="utf-8"></script>
<script src="__STATIC__/admin/js/x-admin.js"></script>

        <script src="__STATIC__/admin/js/x-layui.js" charset="utf-8"></script>

        <script>
            layui.use(['element','layer','form'], function(){
                $ = layui.jquery;//jquery
              lement = layui.element();//面包导航
              layer = layui.layer;//弹出层
              form = layui.form();

//              //监听提交
//              form.on('submit(add)', function(data){
//                console.log(data);
//                //发异步，把数据提交给php
//                layer.alert("增加成功", {icon: 6});
//                return false;
//              });


            })



              
            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }

             //-编辑
            function cate_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
           
            /*-删除*/
            function cate_del(cname,id){
                layer.confirm('确定要删除'+cname+'分类吗？',{
                    btn:['确定','取消']
                },function(index){
                    layer.close(index);
                    console.log("点击了确定");
                    $.ajax({
                        type:'POST',
                        url:"<?php echo url('category/del'); ?>",
                        data: {"id":id},
                        dataType:"json",
                        success:function (data){
                            if(data.status==1){
                                alert(data.message);
                                window.location.reload();
                            }else{
                                alert(data.message);

                            }
                        }
                    })

                },function(){
                    console.log("点击了取消");
                })
            }
            </script>
        <script>
            //用ajax提交表单
            $(function(){
                $('#add').on('click',function(){
                    $.ajax({
                        type:'POST',
                        url:"<?php echo url('category/add'); ?>",
                        data:$(".layui-form").serialize(),
                        dataType:"json",
                        success:function (data){
                            if(data.status==1){
                                alert(data.message);
                                window.location.reload();
                            }else{
                                alert(data.message);

                            }
                        }
                    })
                });
            });

        </script>

    </body>
</html>