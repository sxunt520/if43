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
                        <?php $__FOR_START_29703__=1;$__FOR_END_29703__=70;for($i=$__FOR_START_29703__;$i < $__FOR_END_29703__;$i+=1){ ?><li><a href="system.html"><i class="icon-font">&#xe0<?php echo ($i); ?>;</i><?php echo ($i); ?></a></li><?php } ?>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/Admin/admin/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">精品列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/Admin/Pro/index" name="searchform" method="get">
                    <table class="search-tab">
                        <tr>
                        	<th width="75">选择分类:</th>
                            <td width="320">
                                <div class="controls">
                                        <select style="height:30px;" id="p" name="first">
                                            <option value="">一级分类</option>
                                            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cat_id']); ?>" <?php if($vo['cat_id'] == $map['first']): ?>selected='selected'<?php else: endif; ?>><?php echo ($vo['cat_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <select style="height:30px; width:134px;" id="c" name="second">
                                            <option value="">二级分类</option>
                                        </select>
                                        <select style="height:30px;" name="cid" id="d">
                                            <option value="">三级分类</option>					
                                        </select>
                                </div>
                            </td>
                            <th>推荐：</th>
                            <td>
                            <!-- 推荐 -->
                                        <select style="height:30px;" name="intro_type">
                                            <option value="">全部</option>
                                            <option value="is_examine" <?php if($map['intro_type'] == 'is_examine'): ?>selected='selected'<?php else: endif; ?>>审核</option>
                                            <option value="is_best" <?php if($map['intro_type'] == 'is_best'): ?>selected='selected'<?php else: endif; ?>>精品</option>
                                            <option value="is_new" <?php if($map['intro_type'] == 'is_new'): ?>selected='selected'<?php else: endif; ?>>新品</option>
                                            <option value="is_hot" <?php if($map['intro_type'] == 'is_hot'): ?>selected='selected'<?php else: endif; ?>>Hot</option>
                                            <option value="all_type" <?php if($map['intro_type'] == 'all_type'): ?>selected='selected'<?php else: endif; ?>>全部推荐</option>
                                        </select>
                                        <!-- 上架 -->
                                        <select style="height:30px;"  name="is_on_sale">
                                            <option value=""  <?php if($map['is_on_sale'] == ''): ?>selected='selected'<?php else: endif; ?>>全部</option>
                                            <option value="1" <?php if($map['is_on_sale'] == '1'): ?>selected='selected'<?php else: endif; ?>>上架</option>
                                            <option value="0" <?php if($map['is_on_sale'] == '0'): ?>selected='selected'<?php else: endif; ?>>下架</option>
                                            <!--这里判断的必需用引号引起 如果判断值是0 或 1 的话！~-->
                                        </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="请输入精品关键词" name="keywords" value="<?php echo ($map["keywords"]); ?>" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" value="搜索" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <form name="myform" action="/Admin/Pro/deleteall" id="myform" method="post">
        <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/Admin/Pro/add"><i class="icon-font"></i>添加精品</a>
                        <!--<a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>-->
                        <input type="submit" name="action" value="更新排序">&nbsp;&nbsp;
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>缩略图</th>
                            <th>精品名称</th>
                            <th>价格</th>
                            <th>审核</th>
                            <th>精品</th>
                            <th>新品</th>
                            <th>Hot</th>
                            <th>上架</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($proList)): foreach($proList as $key=>$v): ?><tr>
                                <td class="tc"><input name="pro_id[]" value="<?php echo ($v["pro_id"]); ?>" type="checkbox"></td>
                                <td>
                                <input name="pro_ids[]" value="<?php echo ($v["pro_id"]); ?>" type="hidden">
                                <input class="common-input sort-input2" name="pro_orders[]" value="<?php echo ($v["pro_order"]); ?>" style="" type="text">
                                </td>
                                <td><?php echo ($v["pro_id"]); ?></td>
                                <td><img src="/Public/uploads/<?php echo ($v["img120x120"]); ?>" width="60"/></td>
                                <td><?php echo ($v["pro_name"]); ?></td>
                                <td><?php echo ($v["pro_price"]); ?></td>
                                <td><?php if($v["is_examine"] == 1 ): ?><i class="icon-font greed">&#xe068;</i><?php else: ?><i class="icon-font red">&#xe069;</i><?php endif; ?></td>
                                <td><?php if($v["is_best"] == 1 ): ?><i class="icon-font greed">&#xe068;</i><?php else: ?><i class="icon-font red">&#xe069;</i><?php endif; ?></td>
                                <td><?php if($v["is_new"] == 1 ): ?><i class="icon-font greed">&#xe068;</i><?php else: ?><i class="icon-font red">&#xe069;</i><?php endif; ?></td>
                                <td><?php if($v["is_hot"] == 1 ): ?><i class="icon-font greed">&#xe068;</i><?php else: ?><i class="icon-font red">&#xe069;</i><?php endif; ?></td>
                                <td><?php if($v["is_onsale"] == 1 ): ?><i class="icon-font greed">&#xe068;</i><?php else: ?><i class="icon-font red">&#xe069;</i><?php endif; ?></td>
                                <td>
                                	<a href="<?php echo ($v["buy_url"]); ?>" title="去购买" target="_blank"><i class="icon-font">&#xe011;</i></a><span class="spanGray">|</span>
                                    <a href="/Home/Detail/index/pro_id/<?php echo ($v["pro_id"]); ?>" title="查看" target="_blank"><i class="icon-font">&#xe062;</i></a><span class="spanGray">|</span>
                                    <a href="/Admin/Pro/edit/pro_id/<?php echo ($v["pro_id"]); ?>" title="修改"><i class="icon-font">&#xe065;</i></a><span class="spanGray">|</span>
                                    <a onclick="return confirm(' 你确定要删除吗？')" title="删除" href="/Admin/Pro/delete/pro_id/<?php echo ($v["pro_id"]); ?>"><i class="icon-font">&#xe019;</i></a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                    </table>
                        <div class="checkAll">
                            <button type="button">全选</button>
                            <button type="button">反选</button>&nbsp;&nbsp;
                            <input type="submit" name="action" value="删除" onclick="return confirm(' 你确定要删除吗？')">&nbsp;&nbsp;
                            <input type="submit" name="action" value="审核">
                            <input type="submit" name="action" value="取消审核">&nbsp;&nbsp;
                            <input type="submit" name="action" value="精品">
                            <input type="submit" name="action" value="取消精品">&nbsp;&nbsp;
                            <input type="submit" name="action" value="新品">
                            <input type="submit" name="action" value="取消新品">&nbsp;&nbsp;
                            <input type="submit" name="action" value="Hot">
                            <input type="submit" name="action" value="取消Hot">&nbsp;&nbsp;
                            <input type="submit" name="action" value="上架">
                            <input type="submit" name="action" value="下架">&nbsp;&nbsp;
                        </div>      
                    <div class="list-page"><?php echo ($spage); ?></div>	
                </div>
        </div>
     </form>
        <script>
              $(function () {
                var bool = true;
                $(':button:contains(全选),.allChoose').bind('click',function(){
                    // 全选一定有标示状态
                    $(':checkbox[name="pro_id[]"]').each(function(){
                        $(this).prop('checked',bool);
                    });
                    bool=!bool;
                });
        
                $(':button:contains(反选)').bind('click',function(){        	
                    $(':checkbox[name="pro_id[]"]').each(function(){
                        $(this).prop('checked',!this.checked);
                    });
                });
             })
			 
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
			
		
		//自动加载二、三轮相关类别
		$(document).ready(function(){
		
			var url = '/Admin/Pro/sel2/first/<?php echo ($map["first"]); ?>/second/<?php echo ($map["second"]); ?>/cid/<?php echo ($map["cid"]); ?>'; 
			$.get(url,'',function(data) {
					$("#c").remove();
					$("#d").remove();
					$(".controls").append(data);
					//od.style.display = 'none';
			});
		
		});

        </script>

        <div class="footer">版权所有 ©WWW.IF43.COM</div>
    </div>
<!--------Main_End--------->
</div>
</body>
</html>