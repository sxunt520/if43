<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>如果时尚！爱否时尚-发现喜欢-不外出逛街一样可以发现自己喜欢的!</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="如果，时尚，爱否，购物分享，购物社区">
<meta name="description" content="如果，从这里开始，发现喜欢，改变生活。我们为你推荐适合的消费，是你购物决策的贴心助理。整合商品信息、网友评价，服务质量和价格比较。">
<link href="/Public/images/base.css" rel="stylesheet" type="text/css">
<link href="/Public/images/global.css" rel="stylesheet" type="text/css">
<link href="/Public/images/new_find_2014.css" rel="stylesheet" type="text/css">
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
<div class="layout1200">
	<div class="clearfix find_top_box">
		<div class="find_top_left fl">
                            <div class="unit clearfix ">
                                <span class="category fl"><a href="/Home/Clothes/prolist/cat_id/5">上衣</a></span>
                                <div class="tag_box fr">
                                    <?php if(is_array($subCat1)): $i = 0; $__LIST__ = $subCat1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                                <div class="unit clearfix ">
                                   	 <span class="category fl"><a href="/Home/Clothes/prolist/cat_id/7">裙子</a></span>
                                    <div class="tag_box fr">
                                        <?php if(is_array($subCat3)): $i = 0; $__LIST__ = $subCat3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                                <div class="unit clearfix ">
                                    <span class="category fl"><a href="/Home/Clothes/prolist/cat_id/6">裤子</a></span>
                                    <div class="tag_box fr">
                                        <?php if(is_array($subCat2)): $i = 0; $__LIST__ = $subCat2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                                <div class="unit clearfix last">
                                    <span class="category fl">适用场景</span>
                                    <div class="tag_box fr">
                                        <?php if(is_array($subCat5)): $i = 0; $__LIST__ = $subCat5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>/cj/<?php echo ($vo); ?>#tagB"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
								</div>
                    <div class="find_top_right fr">
                        <div class="clearfix">
                            <div class="find_banner_box fl">
                                <div id="kinMaxShow">
                                    <?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div><a href="<?php echo ($vo["jumpurl"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="/Public/uploads/<?php echo ($vo["advimg"]); ?>"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                     		   <a href="<?php echo ($newPic["jumpurl"]); ?>" title="<?php echo ($newPic["title"]); ?>" target="_blank">
                                <img src="/Public/uploads/<?php echo ($newPic["advimg"]); ?>" class="fr" alt="<?php echo ($newPic["title"]); ?>" height="330" width="255">
                                </a>
                        </div>
                        <div class="banner-botom-box clearfix">
                        
                        <?php if(is_array($proRows1)): $i = 0; $__LIST__ = $proRows1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="unit fl">
                                 <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" title="<?php echo ($vo["pro_title"]); ?>" target="_blank">
                                 	<img title="<?php echo ($vo["pro_title"]); ?>" src="/Public/uploads/<?php echo ($vo["img45x45"]); ?>" class="fl" height="45" width="45">
                                 </a>
                                <div class="fl ml5">
                                     <a class="pinkc mt5" href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); ?></a>
                                     <div class="mt5 "><a class="fs14" href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank"><?php echo ($vo["pro_name"]); ?></a></div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        
                        </div>
                    </div>
                </div>
	
	<div class="find_new_baobei_box">
		<h2 class="bigfs">今日上新</h2>
            <div class="new_baobei_box">
                <div class="new_baobei_items">
 
                            <div class="item itemList">
                            	<ul>
                                <?php if(is_array($proRows2)): $i = 0; $__LIST__ = $proRows2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                        <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" title="<?php echo ($vo["pro_title"]); ?>" target="_blank" class="fl">
                                            <img src="/Public/uploads/<?php echo ($vo["img_new"]); ?>" alt="<?php echo ($vo["pro_title"]); ?>" height="426" width="193">
                                            <span class="faxian_g_icon faxian_rec_yifu_mask_icon">
                                            <span class="first_span">◆&nbsp;&nbsp;<em class="fs16 bigfs"><?php echo ($vo["cat_name"]); ?></em>&nbsp;&nbsp;◆</span>
                                            <span class="fs14 bigfs"><?php echo ($vo["pro_name"]); ?></span>
                                            </span>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>  
                            </ul>
                                <em class="btnXXX prevList" herf="javascript:;"></em>
                                <em class="btnXXX nextList" herf="javascript:;"></em>
                            </div>
                          
                </div>
                </div>
			</div>
	
	<div class="find_rec_baobei_box">
		<div class="faxian_g_icon faxian_top_nav_cur"></div>
			<h2 class="bigfs">小编精选衣服推荐</h2>
                    <div class="rec_baobei_box clearfix">
                    
                    <?php if(is_array($proRows3)): $i = 0; $__LIST__ = $proRows3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 5 );++$i;?><div class="unit fl <?php if(($mod) == "4"): ?>last<?php endif; ?>">
                            <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" title="<?php echo ($vo["pro_title"]); ?>" target="_blank">
                            	<img src="/Public/uploads/<?php echo ($vo["img220x284"]); ?>" alt="<?php echo ($vo["pro_title"]); ?>" height="284" width="220">
                            </a>
                            <div class="faxian_g_icon faxian_tag_mask bigfs"><?php echo ($vo["cat_name"]); ?></div>
                            <div class="faxian_g_icon faxian_rec_mask bigfs"><?php echo ($vo["pro_name"]); ?></div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    
               </div>
            </div>
	
     <a name="tagB" id="tagB"></a>
	<div class="find_all_cate_box">
            <div class="cate_top">
           		 <h2 class="bigfs">类目筛选区</h2>
            </div>
                    <div class="unit clearfix">
                    <h3 class="fl bigfs">热门品类</h3>
                        <div class="unit_fr fr">
                        	<a class="tag-item  <?php if($cat_id == 1): ?>on<?php else: endif; ?>" href="/Home/Clothes/index/cat_id/1/top/<?php echo ($top); ?>/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB">全部</a>
                            <?php if(is_array($tj1)): $i = 0; $__LIST__ = $tj1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item  <?php if($vo['cat_id'] == $cat_id): ?>on<?php else: endif; ?>" href="/Home/Clothes/index/cat_id/<?php echo ($vo["cat_id"]); ?>/top/<?php echo ($top); ?>/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB"><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                          </div>
                    </div>
						<div class="unit clearfix">
						<h3 class="fl bigfs">潮流风格</h3>
                        <div class="unit_fr fr">
                        		<a class="tag-item  <?php if($fg == 'all'): ?>on<?php else: endif; ?>" href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/<?php echo ($priceTop); ?>/fg/all/fashion/<?php echo ($fashion); ?>#tagB">全部</a>
                                <?php if(is_array($subCat4)): $i = 0; $__LIST__ = array_slice($subCat4,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item  <?php if($vo == $fg): ?>on<?php else: endif; ?>" href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($vo); ?>/fashion/<?php echo ($fashion); ?>#tagB"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
						<div class="unit clearfix">
                        <h3 class="fl bigfs">流行元素</h3>
                        <div class="unit_fr fr">
                        			<a class="tag-item <?php if($fashion == 'all'): ?>on<?php else: endif; ?>" href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($fg); ?>/fashion/all#tagB">全部</a>
                                    <?php if(is_array($subCat6)): $i = 0; $__LIST__ = array_slice($subCat6,0,20,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item <?php if($vo == $fashion): ?>on<?php else: endif; ?>" href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($fg); ?>/fashion/<?php echo ($vo); ?>#tagB"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                           </div>
                      </div>
	
      <div class="find_sort_box clearfix">
        <h3 class="fl"><a href="/Home/Clothes/index/cat_id/<?php echo ($nowCatName["cat_id"]); ?>/#tagB"><?php echo ($nowCatName["cat_name"]); ?></a></h3>
        <span class="fs14 ml5 mr5 fl">&gt;</span>
            <div class="sort_unit fl ml40">
            <a href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/hot/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" <?php if($top == 'hot' ): ?>class='on'<?php else: endif; ?>>热门</a>|
            <a href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/new/priceTop/<?php echo ($priceTop); ?>/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" <?php if($top == 'new' ): ?>class='on'<?php else: endif; ?>>最新</a>
            </div>
         <div class="range-box">
            <form method="get" action="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" class="showHide">
              <!--这里被选择中添加class="on"-->
         <a href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/all/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" <?php if($priceTop == 'all' ): ?>class='on'<?php else: endif; ?>>全部</a>|
         <a href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/100/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" <?php if($priceTop == '100' ): ?>class='on'<?php else: endif; ?>>100元</a>|
         <a href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/200/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" <?php if($priceTop == '200' ): ?>class='on'<?php else: endif; ?>>200元</a>|
         <a href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/300/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" <?php if($priceTop == '300' ): ?>class='on'<?php else: endif; ?>>300元</a>|
         <a href="/Home/Clothes/index/cat_id/<?php echo ($cat_id); ?>/top/<?php echo ($top); ?>/priceTop/300x/fg/<?php echo ($fg); ?>/fashion/<?php echo ($fashion); ?>#tagB" <?php if($priceTop == '300x' ): ?>class='on'<?php else: endif; ?>>300以上</a>|
                <input name="minPrice" id="J_RSInput" type="text" value="<?php echo ($minPrice); ?>">-<input name="maxPrice" id="J_REInput" type="text" value="<?php echo ($maxPrice); ?>">
                <input style="display: none;" value="确定" class="range-button showHideIng" type="submit">
            </form>
          </div>
	</div>

 <div class="brand-list" id="brand-waterfall">
 
	<?php if(is_array($proList)): $i = 0; $__LIST__ = $proList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item proMain" id="brand-<?php echo ($vo["pro_id"]); ?>">
                <div class="f_goods">
                    <a class="pic_a" href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank"><img src="/Public/uploads/<?php echo ($vo["img250x250"]); ?>" alt="<?php echo ($vo["pro_title"]); ?>" width="224"></a>
                    <div class="price_like_box clearfix">
                        <span class="price fl bigfs">￥<?php echo ($vo["pro_price"]); ?></span><del class="ml5 fl">￥<?php echo ($vo['pro_price']+28); ?></del><span class="discount-btn fl ml5"><?php echo ($vo['price_trend']/10); ?>折</span>
                        <span class="fr like_unit_box"><a href="javascript:;" class="faxian_g_icon faxian_like_icon fl"></a><span class="fr like_count">&nbsp;&nbsp;5</span></span>
                    </div>
                    <div class="title_box ofh"><?php echo ($vo["pro_title"]); ?></div>
                    <div class="comment_box">
                    	
                        	<?php $num = '0'; ?>
                    	<?php if(is_array($commentRows)): $i = 0; $__LIST__ = $commentRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo2['pro_id'] == $vo['pro_id']): $num = $num+1; ?>
                            	<?php if(in_array(($num), explode(',',"1,2,3"))): ?><div class="unit clearfix">
                                        <img src="/Public/uploads/<?php echo ($vo2["img180x180"]); ?>" alt="<?php echo ($vo["username"]); ?>" title="<?php echo ($vo["username"]); ?>" class="fl" width="25">
                                        <div class="fl ml10 comment">
                                        <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank" class="ofh">
                                        <?php echo ($var); echo ($vo2["content"]); ?>
                                        </a>
                                        </div>
                                    </div><?php endif; ?>
                            <?php else: endif; endforeach; endif; else: echo "" ;endif; ?>   
                         
                        <div class="comment_num_box">
                            <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank">查看全部评价(<?php echo ($num); ?>)</a>
                        </div>
                    </div>
                </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="tac mt20 clearfix">
    <div class="pagin inlineblock clearfix">
        <?php echo ($spage); ?>
    </div>
</div>

</div>
<div class="footer" id="footer">
	
	<div class="footer-nav clearfix">
		<dl class="about">
			<dt>关于我们</dt>
			<dd><a href="#" target="_blank">关于</a></dd>
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
                <dt><a href="#" target="_blank">友情链接</a></dt>
                <dd><a href="#" target="_blank">品善网</a></dd>
                <dd><a href="#" target="_blank">女装搭配网</a></dd>
                <dd><a href="#" target="_blank">时尚女装</a></dd> 
                <dd><a href="#" target="_blank">嗨淘网</a></dd>
                <dd><a href="#" target="_blank">美好筑家</a></dd>	
                <dd><a href="#" target="_blank">名鞋库</a></dd>
                <dd><a href="#" target="_blank">台湾黄页</a></dd>	
                <dd><a href="#" target="_blank">蹦蹦网</a></dd>
                <dd><a href="#" target="_blank">派代</a></dd>
            </dl>
            <dl class="how">
                <dt><a href="#" target="_blank">爱否</a></dt>
                <dd><a href="#" target="_blank">女人爱否</a></dd>
                <dd><a href="#" target="_blank">主题</a></dd>
                <dd><a href="#" target="_blank">好友爱否</a></dd>
                <dd><a href="#" target="_blank">逛时尚画报</a></dd>
            </dl>
	</div>
	<p class="cp">Copyright ©2013-2014 IF43.com, All Rights Reserved. <a rel="nofollow" href="#" target="_blank">京ICP备13029152号-1</a></p>
</div>
<script type="text/javascript" src="/public/js/waterfall.js" ></script>
</body>
</html>