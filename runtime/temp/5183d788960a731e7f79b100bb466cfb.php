<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\manger\manger_edit.html";i:1510667707;s:86:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\header.html";i:1510496935;s:88:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\admin_js.html";i:1510587375;}*/ ?>
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
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>登录名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" required="" lay-verify="required" value="<?php echo $admin['username']; ?>"
                        autocomplete="off" class="layui-input" disabled>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>用户名admin不充许修改
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="email" required="" lay-verify="email" value="<?php echo $admin['email']; ?>"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_pass" name="password" required="" lay-verify="pass"
                        autocomplete="off" class="layui-input" value="" placeholder="请输入密码">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>

                <input type="hidden" name="is_update" value="<?php echo $admin['is_update']; ?>">
                <input type="hidden" name="update_time" value="<?php echo $admin['update_time']; ?>">

                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button id="submit" type="button" class="layui-btn" lay-filter="save" lay-submit="">
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
            $('#submit').on('click',function(){
                $.ajax({
                        type:'POST',
                        url:"<?php echo url('manger/update'); ?>",
                        data:$(".layui-form").serialize(),
                        dataType:"json",
                        success:function (data){
                            if(data.status==1){
                                alert(data.message);
//                                window.location.href="<?php echo url('manger/index'); ?>"
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