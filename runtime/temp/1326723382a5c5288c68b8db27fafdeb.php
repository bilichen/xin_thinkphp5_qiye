<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\sys\sys_set.html";i:1510917557;s:86:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\header.html";i:1510496935;s:88:"E:\xampp\htdocs\xin_thinkphp5_qiye\public/../application/admin\view\public\admin_js.html";i:1511068606;}*/ ?>
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
              <a><cite>基本设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
              <ul class="layui-tab-title">
                <li class="layui-this">网站设置</li>
              </ul>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
                    <form class="layui-form layui-form-pane" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>网站名称
                            </label>
                            <div class="layui-input-block">
                                <input type="text" name="title" autocomplete="off" placeholder="控制在25个字、50个字节以内"
                                class="layui-input" value="<?php echo $system['title']; ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>关键词
                            </label>
                            <div class="layui-input-block">
                                <input type="text" name="keyword" autocomplete="off" placeholder="5个左右,8汉字以内,用英文,隔开"
                                class="layui-input" value="<?php echo $system['keyword']; ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>描述
                            </label>
                            <div class="layui-input-block">
                                <input type="text" name="desc" autocomplete="off" placeholder="空制在80个汉字，160个字符以内"
                                class="layui-input" value="<?php echo $system['desc']; ?>" >
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="AppId" class="layui-form-label">
                                <span class="x-red">*</span>是否开启
                            </label>
                            <div class="layui-input-block">
<!--                                <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" title="开关">-->
                                <select name="is_close">
                                    <?php if($system["is_close"] == '0'): ?>
                                    <option value="0" selected="selected">开启网站</option>
                                    <option value="1">关闭网站</option>
                                    <?php else: ?>
                                    <option value="0">开启网站</option>
                                    <option value="1" selected="selected">关闭网站</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="is_update" value="<?php echo $system['is_update']; ?>">

                        <div class="layui-form-item">
                            <button id="submit" type="button" class="layui-btn" lay-submit="" lay-filter="*">
                                保存
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
              </div>
            </div> 
        </div>
        <script src="__STATIC__/admin/js/jquery.min.js"></script>
<script src="__STATIC__/admin/lib/layui/layui.js" charset="utf-8"></script>
<script src="__STATIC__/admin/js/x-admin.js"></script>

<!--引入bootstrap-->
<!--<link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/bootstrap/css/bootstrap.css" />-->
<!--<script type="text/javascript" src="__STATIC__/admin/lib/bootstrap/js/bootstrap.js"></script>-->

        <script>
            layui.use(['element','layer','form'], function(){
                $ = layui.jquery;//jquery
              lement = layui.element();//面包导航
              layer = layui.layer;//弹出层
              form = layui.form()
              })
            </script>
        <script>
            //用ajax提交表单
            $(function(){
                $('#submit').on('click',function(){
                    $.ajax({
                        type:'POST',
                        url:"<?php echo url('sys/update'); ?>",
                        data:$(".layui-form").serialize(),
                        dataType:"json",
                        success:function (data){
                            if(data.status==1){
                                alert(data.message);
                            }else{
                                alert(data.message);
                            }
                            window.location.reload();
                        }
                    })
                });
            });

        </script>

    </body>
</html>