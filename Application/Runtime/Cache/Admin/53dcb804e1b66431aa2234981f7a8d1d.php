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
                    <h3><a href="#"><i class="icon-font">&#xe035;</i>图标选择</a></h3>
                    <ul class="sub-menu"  style="display:none;">
                        <?php $__FOR_START_24299__=1;$__FOR_END_24299__=70;for($i=$__FOR_START_24299__;$i < $__FOR_END_24299__;$i+=1){ ?><li><a href="system.html"><i class="icon-font">&#xe0<?php echo ($i); ?>;</i><?php echo ($i); ?></a></li><?php } ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/Admin/admin/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/Admin/Manager/index">管理员列表</a><span class="crumb-step">&gt;</span><span>添加类型</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/Admin/Adv/add/type_id/0" method="post" id="theForm" name="theForm" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        	<tr>
                                <th width="180"><i class="require-red">*</i>所属广告类型：</th>
                                <td>
                                 <select name="type_id" onchange="searchAttr(this.value)">
                                    <option value="0">请先选择广告类型</option>
                                    <?php if(is_array($types)): foreach($types as $key=>$type): ?><option value="<?php echo ($type['type_id']); ?>"
                                        <?php if($type['type_id'] == $type_id): ?>selected='selected'<?php else: endif; ?>
                                        ><?php echo ($type['type_name']); ?></option><?php endforeach; endif; ?>
                                </select>
                                </td>
                            </tr>
                            <?php if($row == '' ): else: ?> 
                            <tr>
                                <th><i class="require-red">*</i>广告标题：</th>
                                <td>
                                    <input class="common-text required" name="title" size="40" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>广告图片：</th>
                                <td>
                                	<input name="advimg"  type="file">请上传<span class="redColor"><?php echo ($row["width"]); ?>X<?php echo ($row["height"]); ?></span>的图片&nbsp;&nbsp;&nbsp;__(^_^)∠※-~~
                                </td>
                            </tr>
                            <tr>
                                <th>跳转链接：</th>
                                <td>
                                    <input class="common-text required" name="jumpurl" size="50" value="http://" type="text" onfocus="if (this.value == 'http://'){this.value='';}" onblur="if (this.value == ''){this.value='http://';}">
                                </td>
                            </tr>
                             <tr>
                                <th>广告排序：</th>
                                <td>
                                    <input class="common-text required" name="advorder" size="3" value="50" type="text" onfocus="if (this.value == '50'){this.value='';}" onblur="if (this.value == ''){this.value='50';}">
                                </td>
                            </tr>
                             <tr>
                                <th>是不显示：</th>
                                <td>
                                	&nbsp;&nbsp;
                                	<label><input type="radio" name="is_show" value="1" checked="checked">&nbsp;是 </label>&nbsp;&nbsp;
                                    <label><input type="radio" name="is_show" value="0">&nbsp;否</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr><?php endif; ?>
                        </tbody>
                        </table>
                </form>
            </div>
        </div>
<script type="text/javascript">
	function searchAttr(type_id) {
	  window.location.href = "/Admin/Adv/add/type_id/"+ type_id;
	}
</script>

        <div class="footer">版权所有 ©WWW.IF43.COM</div>
    </div>
<!--------Main_End--------->
</div>
</body>
</html>