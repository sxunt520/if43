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
                        <?php $__FOR_START_3076__=1;$__FOR_END_3076__=70;for($i=$__FOR_START_3076__;$i < $__FOR_END_3076__;$i+=1){ ?><li><a href="system.html"><i class="icon-font">&#xe0<?php echo ($i); ?>;</i><?php echo ($i); ?></a></li><?php } ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/Admin/admin/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">会员管理列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/Admin/Member/index" name="searchform" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="请输入会员用户名" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="搜索" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/Admin/Member/add"><i class="icon-font"></i>添加会员</a>
                    </div>
                </div>
                <div class="result-content">
                <form name="myform" action="/Admin/Member/deleteall" id="myform" method="post">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>个人形象照</th>
                            <th>手机</th>
                            <th>email</th>
                            <th>性别</th>
                            <th>是否屏蔽</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($u)): foreach($u as $key=>$v): ?><tr>
                                <td class="tc"><input name="id[]" value="<?php echo ($v["id"]); ?>" type="checkbox"></td>
                                <td><?php echo ($v["id"]); ?></td>
                                <td><?php echo ($v["username"]); ?></td>
                                <td><img src="/Public/uploads/<?php echo ($v["img180x180"]); ?>" width="80"/></td>
                                <td><?php echo ($v["phone"]); ?></td>
                                <td><?php echo ($v["email"]); ?></td>
                                <td><?php if($v['sex'] == 0): ?>女<?php else: ?>男<?php endif; ?></td>
                                <td><?php if($v['is_display'] == 1): ?>显视<?php else: ?>屏蔽<?php endif; ?></td>
                                <td>
                                	<a href="/Admin/Member/editPwd/id/<?php echo ($v["id"]); ?>">修改密码</a><span class="spanGray">|</span>
                                    <a href="/Admin/Member/edit/id/<?php echo ($v["id"]); ?>">修改资料</a><span class="spanGray">|</span>
                                    <a onclick="return confirm(' 你确定要删除吗？')" href="/Admin/Member/delete/id/<?php echo ($v["id"]); ?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                    </table>
                        <div class="checkAll">
                            <button type="button">全选</button>
                            <button type="button">反选</button>
                            <input type="submit" name="action" value="删除" onclick="return confirm(' 你确定要删除吗？')">
                            <input type="submit" name="action" value="屏蔽">
                            <input type="submit" name="action" value="开启">
                        </div>      
                    <div class="list-page"><?php echo ($spage); ?></div>
                     	</form>
                </div>
           
        </div>
        <script>
              $(function () {
                var bool = true;
                $(':button:contains(全选),.allChoose').bind('click',function(){
                    // 全选一定有标示状态
                    $(':checkbox[name="id[]"]').each(function(){
                        $(this).prop('checked',bool);
                    });
                    bool=!bool;
                });
        
                $(':button:contains(反选)').bind('click',function(){        	
                    $(':checkbox[name="id[]"]').each(function(){
                        $(this).prop('checked',!this.checked);
                    });
                });
             })
        </script>

        <div class="footer">版权所有 ©WWW.IF43.COM</div>
    </div>
<!--------Main_End--------->
</div>
</body>
</html>