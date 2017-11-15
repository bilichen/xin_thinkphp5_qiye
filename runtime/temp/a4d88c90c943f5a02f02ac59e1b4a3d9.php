<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\manger\manger_list.html";i:1510667777;s:86:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\header.html";i:1510496935;}*/ ?>
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
              <a><cite>管理员列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">

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
                            登录名
                        </th>

                        <th>
                            邮箱
                        </th>
                        <th>
                            登录次数
                        </th>
                        <th>
                            最后一次登录时间
                        </th>
                        <th>
                            是否充许修改
                        </th>
                        <th>
                            修改时间
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td>
                            1
                        </td>
                        <td>
                           <?php echo $admin['username']; ?>
                        </td>
                        <td >
                            <?php echo $admin['email']; ?>

                        </td>
                        <td >
                            <?php echo $admin['login_count']; ?>

                        </td>
                        <td>
                            <?php echo $admin['last_time']; ?>
                        </td>
                        <td>
                            <?php echo $admin['is_update']; ?>
                        </td>
                        <td>
                            <?php echo $admin['update_time']; ?>
                        </td>
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="admin_edit('编辑','<?php echo url("manger/edit"); ?>'+'?id='+<?php echo $admin['id']; ?>,'4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script src="__STATIC__/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="__STATIC__/admin/js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['laydate','element','laypage','layer'], function(){
//                $ = layui.jquery;//jquery
//                layer = layui.layer;//弹出层
            });
            //编辑
            function admin_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h);
            }

        </script>


    </body>
</html>