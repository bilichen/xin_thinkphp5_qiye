<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\category\cate_edit.html";i:1511014869;s:86:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\header.html";i:1510496935;s:88:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\admin_js.html";i:1510587375;}*/ ?>
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
        <div class="x-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label class="layui-form-label">ID</label>
                    <div class="layui-input-inline">
                        <input type="text" name="id"  value="<?php echo $cate['cate_id']; ?>" readonly="true" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">上级分类</label>
                    <div class="layui-input-inline" >
                        <input type="text" value="<?php echo $parentName; ?>" disabled="" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="cname" class="layui-form-label">
                        <span class="x-red">*</span>分类名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="cname" name="cname" required="" lay-verify="required"
                               autocomplete="off" class="layui-input" value="<?php echo $cate['cate_name']; ?>">
                    </div>
                </div>

                <input type="hidden" name="is_update" value="<?php echo $cate['is_update']; ?>">


                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button id="btnUpdate" type="button" class="layui-btn" lay-filter="save" lay-submit="">
                        保存
                    </button>
                </div>
            </form>
        </div>
        <script src="__STATIC__/admin/js/jquery.min.js"></script>
<script src="__STATIC__/admin/lib/layui/layui.js" charset="utf-8"></script>
<script src="__STATIC__/admin/js/x-admin.js"></script>


        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
              
            });
        </script>

        <script>
            //用ajax提交表单
            $(function(){
                $('#btnUpdate').on('click',function(){
                    $.ajax({
                        type:'POST',
                        url:"<?php echo url('category/update'); ?>",
                        data:$(".layui-form").serialize(),
                        dataType:"json",
                        success:function (data){
                            if(data.status==1){
                                alert(data.message);
//                                window.location.href="<?php echo url('manger/index'); ?>"
                                window.parent.location.reload();//关闭弹出层，需要刷新父页面
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                            }else{
                                alert(data.message);
                                window.location.href="<?php echo url('manger/edit'); ?>"

                            }
                        }
                    })
                });
            });

        </script>



    </body>

</html>