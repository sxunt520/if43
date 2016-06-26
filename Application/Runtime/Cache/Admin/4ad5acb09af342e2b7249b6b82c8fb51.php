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
                        <?php $__FOR_START_6208__=1;$__FOR_END_6208__=70;for($i=$__FOR_START_6208__;$i < $__FOR_END_6208__;$i+=1){ ?><li><a href="system.html"><i class="icon-font">&#xe0<?php echo ($i); ?>;</i><?php echo ($i); ?></a></li><?php } ?>
                    </ul>
                </li>
            </ul>
            <h4 class="allright">© 2015 <a href="/" target="_blank">IF43.COM</a> <br />All Rights Reserved</h4>
        </div>
    </div>
<!--------left_End--------->
<!--------Main_Action--------->
    <div class="main-wrap">
        
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/Application/Admin/Public/js/utils.js"></script>
<link rel="stylesheet" type="text/css" href="/Application/Admin/Public/screen/jquery.datetimepicker.css"/>
<div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">精品列表</a><span class="crumb-step">&gt;</span><span>添加精品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/Admin/Pro/add" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                                <th width="100"><i class="require-red">*</i>精品分类</th>
                                <td>
                                <div class="controls">
                                        <select style="height:30px;" id="p" name="first">
                                            <option value="">一级分类</option>
                                            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cat_id']); ?>"><?php echo ($vo['cat_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <select style="height:30px;" id="c" name="second">
                                            <option value="">二级分类</option>
                                        </select>
                                        <select style="height:30px;" name="cid" id="d">
                                            <option value="">三级分类</option>					
                                        </select>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>名称：</th>
                                <td>
                                    <input class="common-text required"  name="pro_name" size="30" value="" type="text">&nbsp;&nbsp;最多12字
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" name="pro_title" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>简单描述：</th>
                                <td><textarea name="pro_desc" class="common-textarea" cols="30" style="width: 98%;" rows="5"></textarea></td>
                            </tr>
                           <tr>
                            	<th><i class="require-red">*</i>精品类型：</th>
                                <td>
                                    <select name="type_id" id="type_id" class="required">
                                        <option value="">请选择精品类型</option>
                                        <?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type_id"]); ?>"><?php echo ($vo["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                      	   </tr>
                           <tr>
                            	<th><i class="require-red">*</i>精品属性</th>
                                <td id="tbody-goodsAttr">
                                <!--这里选择精品类型后显视的属性-->
                                请先选择精品类型！^_^
                                </td>
                      	   </tr>
                           <tr>
                                <th>价格：</th>
                                <td>
                                    <input class="common-text required" name="pro_price" size="5" value="0.00" type="text" onfocus="if (this.value == '0.00'){this.value='';}" onblur="if (this.value == ''){this.value='0.00';}">&nbsp;￥
                                </td>
                            </tr>
                            <tr>
                                <th>价格趋势：</th>
                                <td>
                                    <input class="common-text required"  name="price_trend" size="10" value="89" type="text" onfocus="if (this.value == '89'){this.value='';}" onblur="if (this.value == ''){this.value='89';}">&nbsp;如"89%"，这里填"89".
                                </td>
                            </tr>
                            <tr>
                                <th>去购买：</th>
                                <td>
                                    <input class="common-text required" name="buy_url" size="50" value="http://" type="text" onfocus="if (this.value == 'http://'){this.value='';}" onblur="if (this.value == ''){this.value='http://';}">&nbsp;电商平台外链接 http://
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="pro_img" id="" type="file">
                                上传原图:600*600px&nbsp;&nbsp;&nbsp;自动生成：250*250 | 120*120 | 45*45 | 220*284 缩略图
                                <!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>-->
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>今日上新图：</th>
                                <td><input name="img_new" id="" type="file">
                                193*426(衣服) | 230*240(其它)
                                <!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>-->
                                </td>
                            </tr>
                              <tr>
                                <th colspan="2" style="text-align:center; font-weight:bold; border-bottom:none; background:#F5F5F5;">精品内容</th>
                            </tr>
                            <tr>
                                <!--<th>精品内容：</th>-->
                                <td colspan="2" style="padding:10px;">
								<script id="editor" type="text/plain" name="pro_content" style="width:100%;height:400px;"></script>
                                <script type="text/javascript">
                                	var ue = UE.getEditor('editor');
                                </script>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        <table width="100%" id="gallery-table" class="insert-tab">
                              <tbody>
                              <tr>
                                <th style="text-align:center; font-weight:bold; border-bottom:none; background:#F5F5F5;">精品画册</th>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:;" onclick="addImg(this)">[+]</a>
                                  图片描述 <input type="text" name="img_desc[]" size="20">
                                  上传文件 <input type="file" name="img_url[]">
                                </td>
                              </tr>
                            </tbody>
                            </table>
                         <table class="insert-tab" width="100%">
                            <tbody>
                            <tr>
                                <th colspan="2" style="text-align:center; font-weight:bold; border-bottom:none; background:#F5F5F5;">其它操作</th>
                              </tr>
                            <tr>
                                <th>加入推荐：</th>
                                <td>
                                <label><input type="checkbox" name="is_new" value="1" checked="checked">&nbsp;新品&nbsp;&nbsp; </label>
                                <label><input type="checkbox" name="is_examine" value="1" checked="checked">&nbsp;审核&nbsp;&nbsp;</label>
                                <label><input type="checkbox" name="is_best" value="1">&nbsp;精品&nbsp;&nbsp;</label>
                                <label><input type="checkbox" name="is_hot" value="1">&nbsp;火热&nbsp;&nbsp;</label>
                                <label><input type="checkbox" name="is_onsale" value="1" checked="checked">&nbsp;上架</label>
                                </td>
                            </tr>
                            <tr>
                                <th>排序：</th>
                                <td>
                                    <input class="common-text required" name="pro_order" size="50" value="120" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>添加时间：</th>
                                <td>
                                    <input class="common-text required" id="datetimepicker_mask" name="add_time" size="50" value="120" type="text">
                                </td>
                            </tr>
                                <tr>
                                    <th width="100"></th>
                                    <td>
                                        <input class="btn btn-primary btn6 mr10" value="添加" type="submit">
                                        <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                    </td>
                                </tr>
                          </tbody>
                        </table>   
                </form>
            </div>
        </div>
<script>

	// Ajax类别切换
	var op = document.getElementById('p');
	var oc = document.getElementById('c');
	var od = document.getElementById('d');
	op.onchange = dodo; 
	oc.onchange = dodo; 
	function dodo() {
		var $this = this; // 缓存当前触发事件的对象
		// 当前的ID
		var id = this.value;
		var url = '/Admin/Pro/sel/id/'+id; // 将所选分类ID 发送到服务器端
		$.get(url,'',function(data) {
			// 判断谁 能区分出当前触发事件的select 
			console.log(data);
			if($this.id == 'p') {
				// 清空option元素
				var obj = oc;
				obj.options.length = 1;
				$("#c").append(data);
				od.style.display = 'none';
			} else {
				var obj = od;
				obj.options.length = 1;
				$("#d").append(data);
				od.style.display = 'inline';
			}
		});
	}
	
	//Ajax获取属性
	var type_idObj = document.getElementById('type_id');
	type_idObj.onchange = dodo2;
	function dodo2() {
		var $this = this; // 缓存当前触发事件的对象
		// 当前的ID
		var type_id = this.value;
		var url = "/Admin/Attribute/getAttrs/type_id/"+type_id; 
		$.get(url,'',function(data) {
				$("#tbody-goodsAttr").empty();
				$("#tbody-goodsAttr").append(data);
		});
	}
	
	//添加上传画册
	function addImg(obj){
      var src  = obj.parentNode.parentNode;
      var idx  = rowindex(src);
      var tbl  = document.getElementById('gallery-table');
      var row  = tbl.insertRow(idx + 1);
      var cell = row.insertCell(-1);
      cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addImg)(.*)(\[)(\+)/i, "$1removeImg$3$4-");
  	}

    function removeImg(obj){
      var row = rowindex(obj.parentNode.parentNode);
      var tbl = document.getElementById('gallery-table');
      tbl.deleteRow(row);
  	}

</script>
<script src="/Application/Admin/Public/screen/jquery.js"></script>
<script src="/Application/Admin/Public/screen/jquery.datetimepicker.js"></script>
<script src="/Application/Admin/Public/screen/cheseeDate.js"></script>

        <div class="footer">版权所有 ©WWW.IF43.COM</div>
    </div>
<!--------Main_End--------->
</div>
</body>
</html>