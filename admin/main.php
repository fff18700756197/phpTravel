<?php
session_start();
if(!isset($_SESSION['id'])||!isset($_SESSION['username'])){
    header('Location:login.php');
}
//查询管理员
require "../lib/connect.php";

$result=$mysqli->query("select * from manager")->fetch_assoc();
//var_dump($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Travel后台管理系统</title>
    <!--1改-->
    <link rel="stylesheet" href="../static/layui/css/layui.css">
    <style>
        iframe{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
    </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">Travel后台管理系统</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <!--导航右侧-->
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="../<?php echo $result['manager_img']?>" class="layui-nav-img">
<?php echo $result['username']?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <!--1.导航管理-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">导航管理</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="navinsert.php" target="content">导航添加</a></dd>
                        <dd><a href="navselect.php" target="content">导航查询</a></dd>
                    </dl>
                </li>
                <!--2.产品分类管理-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">产品分类管理</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="categoryinsert.php" target="content">产品分类添加</a></dd>
                        <dd><a href="categoryselect.php" target="content">产品分类查询</a></dd>
                    </dl>
                </li>
                <!--3.产品管理-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">产品管理</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="goodsinsert.php" target="content">产品添加</a></dd>
                        <dd><a href="goodselect.php" target="content">产品查询</a></dd>
                    </dl>
                </li>
                <!--4.团队管理-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">团队管理</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="teaminsert.php" target="content">团队添加</a></dd>
                        <dd><a href="teamselect.php" target="content">团队查询</a></dd>
                    </dl>
                </li>
                <!--5.管理员信息-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">管理员信息</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="managerinsert.php" target="content">管理员添加</a></dd>
                        <dd><a href="managerselect.php" target="content">管理员查询</a></dd>
                    </dl>
                </li>
                <!--6.在线预约-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">在线预约</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="onlineselect.php" target="content">在线预约查询</a></dd>
                    </dl>
                </li>
                <!--7.分店-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">分店</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="addressinsert.php" target="content">分店添加</a></dd>
                        <dd><a href="addressselect.php" target="content">分店查询</a></dd>
                    </dl>
                </li>
                <!--8.轮播图-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">轮播图</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="bannerinsert.php" target="content">轮播图添加</a></dd>
                        <dd><a href="bannerselect.php" target="content">轮播图查询</a></dd>
                    </dl>
                </li>
                <!--9.服务项目-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">服务项目</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="serviceinsert.php" target="content">服务项目添加</a></dd>
                        <dd><a href="serviceselect.php" target="content">服务项目查询</a></dd>
                    </dl>
                </li>
                <!--10.新闻资讯-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">新闻资讯</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="newsinsert.php" target="content">新闻资讯添加</a></dd>
                        <dd><a href="newsselect.php" target="content">新闻资讯查询</a></dd>
                    </dl>
                </li>
                <!--11.关于我们-->
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;  ">关于我们</a>
                    <dl class="layui-nav-child">
                        <!--4改-->
                        <dd><a href="about-usinsert.php" target="content">公司简介</a></dd>
                    </dl>
                </li>

            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;height: 95%">
            <!--3改-->
            <iframe src="about-usinsert.php" name="content" frameborder="0"></iframe>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
</div>
</div>
<!--2改-->
<script src="../static/layui/layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
    var element = layui.element;

});
</script>
</body>
</html>
