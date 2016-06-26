<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IF43.COM后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Application/admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Application/admin/Public/css/main.css"/>
    <script type="text/javascript" src="/Application/admin/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/Application/admin/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Application/admin/Public/js/adminJs.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/Admin/index">首页</a></li>
                <li><a href="/" target="_blank">前台首页</a></li>
                <li>HELLO!~<span class="fuchsia"><?php echo ($_SESSION['admin']['realname']); ?></span> 欢迎你的登录!</li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="/Admin/Manager/index">管理员</a></li>
                <li><a href="/Admin/Manager/changepwd/id/<?php echo ($_SESSION['admin']['id']); ?>">修改密码</a></li>
                <li><a href="/Admin/login/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
<!--引入左面的菜单-->
<!--------left_Action--------->
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
            	<li>
                    <h3><a href="javascript:void(0);"><i class="icon-font">&#xe034;</i>广告管理</a></h3>
                    <ul class="sub-menu" style="display:<?php echo CONTROLLER_NAME== 'Adv' || CONTROLLER_NAME== 'AdvType' ? 'block':'none'; ?>;">
                        <li><a href="/Admin/AdvType/index" <?php echo CONTROLLER_NAME== 'AdvType' && ACTION_NAME== 'index'? "class='olive'":''; ?>><i class="icon-font">&#xe034;</i>广告类型</a></li>
                        <li><a href="/Admin/AdvType/add" <?php echo CONTROLLER_NAME== 'AdvType' && ACTION_NAME== 'add'? "class='olive'":''; ?>><i class="icon-font">&#xe026;</i>添加类型</a></li>
                        <li><a href="/Admin/Adv/index/type_id/0" <?php echo CONTROLLER_NAME== 'Adv' && ACTION_NAME== 'index'? "class='olive'":''; ?>><i class="icon-font">&#xe005;</i>广告列表</a></li>
                        <li><a href="/Admin/Adv/add/type_id/0" <?php echo CONTROLLER_NAME== 'Adv' && ACTION_NAME== 'add'? "class='olive'":''; ?>><i class="icon-font">&#xe026;</i>添加广告</a></li>
                    </ul>
                </li>
                <li>
                    <h3><a href="javascript:void(0);"><i class="icon-font">&#xe013;</i>精品管理</a></h3>
                    <ul class="sub-menu" style="display:<?php echo CONTROLLER_NAME== 'Category' || CONTROLLER_NAME== 'Pro' || CONTROLLER_NAME== 'Type'|| CONTROLLER_NAME== 'Attribute'? 'block':'none'; ?>;">
                        <li><a href="/Admin/Category/index" <?php echo CONTROLLER_NAME== 'Category' && ACTION_NAME== 'index'? "class='olive'":''; ?>><i class="icon-font">&#xe006;</i>精品分类</a></li>
                        <li><a href="/Admin/Type/index" <?php echo CONTROLLER_NAME== 'Type' && ACTION_NAME== 'index'? "class='olive'":''; ?>><i class="icon-font">&#xe034;</i>精品类型</a></li>
                        <li><a href="/Admin/Pro/index" <?php echo CONTROLLER_NAME== 'Pro' && ACTION_NAME== 'index'? "class='olive'":''; ?>><i class="icon-font">&#xe005;</i>精品列表</a></li>
                        <li><a href="/Admin/Pro/add" <?php echo CONTROLLER_NAME== 'Pro' && ACTION_NAME== 'add'? "class='olive'":''; ?>><i class="icon-font">&#xe026;</i>添加精品</a></li>
                    </ul>
                </li>
                <li>
                    <h3><a href="#"><i class="icon-font">&#xe014;</i>会员管理</a></h3>
                    <ul class="sub-menu" style="display:<?php echo CONTROLLER_NAME== 'Member' ? 'block':'none'; ?>;">
                        <li><a href="/Admin/Member/index" <?php echo CONTROLLER_NAME== 'Member' && ACTION_NAME== 'index'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe048;</i>会员列表</a></li>
                        <li><a href="/Admin/Member/add" <?php echo CONTROLLER_NAME== 'Member' && ACTION_NAME== 'add'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe026;</i>添加会员</a></li>
                    </ul>
                </li>
                <li>
                    <h3><a href="#"><i class="icon-font">&#xe012;</i>评价管理</a></h3>
                    <ul class="sub-menu" style="display:<?php echo CONTROLLER_NAME== 'Comment' ? 'block':'none'; ?>;">
                        <li><a href="/Admin/Comment/index" <?php echo CONTROLLER_NAME== 'Comment' && ACTION_NAME== 'index'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe048;</i>评价列表</a></li>
                    </ul>
                </li>
                <li>
                    <h3><a href="#"><i class="icon-font">&#xe043;</i>主题管理</a></h3>
                    <ul class="sub-menu" style="display:<?php echo CONTROLLER_NAME== 'Topic' ? 'block':'none'; ?>;">
                        <li><a href="/Admin/Topic/index" <?php echo CONTROLLER_NAME== 'Topic' && ACTION_NAME== 'index'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe048;</i>主题列表</a></li>
                        <li><a href="/Admin/Topic/add" <?php echo CONTROLLER_NAME== 'Topic' && ACTION_NAME== 'add'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe026;</i>添加主题</a></li>
                    </ul>
                </li>
                <li>
                    <h3><a href="#"><i class="icon-font">&#xe018;</i>管理员模块</a></h3>
                    <ul class="sub-menu" style="display:<?php echo CONTROLLER_NAME== 'Manager' || CONTROLLER_NAME== 'Auth'? 'block':'none'; ?>;">
                        <li><a href="/Admin/Manager/index" <?php echo CONTROLLER_NAME== 'Manager' && ACTION_NAME== 'index'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe048;</i>管理员列表</a></li>
                        <li><a href="/Admin/Manager/add" <?php echo CONTROLLER_NAME== 'Manager' && ACTION_NAME== 'add'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe026;</i>添加管理员</a></li>
                        <li><a href="/Admin/Auth/index" <?php echo CONTROLLER_NAME== 'Auth' && ACTION_NAME== 'index'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe014;</i>角色列表页</a></li>
                        <li><a href="/Admin/Auth/addRole" <?php echo CONTROLLER_NAME== 'Auth' && ACTION_NAME== 'addRole'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe026;</i>添加角色</a></li>
                        <li><a href="/Admin/Auth/authList" <?php echo CONTROLLER_NAME== 'Auth' && ACTION_NAME== 'authList'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe015;</i>权限列表</a></li>
                        <li><a href="/Admin/Auth/add" <?php echo CONTROLLER_NAME== 'Auth' && ACTION_NAME== 'add'? "class='olive'":''; ?>>&nbsp;<i class="icon-font">&#xe026;</i>添加权限</a></li>
                    </ul>
                </li>
                <li>
                    <h3><a href="#"><i class="icon-font">&#xe035;</i>项目架构</a></h3>
                    <ul class="sub-menu"  style="display:none;">
                  	    <li><a href="/Public/img/map1.png" target="_blank"><i class="icon-font">&#xe036;</i>项目草图</a></li>
                        <li><a href="/Public/img/map2.png" target="_blank"><i class="icon-font">&#xe036;</i>架构思维脑图</a></li>
                        <li><a href="/Public/img/map3.png" target="_blank"><i class="icon-font">&#xe036;</i>全站表设计</a></li>
                        <?php $__FOR_START_1517__=1;$__FOR_END_1517__=70;for($i=$__FOR_START_1517__;$i < $__FOR_END_1517__;$i+=1){ ?><li><a href="system.html"><i class="icon-font">&#xe0<?php echo ($i); ?>;</i><?php echo ($i); ?></a></li><?php } ?>
                    </ul>
                </li>
            </ul>
            <h4 class="allright">© 2015 <a href="/" target="_blank">IF43.COM</a> <br />All Rights Reserved</h4>
        </div>
    </div>
<!--------left_End--------->
<!--------Main_Action--------->
    <div class="main-wrap">
        

<div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>欢迎来到 IF43.COM 后台管理程序!</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="/Admin/AdvType/index"><i class="icon-font">&#xe001;</i>广告管理</a>
                    <a href="/Admin/Pro/index"><i class="icon-font">&#xe005;</i>精品管理</a>
                    <a href="/Admin/Member/index"><i class="icon-font">&#xe048;</i>会员管理</a>
                    <a href="/Admin/Comment/index"><i class="icon-font">&#xe041;</i>评价管理</a>
                    <a href="#"><i class="icon-font">&#xe01e;</i>主题管理</a>
                    <a href="/Admin/Manager/index"><i class="icon-font">&#xe01e;</i>管理员模块</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list" style=" height:520px; overflow-y:scroll;">
                    <li><label class="res-lab">服务器解译引擎：</label><span class="res-info"><?php echo $_SERVER['SERVER_SOFTWARE'] ?></span></li>
                    <li><label class="res-lab">系统类型</label><span class="res-info"><?php echo php_uname('s') ?></span></li>
                    <li><label class="res-lab">系统版本号</label><span class="res-info"><?php echo php_uname('r') ?></span></li>
                    <li><label class="res-lab">PHP运行方式：</label><span class="res-info"><?php echo php_sapi_name() ?></span></li>
                    <li><label class="res-lab">前进程用户名</label><span class="res-info"><?php echo Get_Current_User() ?></span></li>
                    <li><label class="res-lab">PHP版本</label><span class="res-info"><?php echo PHP_VERSION ?></span></li>
                    <li><label class="res-lab">Zend版本：</label><span class="res-info"><?php echo Zend_Version() ?></span></li>
                    <li><label class="res-lab">PHP安装路径：</label><span class="res-info"><?php echo DEFAULT_INCLUDE_PATH ?></span></li>
                    <li><label class="res-lab">Http请求中Host值：</label><span class="res-info"><?php echo $_SERVER["HTTP_HOST"] ?></span></li>
                    <li><label class="res-lab">服务器IP：</label><span class="res-info"><?php echo GetHostByName($_SERVER['SERVER_NAME']) ?></span></li>
                    <li><label class="res-lab">接受请求的服务器IP：</label><span class="res-info"><?php echo $_SERVER["SERVER_ADDR"] ?></span></li>
                    <li><label class="res-lab">客户端IP：</label><span class="res-info"><?php echo $_SERVER['REMOTE_ADDR'] ?></span></li>
                    <li><label class="res-lab">服务器系统目录：</label><span class="res-info"><?php echo $_SERVER['SystemRoot'] ?></span></li>
                    <li><label class="res-lab">服务器域名：</label><span class="res-info"><?php echo $_SERVER['SERVER_NAME'] ?></span></li>
                    <li><label class="res-lab">服务器语言：</label><span class="res-info"><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?></span></li>
                    <li><label class="res-lab">服务器Web端口：</label><span class="res-info"><?php echo $_SERVER['SERVER_PORT'] ?></span></li>
                    <li><label class="res-lab">HTTP版本：</label><span class="res-info"><?php echo $_SERVER['SERVER_PROTOCOL'] ?></span></li>
                    <li><label class="res-lab">系统类型及版本号：</label><span class="res-info"><?php echo php_uname() ?></span></li>
                    <li><label class="res-lab">当前文件绝对路径：</label><span class="res-info"><?php echo __FILE__ ?></span></li>
                </ul>
            </div>
        </div>
        <!--<div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">官方交流网站：</label><span class="res-info"><a href="http://www.mycodes.net/" target="_blank">源码之家</a></span>
                    </li>
                    <li>
                        <label class="res-lab">官方交流QQ群：</label><span class="res-info"><a class="qq-link" target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=4ba39c297a33fa548de56a257f6128c7c9e3dd14473e4c86557d93f2197c33e8"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="JS-前端开发" title="JS-前端开发"></a> </span>
                    </li>
                </ul>
            </div>
        </div>-->
        

        <div class="footer">版权所有 ©WWW.IF43.COM</div>
    </div>
<!--------Main_End--------->
</div>
</body>
</html>