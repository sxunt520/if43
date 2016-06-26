<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>找回密码</title>
<link href="/Public/images/base.css" rel="stylesheet" type="text/css">
<link href="/Public/images/global.css" rel="stylesheet" type="text/css">
<link href="/Public/images/reglogin.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/Public/css/trends2015.css">
<!--[if lt IE 9]>
    <script src="/Public/js/html5shiv.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/jquery.kinMaxShow-1.1.min.js" type="text/javascript"></script>
<script src="/Public/js/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/index.js"></script>
</head>
<body>
<!-------------------------top_Action------------------------->
<!--header_Action-->
<div class="header" id="header">
  <div class="m-nav">
        <div class=" layout1200  clearfix">
            <ul class="menu clearfix">
                <li>
                    <a <?php echo CONTROLLER_NAME== 'Index' ? "class='first on'":''; ?> href="/">首页</a>
                    <a <?php echo CONTROLLER_NAME== 'Clothes' ? "class='first on'":''; ?> href="/Home/Clothes/">衣服</a> 
                    <a <?php echo CONTROLLER_NAME== 'Shoe' ? "class='first on'":''; ?> href="/Home/Shoe/">鞋子</a> 
                    <a <?php echo CONTROLLER_NAME== 'Bag' ? "class='first on'":''; ?> href="/Home/Bag/">包包</a>
                    <a <?php echo CONTROLLER_NAME== 'Acc' ? "class='first on'":''; ?> href="/Home/Acc/">配饰</a> 
                </li>
                <li class="bold">
                    <span>-</span>
                         <a class="" href="/Home/Topic/">主题</a>
                    <span>-</span>
                        <a class="" href="#">画报</a>
                    <span>-</span>
                    <span id="feeds-xiaoxi">
                        <a class="" href="#">我的IF43</a>
                    </span>
                </li>
            </ul>
            <ul class="user-login clearfix">
            <?php if($_SESSION['user']== null): ?><li class="regLogin">
                    <a class="login" href="/Home/Login">登录</a><span class="vline5">|</span><a href="/Home/Reg" >注册</a>
                </li>
            <?php else: ?>
                <li class="showHide">
                    <a class="gohome" href="#">
                        <span class="userPhoto"><img src="/Public/uploads/<?php echo ($_SESSION['user']['img180x180']); ?>" alt="<?php echo ($_SESSION['user']['username']); ?>" width="30"></span>
                        <?php echo ($_SESSION['user']['username']); ?>，欢迎您！
                        <span class="arrow-dn"></span>
                    </a>
                    <ul style="display: none;" class="dropdown set-dropdown showHideIng">
                        <li>
                        <a href="#" title="我的主页">我的主页</a>
                        </li>
                        <li>
                        <a href="#" title="帐号设置">帐号设置</a>
                        </li>
                        <li class="last"><a href="/Home/login/logout" title="退出">退出</a></li>
                    </ul>
                </li>
                <li class="showHide" style=" display:none;">
                    <a rel="xiaoxi" class="xiaoxi xiaoxi-box" href="javascript:;">消息<span class="messge-count" id="J_MessageTotalNum">N</span><span class="arrow-dn"></span></a>
                    <ul style="display: none;" class="dropdown xiaoxi-dropdown showHideIng">
                        <li><a href="#">私信<span class="messge-count" id="J_PMMessageNum"></span></a></li>
                        <li><a href="#">评论回复<span class="messge-count" id="J_CRMessageNum"></span></a></li>
                        <li><a href="#">被喜欢<span class="messge-count" id="J_LikeMessageNum"></span></a></li>
                        <li><a href="#">系统消息<span class="messge-count" id="J_SystemMessageNum"></span></a></li>
                        <li><a href="#">粉丝<span class="messge-count" id="J_FanMessageNum"></span></a></li>
                        <li class="last"><a href="javascript:;" id="J_CancelMessageAll">清除提示</a></li>
                    </ul>
                    <div id="J_MessageTipBox"></div>
                </li><?php endif; ?>
            <li class="shareIt showHide">
            <a class="share" href="javascript:;">分享好东西<span class="arrow-dn"></span></a>
            <ul style="display: none;" class="dropdown shareit-dropdown showHideIng">
                <li><a rel="shareGoods" href="javascript:;" class="hd-share-goods">发布宝贝</a></li>
                <li class="last"><a href="#" rel="nofollow" class="hd-create-topic">创作主题</a></li>
            </ul>
            <div style="left: auto; right: 0px; top: 33px; display: none;" id="J_ShareGoodsD" class="g-dialog sg-dialog">
                <div class="content">
                <p class="title">将宝贝网址粘贴到下面框中：</p>
                <form class="sg-form" name="shareGoods" action="/ugc/api/findProduct">
                    <input name="platform" value="0" type="hidden"><input name="sns" value="1" type="hidden">
                    <div class="clearfix">
                        <input class="base-input sg-input" name="url" value="http://shop.mogujie.com/detail/17qfuy6?traceid=book_2ccb732gbda8&amp;ptp=1.PaAwBfnx._items.1.dlRzjw" placeholder="http://" autocomplete="off">
                        <input id="J_GoodsUrlSubmit" class="url-sub bbl-btn" value="确定" type="submit">
                    </div>
                    <div style="display: block;" class="text-tip"><span class="gc6">宝贝信息抓取中…</span></div>
                </form>
                <div class="sg-source">
                    <p class="pt5 pb5">已支持网站：</p>
                    <div class="source-list clearfix">
                        <a class="icon-source icon-taobao" href="http://www.taobao.com/" target="_blank">淘宝网</a>
                        <a class="icon-source icon-tmall" href="http://www.tmall.com/" target="_blank">天猫商城</a>
                        <a class="icon-source icon-mogujie" href="http://www.mogujie.com/" target="_blank">蘑菇街</a>
                        <a class="icon-source icon-meilishuo" href="http://www.meilishuo.com/" target="_blank">美丽说</a>
                    </div>
                    <p class="contact">卖家合作、专享发布工具，请<a href="#" target="_blank"><strong>点击此处</strong></a></p>
                </div>
                <div style="left: 350px;" class="tipbox-up"><em>◆</em><span>◆</span></div>
                <a class="close" href="javascript:;"></a>
                </div>
            </div>
            </li>
            <li>	
            	<a class="btn-signIn fl" href="javascript:;" rel="signIn" >签到</a>
                <!--<a class="btn-signIn fl checked" href="javascript:;" rel="signIn">已签</a>-->
            </li>
            </ul>
        </div>
    </div>
</div>
<!---header_End--->
<!--nav_Action-->
    <header class="top-header">
	<nav class="nav">
		<div class="gwrap cf">
			<a href="/" class="logo"><div style="display: none; opacity: 1;"></div></a>
			<div class="signin">
                <?php if($_SESSION['user']== null): ?><a href="/Home/Login"><span>登录</span></a>
                <?php else: ?>
                <a href="#"><img src="/Public/uploads/<?php echo ($_SESSION['user']['img180x180']); ?>" alt="<?php echo ($_SESSION['user']['username']); ?>" title="<?php echo ($_SESSION['user']['username']); ?>" width="70"></a><?php endif; ?>
			</div>
			<div class="wrap">
				<ul class="nav-ul" id="tn">
					<li><a href="/" <?php echo CONTROLLER_NAME== 'Index' ? "class='hover'":''; ?>><b>首页</b><span>HOME</span></a></li>
					<li><a href="/Home/Clothes/" <?php echo CONTROLLER_NAME== 'Clothes' || $more==1 ? "class='hover'":''; ?>><b>衣服</b><span>clothes</span></a></li>
					<li><a href="/Home/Shoe/" <?php echo CONTROLLER_NAME== 'Shoe' || $more==2 ? "class='hover'":''; ?>><b>鞋子</b><span>shoe</span></a></li>
					<li><a href="/Home/Bag/" <?php echo CONTROLLER_NAME== 'Bag' || $more==3 ? "class='hover'":''; ?>><b>包包</b><span>bag</span></a></li>
					<li><a href="/Home/Acc/" <?php echo CONTROLLER_NAME== 'Acc' || $more==4 ? "class='hover'":''; ?>><b>配饰</b><span>acc</span></a></li>
					<li><a href="/Home/Topic/" <?php echo CONTROLLER_NAME== 'Topic' || $more==5 ? "class='hover'":''; ?>><b>主题</b><span>Topic </span></a></li>
				</ul>
				<div style="display: none; opacity: 1;" class="menu" id="tm">
					<div style="display: none;">
						<ul>
							<li><a target="_blank" href="#">时装<i></i><span>Fashion</span></a><ins>&gt;</ins></li>
							<li><a target="_blank" href="#">配饰<i></i><span>Accessories</span></a><ins>&gt;</ins></li>
							<li><a target="_blank" href="#">街拍<i></i><span>Street Style</span></a><ins>&gt;</ins></li>
							<li><a target="_blank" href="#">娱乐<i></i><span>Entertainment</span></a><ins>&gt;</ins></li>
						</ul>
					     	<dl>
                    <?php if(is_array($topPro0)): $i = 0; $__LIST__ = $topPro0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
                    <a href="/Home/Detail/index/pro_id/<?php echo ($vo['pro_id']); ?>" target="_blank">
                 	   <img src="/Public/uploads/<?php echo ($vo["img250x250"]); ?>" width="210" height="210" alt="<?php echo ($vo["pro_title"]); ?>"><aside><i></i><p><?php echo ($vo["pro_title"]); ?></p></aside>
                    </a>
                    </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                            </dl>
					</div>
					<div style="display: none;">
						<ul>
							<li><a href="/Home/Clothes/prolist/cat_id/5#tagB">上衣<i></i><span>Tops</span></a><ins>&gt;</ins></li>
							<li><a href="/Home/Clothes/prolist/cat_id/7#tagB">裙子<i></i><span>Skirt </span></a><ins>&gt;</ins></li>
							<li><a href="/Home/Clothes/prolist/cat_id/6#tagB">裤子<i></i><span>Trousers </span></a><ins>&gt;</ins></li>
							<li><a href="/Home/Clothes/#tagB">适用场景<i></i><span>Occasion applicable</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Clothes/#tagB">潮流风格<i></i><span>Fashion style</span></a><ins>&gt;</ins></li>
						</ul>
						<dl>
                             <?php if(is_array($topPro1)): $i = 0; $__LIST__ = $topPro1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
                                <a href="/Home/Detail/index/pro_id/<?php echo ($vo['pro_id']); ?>" target="_blank">
                                   <img src="/Public/uploads/<?php echo ($vo["img250x250"]); ?>" width="210" height="210" alt="<?php echo ($vo["pro_title"]); ?>"><aside><i></i><p><?php echo ($vo["pro_title"]); ?></p></aside>
                                </a>
                                </dd><?php endforeach; endif; else: echo "" ;endif; ?>
   						 </dl>
					</div>
					<div style="display: none;">
						<ul>
							<li><a href="/Home/Shoe/prolist/cat_id/47#tagB">款式 <i></i><span>STYLE</span></a><ins>&gt;</ins></li>
							<li><a href="/Home/Shoe/prolist/cat_id/48#tagB">元素<i></i><span>ELEMENT</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Shoe/index#tagB">潮流风格<i></i><span>Fashion style</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Shoe/index#tagB">适用场景<i></i><span>Occasion applicable</span></a><ins>&gt;</ins></li>
						</ul>
						<dl>
                           <?php if(is_array($topPro2)): $i = 0; $__LIST__ = $topPro2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
                            <a href="/Home/Detail/index/pro_id/<?php echo ($vo['pro_id']); ?>" target="_blank">
                               <img src="/Public/uploads/<?php echo ($vo["img250x250"]); ?>" width="210" height="210" alt="<?php echo ($vo["pro_title"]); ?>"><aside><i></i><p><?php echo ($vo["pro_title"]); ?></p></aside>
                            </a>
                            </dd><?php endforeach; endif; else: echo "" ;endif; ?>
  						  </dl>
					</div>
					<div style="display: none;">
						<ul>
                            <li><a href="/Home/Bag/prolist/cat_id/86#tagB">款式<i></i><span>STYLE</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Bag/prolist/cat_id/88#tagB">流行<i></i><span>TREND</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Bag/prolist">材质<i></i><span>MATERIAL</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Bag/index#tagB">适用场景<i></i><span>Occasion applicable</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Bag/index#tagB">潮流风格<i></i><span>Fashion style</span></a><ins>&gt;</ins></li>
						</ul>
						<dl>
                             <?php if(is_array($topPro3)): $i = 0; $__LIST__ = $topPro3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
                                <a href="/Home/Detail/index/pro_id/<?php echo ($vo['pro_id']); ?>" target="_blank">
                                   <img src="/Public/uploads/<?php echo ($vo["img250x250"]); ?>" width="210" height="210" alt="<?php echo ($vo["pro_title"]); ?>"><aside><i></i><p><?php echo ($vo["pro_title"]); ?></p></aside>
                                </a>
                                </dd><?php endforeach; endif; else: echo "" ;endif; ?>
   						 </dl>
					</div>
					<div style="display: none;">
						<ul style="width:280px;">							
                            <li><a href="/Home/Acc/prolist/cat_id/128#tagB">首饰<i></i><span>JEWELRY </span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Acc/prolist/cat_id/129#tagB">装扮<i></i><span>DRESS UP</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Acc/prolist">材质<i></i><span>MATERIAL</span></a><ins>&gt;</ins></li>
							<li><a href="/Home/Acc/index#tagB">风格<i></i><span>STYLE</span></a><ins>&gt;</ins></li>
                            <li><a href="/Home/Acc/index#tagB">元素<i></i><span>ELEMENT</span></a><ins>&gt;</ins></li>
                        </ul>
						<dl>
                             <?php if(is_array($topPro4)): $i = 0; $__LIST__ = $topPro4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
                                <a href="/Home/Detail/index/pro_id/<?php echo ($vo['pro_id']); ?>" target="_blank">
                                   <img src="/Public/uploads/<?php echo ($vo["img250x250"]); ?>" width="210" height="210" alt="<?php echo ($vo["pro_title"]); ?>"><aside><i></i><p><?php echo ($vo["pro_title"]); ?></p></aside>
                                </a>
                                </dd><?php endforeach; endif; else: echo "" ;endif; ?>
   						 </dl>
					</div>
					<div style="display: block;">
						<ul>
                            <li><a target="_blank" href="#">约会<i></i><span>Dating</span></a><ins>&gt;</ins></li>
                            <li><a target="_blank" href="#">游玩<i></i><span>Play</span></a><ins>&gt;</ins></li>
                            <li><a target="_blank" href="#">办公室<i></i><span>Office</span></a><ins>&gt;</ins></li>
                            <li><a target="_blank" href="#">校园<i></i><span>campus</span></a><ins>&gt;</ins></li>
                            <li><a target="_blank" href="#">夜店<i></i><span>Nightclub</span></a><ins>&gt;</ins></li>
                            <li><a target="_blank" href="#">运动<i></i><span>Sport</span></a><ins>&gt;</ins></li>
						</ul>
						<dl>
                            <dd><a href="#" target="_blank" title=""><img src="/Public/img/1435716484492.jpg" alt="无法阻挡的睡衣诱惑"><aside><i></i><p>无法阻挡的睡衣诱惑</p></aside></a></dd>
                            <dd><a href="#" target="_blank" title="众里寻倩女天使在身边 《倩女幽魂OL》"><img src="/Public/img/1435717483825.jpg" alt="众里寻倩女天使在身边 《倩女幽魂OL》"><aside><i></i><p>众里寻倩女天使在身边 《倩女幽魂OL》</p></aside></a></dd>
                            <dd><a href="#" target="_blank" title="女人一生到底需要多少双鞋？"><img src="/Public/img/1435718048970.jpg" alt="女人一生到底需要多少双鞋？"><aside><i></i><p>女人一生到底需要多少双鞋？</p></aside></a></dd>
                            <dd><a href="#" target="_blank" title="服装史上最会戴帽子的女人"><img src="/Public/img/1435718031524.jpg" alt="服装史上最会戴帽子的女人"><aside><i></i><p>服装史上最会戴帽子的女人</p></aside></a></dd>
  						  </dl>
					</div>
				</div><!-- menu -->
			</div><!-- wrap -->
		</div><!-- gwrap -->
	</nav>
</header>
<!--nav_End-->
<div style="clear:both;"></div>
<!-------------------------top_End------------------------->
		<div id="container">
			<div class="content clearfix">
				
					<div class="set-box">
						<h2 class="findH2">找回密码</h2>
						<div class="set-password">

						<form action="/Home/Login/tofindpwd" id="J_PwdEmail" class="set-form" method="post">
							<div class="form-row clearfix">
								<label style="width:110px;">用户名：</label>
								<input name="username" class="base-input" type="text">
							</div>
							<div class="form-row clearfix">
								<label style="width:110px;">绑定的手机：</label>
								<input name="phone" class="base-input" type="text">
							</div>
                            <div class="form-row clearfix">
                                <label style="width:110px;">验证码：</label>
                                <img id="codeImg" width="90" height="36" src="/Home/Login/getCode" onClick="this.src='/Home/Login/getCode/'+Math.random()" style="cursor:pointer;"/> 
                                <input class="base-input" name="code" placeholder="" style="width:80px;" id="checkcode" type="text">
                            </div>
							<div class="form-row">
								<label style="width:110px;">&nbsp;</label>
								<input class="bbl-btn submit" value="下一步" type="submit">
							</div>
						</form>
						</div>
					</div>
				
			</div>
		</div><!--container end-->
<div class="footer" id="footer">
	
	<div class="footer-nav clearfix">
		<dl class="about">
			<dt>关于我们</dt>
			<dd><a href="#" target="_blank">关于逛</a></dd>
			<dd><a href="#" target="_blank">加入我们</a></dd>
			<dd><a href="#" target="_blank">商家推广</a></dd>
			<dd><a href="#" target="_blank">隐私条款</a></dd>
		</dl>
		<dl class="followus">
			<dt>关注我们</dt>
			<dd><a class="f-Qzone" href="#" rel="nofollow" target="_blank">QQ空间</a></dd>
			<dd><a class="f-sina" href="#" rel="nofollow" target="_blank">新浪微博</a></dd>
			<dd><a class="f-tencent" href="#" rel="nofollow" target="_blank">腾讯微博</a></dd>
			<dd><a class="f-douban" href="#" rel="nofollow" target="_blank">豆瓣</a></dd>
		</dl>
            <dl class="friendlinks">
                <dt><a href="#/common/friends" target="_blank">友情链接</a></dt>
                <dd><a href="http://www.pinshan.com/" target="_blank">品善网</a></dd>
                <dd><a href="http://www.j.cn/" target="_blank">女装搭配网</a></dd>
                <dd><a href="http://www.moonbasa.com/" target="_blank">时尚女装</a></dd> 
                <dd><a href="http://hitao.com/" target="_blank">嗨淘网</a></dd>
                <dd><a href="http://www.mhao.com.cn/" target="_blank">美好筑家</a></dd>	
                <dd><a href="http://www.s.cn/" target="_blank">名鞋库</a></dd>
                <dd><a href="http://www.web66.com.tw/" target="_blank">台湾黄页</a></dd>	
                <dd><a href="http://www.bengbeng.com/" target="_blank">蹦蹦网</a></dd>
                <dd><a href="http://www.paidai.com/" target="_blank">派代</a></dd>
            </dl>
            <dl class="how">
                <dt><a href="#" target="_blank">爱逛</a></dt>
                <dd><a href="#" target="_blank">女人爱逛</a></dd>
                <dd><a href="#" target="_blank">主题</a></dd>
                <dd><a href="#" target="_blank">好友爱逛</a></dd>
                <dd><a href="#" target="_blank">逛时尚画报</a></dd>
            </dl>
	</div>
	<p class="cp">Copyright ©2013-2014 IF43.com, All Rights Reserved. <a rel="nofollow" href="#" target="_blank">京ICP备13029152号-1</a></p>
</div>
<script type="text/javascript" src="/public/js/waterfall.js" ></script>
</body>
</html>