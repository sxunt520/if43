<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>如果时尚！爱否时尚-发现喜欢-不外出逛街一样可以发现自己喜欢的!</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="如果，时尚，爱否，购物分享，购物社区">
<meta name="description" content="如果，从这里开始，发现喜欢，改变生活。我们为你推荐适合的消费，是你购物决策的贴心助理。整合商品信息、网友评价，服务质量和价格比较。">
<link href="/Public/images/base.css" rel="stylesheet" type="text/css">
<link href="/Public/images/global.css" rel="stylesheet" type="text/css">
<link href="/Public/images/index.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/Public/css/trends2015.css">
<!--[if lt IE 9]>
    <script src="/Public/js/html5shiv.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/jquery.kinMaxShow-1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/index.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/css/visual.css">
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
<!-------------------------banner_Action------------------------->
<div class="index-top-slides">
	<div class="site-body-container">
		<div class="ember-view page-view section-page home-page">
			<div class="ember-view carousel">
				<div class="container">
					<div class="ember-view carousel-content carousel-transition">
                    
                        <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="slideDiv<?php echo ($i); ?>" class="ember-view article-block article-block-overlay carousel-item slideDiv<?php echo ($i); ?>">
                                <div class="ember-view image-view article-block-image pic">
                                    <a class="ember-view article-block-link" href="<?php echo ($vo["jumpurl"]); ?>" target="_blank">
                                        <div class="ember-view background-image" style="background-image:url(&quot;/Public/uploads/<?php echo ($vo["advimg"]); ?>&quot;)">
                                        </div>
                                    </a>
                                </div>
                            <div class="article-block-details">
                                <a class="ember-view article-block-title-link" href="<?php echo ($vo["jumpurl"]); ?>" target="_blank"><h3 class="article-block-title"><?php echo ($vo["title"]); ?></h3></a>    
                                    <div class="article-block-subdetails">
                                    <div class="share-2">
                                    <span class="fr cf">
                                    <a href="<?php echo ($vo["jumpurl"]); ?>" target="_blank" class="wb"></a>
                                    <a href="<?php echo ($vo["jumpurl"]); ?>" target="_blank" class="qq"></a>
                                    <a href="<?php echo ($vo["jumpurl"]); ?>" class="wx"></a>
                                    </span>
                                    <span class="hot"><i></i>10004</span>
                                    </div>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>

					</div>
				</div>
				<a style="display: none;" class="arrow-control arrow-control-prev">
					<span class="arrow-control-btn"></span>
				</a>
				<a style="display: none;" class="arrow-control arrow-control-next">
					<span class="arrow-control-btn"></span>
				</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/Public/js/visual.js"></script>
<!-------------------------banner_End------------------------->
<div id="wrap">
    <div id="container">
        <div class="main-focus clearfix">
        <div class="main-focus-tags">
        
        	<dl data-popup="popup1" class="tags-bd">
            	<dt class="group-title">
                	<a class="tag-group" href="/Home/Clothes/prolist/cat_id/1" target="_blank">衣服</a>
                </dt>
                <dd class="group-box">
                    <?php if(is_array($tj1)): $i = 0; $__LIST__ = $tj1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
                <dd style="display: none;" class="popup-arr-lf"></dd>
            </dl>
            
            <dl data-popup="popup2" class="tags-bd">
            	<dt class="group-title">
                	<a class="tag-group" href="/Home/Shoe/prolist/cat_id/2" target="_blank">鞋子</a>
                </dt>
                <dd class="group-box">
                	<?php if(is_array($tj2)): $i = 0; $__LIST__ = $tj2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Shoe/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                 </dd>
                <dd style="display: none;" class="popup-arr-lf"></dd>
            </dl>
            
            <dl data-popup="popup3" class="tags-bd">
            	<dt class="group-title">
                	<a class="tag-group" href="/Home/Bag/prolist/cat_id/3" target="_blank">包包</a>
                </dt>
                <dd class="group-box">
                    <?php if(is_array($tj3)): $i = 0; $__LIST__ = $tj3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Bag/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
                <dd style="display: none;" class="popup-arr-lf"></dd>
            </dl>
            
            <dl data-popup="popup4" class="tags-bd">
            	<dt class="group-title">
                	<a class="tag-group" href="/Home/Acc/prolist/cat_id/4" target="_blank">配饰</a>
                </dt>
                <dd class="group-box">
                	<?php if(is_array($tj4)): $i = 0; $__LIST__ = $tj4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Acc/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
               	</dd>
                <dd style="display: none;" class="popup-arr-lf"></dd>
            </dl>
            
            <div style="display: none;" class="tags-popup popup1">
            <div class="tags-list clearfix">
            <dl class="tags-col">
            	 <dt><a class="tag-tl" href="/Home/Clothes/prolist/cat_id/5" target="_blank">上衣TOPS</a><i class="arr-dw"></i></dt>
                	<dd>
                    	<?php if(is_array($subCat1)): $i = 0; $__LIST__ = $subCat1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                     </dd>
              </dl>
                <dl class="tags-col">
                    <dt><a class="tag-tl" href="/Home/Clothes/prolist/cat_id/6" target="_blank">裤子TROUSERS</a><i class="arr-dw"></i></dt>
                    <dd>
                        <?php if(is_array($subCat2)): $i = 0; $__LIST__ = $subCat2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <dl class="tags-col last"> 
                        <dt><a class="tag-tl" href="/Home/Clothes/prolist/cat_id/7" target="_blank">裙子DRESSES</a><i class="arr-dw"></i></dt>
                        <dd>
                            <?php if(is_array($subCat3)): $i = 0; $__LIST__ = $subCat3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </dd>
                  </dl>
               </div>
            <div class="popup-banner">
              <a href="<?php echo ($catBanner[0]['jumpurl']); ?>" target="_blank" title="<?php echo ($catBanner[0]['title']); ?>">
                <img src="/Public/uploads/<?php echo ($catBanner[0]['advimg']); ?>" alt="<?php echo ($catBanner[0]['title']); ?>" height="121" width="468">
              </a>
            </div>
          </div>
          
            <div style="display: none;" class="tags-popup popup2">
            <div class="tags-list clearfix">
            <dl class="tags-col"> 
                <dt><a class="tag-tl" href="/Home/Shoe/prolist/cat_id/47#tagB" target="_blank">款式STYLE </a><i class="arr-dw"></i></dt>
                <dd>
                     <?php if(is_array($subCat4)): $i = 0; $__LIST__ = $subCat4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Shoe/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); echo ($vo["cat_id"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
            </dl>
            <dl class="tags-col"> 
                <dt><a class="tag-tl" href="/Home/Shoe/prolist/cat_id/48#tagB" target="_blank">元素ELEMENT</a><i class="arr-dw"></i></dt>
                <dd>
                     <?php if(is_array($subCat5)): $i = 0; $__LIST__ = $subCat5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Shoe/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
            </dl>
            <dl class="tags-col last"> 
                <dt><a class="tag-tl" href="/Home/Shoe/index#tagB" target="_blank">潮流风格FASHION</a><i class="arr-dw"></i></dt>
                <dd>
                    <?php if(is_array($subCat6)): $i = 0; $__LIST__ = $subCat6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Shoe/prolist/fg/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
            </dl>
            </div>
                <div class="popup-banner">
                    <a href="<?php echo ($catBanner[1]['jumpurl']); ?>" target="_blank"  title="<?php echo ($catBanner[1]['title']); ?>">
                    <img src="/Public/uploads/<?php echo ($catBanner[1]['advimg']); ?>" alt="<?php echo ($catBanner[1]['title']); ?>" height="121" width="468">
                  </a>
                </div>
            </div>
            
            <div style="display: none;" class="tags-popup popup3">
            <div class="tags-list clearfix">
            	<dl class="tags-col">
                <dt><a class="tag-tl" href="/Home/Bag/prolist/cat_id/86#tagB" target="_blank">款式STYLE</a><i class="arr-dw"></i></dt>
                <dd>
                    <?php if(is_array($subCat7)): $i = 0; $__LIST__ = $subCat7;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Bag/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
              </dl>
                <dl class="tags-col"> 
                <dt><a class="tag-tl" href="/Home/Bag/prolist/cat_id/88#tagB" target="_blank">流行TREND</a><i class="arr-dw"></i></dt>
                <dd>
                    <?php if(is_array($subCat8)): $i = 0; $__LIST__ = $subCat8;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Bag/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </dd>
                </dl>
                <dl class="tags-col last"> 
                    <dt><a class="tag-tl" href="/Home/Bag/prolist" target="_blank">材质MATERIAL</a><i class="arr-dw"></i></dt>
                    <dd>
                        <?php if(is_array($subCat9)): $i = 0; $__LIST__ = $subCat9;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Bag/prolist/cz/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                </div>
            <div class="popup-banner">
              <a href="<?php echo ($catBanner[2]['jumpurl']); ?>" target="_blank"  title="<?php echo ($catBanner[2]['title']); ?>">
                <img src="/Public/uploads/<?php echo ($catBanner[2]['advimg']); ?>" alt="<?php echo ($catBanner[2]['title']); ?>" height="121" width="468">
              </a>
            </div>
          </div>
          
          <div style="display: none;" class="tags-popup popup4">
            <div class="tags-list clearfix">
                    <dl class="tags-col"> 
                        <dt><a class="tag-tl" href="/Home/Acc/prolist/cat_id/128#tagB" target="_blank">首饰JEWELRY</a><i class="arr-dw"></i></dt>
                        <dd>
                            <?php if(is_array($subCat10)): $i = 0; $__LIST__ = $subCat10;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Acc/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </dd>
                    </dl>
                    <dl class="tags-col"> 
                    <dt><a class="tag-tl" href="/Home/Acc/prolist/cat_id/129#tagB" target="_blank">装扮DRESS UP</a><i class="arr-dw"></i></dt>
                    <dd>
                        <?php if(is_array($subCat11)): $i = 0; $__LIST__ = $subCat11;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Acc/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank"><?php echo ($vo["cat_name"]); if($vo['is_tj'] == 1): ?><i class="annotated">*</i><?php else: endif; ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                    </dl>
                    <dl class="tags-col last"> 
                        <dt><a class="tag-tl" href="/Home/Acc/prolist" target="_blank">材质MATERIAL</a><i class="arr-dw"></i></dt>
                        <dd>
                            <?php if(is_array($subCat12)): $i = 0; $__LIST__ = $subCat12;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="tag-item" href="/Home/Acc/prolist/cz/<?php echo ($vo); ?>" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </dd>
                    </dl>
                            </div>
            <div class="popup-banner">
              <a href="<?php echo ($catBanner[3]['jumpurl']); ?>" target="_blank"  title="<?php echo ($catBanner[3]['title']); ?>">
                <img src="/Public/uploads/<?php echo ($catBanner[3]['advimg']); ?>" alt="<?php echo ($catBanner[3]['title']); ?>" height="121" width="468">
              </a>
            </div>
          </div>
   
              </div> 
        <!-- tags end -->
        
            <div class="main-focus-slider">
            	
                <div id="kinMaxShow">
                	<?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div><a href="<?php echo ($vo["jumpurl"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="/Public/uploads/<?php echo ($vo["advimg"]); ?>"/></a></div><?php endforeach; endif; else: echo "" ;endif; ?>    
                </div>
            </div>
        <!-- slider end -->
        
        <div class="main-focus-newpro">
            <div class="newpro-hd clearfix">
              <div class="calender">
                <em id="J_DayNum" class="day-num">28</em>
                <span id="J_YearNum" class="year-num">2015</span>
                <span id="J_MonNum" class="mon-num">06</span>
              </div>
              <h3 class="newpro-title">
                <a href="#" target="_blank">
                  今日新品
                  <span class="title-en">New Products</span>
                </a>
              </h3>
            </div>
            <div class="newpro-bd">
              <a href="<?php echo ($newPic["jumpurl"]); ?>" title="<?php echo ($newPic["title"]); ?>" target="_blank">
                <img src="/Public/uploads/<?php echo ($newPic["advimg"]); ?>" alt="<?php echo ($newPic["title"]); ?>" height="250" width="210">
                <!--<span class="bd-title">— 最新专题 —</span>-->
              </a>
            </div>
        </div>
        <!-- newpro end -->
        <script>
        (function(){
          // 日历
          var myDate = new Date(),
            curYear = myDate.getFullYear(),
            curMonth = myDate.getMonth(),
            curDate = myDate.getDate();
        
          curMonth = curMonth+1;
          curMonth = curMonth.toString().length<2?("0"+curMonth):curMonth;
          curDate = curDate.toString().length<2?("0"+curDate):curDate;
        
          document.getElementById("J_YearNum").innerHTML = curYear;
          document.getElementById("J_MonNum").innerHTML = curMonth;
          document.getElementById("J_DayNum").innerHTML = curDate;
        })();
        </script>
        </div>
        
        <div class="category-main clearfix">
            <div class="category-left">
                <div class="topic">
                    <div class="hd pl10">
                        <h2>今日精选主题</h2>
                    </div>
                    <div class="topic-recommend">
                    <div class="pic">
                        <a href="#" target="_blank">
                        	<img src="/Public/images/1435283963853.jpg" alt="简约" height="274" width="300">
                        </a>
                    </div>
                        <div style="top: 274px;" class="J_picGrid">
                            <a href="#" target="_blank">
                                <img alt="简约" src="/Public/images/eeruajjbpyveaxzol45f6lq.jpg">
                                <img alt="简约" src="/Public/images/eeruajjbpyvh4xzol45f6lq.jpg">
                                <img alt="简约" src="/Public/images/eeruajjbpyvcixzol45f6lq.jpg" class="last">
                                <img alt="简约" src="/Public/images/eeruajjbpytf4xzol45f6lq.jpg">
                                <img alt="简约" src="/Public/images/eeruajjbpytcgxzol45f6lq.jpg">
                                <img alt="简约" src="/Public/images/eeruajjbpyssuxzol45f6lq.jpg" class="last">
                                <img alt="简约" src="/Public/images/eeruajjbpzpccxzol45f6lq.jpg">
                                <img alt="简约" src="/Public/images/eeruajjbpysscxzol45f6lq.jpg">
                                <img alt="简约" src="/Public/images/eeruajjbpyssixzol45f6lq.jpg" class="last">
                            </a>
                        </div>
                    </div>
                    <div class="topic-recommend">
                    <div class="pic">
                        <a href="#" target="_blank">
                             <img src="/Public/images/1435284111298.jpg" alt="罗马假日" height="274" width="300">
                        </a>
                    </div>
                        <div style="top: 274px;" class="J_picGrid">
                            <a href="#" target="_blank">
                                <img alt="罗马假日" src="/Public/images/efacmkrgef7ccxzol45f6lq.jpg">
                                <img alt="罗马假日" src="/Public/images/efack7reeessgxzol45f6lq.jpg">
                                <img alt="罗马假日" src="/Public/images/efaf4izeeutd6xzol45f6lq.jpg" class="last">
                                <img alt="罗马假日" src="/Public/images/efaciijkib7d6xzol45f6lq.jpg">
                                <img alt="罗马假日" src="/Public/images/efacgjbklyqscxzol45f6lq.jpg">
                                <img alt="罗马假日" src="/Public/images/efackij7enacixzol45f6lq.jpg" class="last">
                                <img alt="罗马假日" src="/Public/images/efaf4jbder7h4xzol45f6lq.jpg">
                                <img alt="罗马假日" src="/Public/images/efaciqb7emseaxzol45f6lq.jpg">
                                <img alt="罗马假日" src="/Public/images/efaf4jbgiavcgxzol45f6lq.jpg" class="last">
                            </a>
                        </div>
                    </div>
                <div class="topic-recommend">
                <div class="pic">
                    <a href="#" target="_blank">
                  		  <img src="/Public/images/1435284269568.jpg" alt="泳装party" height="274" width="300">
                    </a>
                </div>
                    <div style="top: 274px;" class="J_picGrid">
                        <a href="#" target="_blank">
                            <img alt="泳装party" src="/Public/images/iavh4pzdeyrv6ls7hjps4.jpg">
                            <img alt="泳装party" src="/Public/images/efack7rfeeveaxzol45f6lq.jpg">
                            <img alt="泳装party" src="/Public/images/efacgizfibpccxzol45f6lq.jpg" class="last">
                            <img alt="泳装party" src="/Public/images/iassiik6eqtf6ls7hjps4.jpg">
                            <img alt="泳装party" src="/Public/images/emsscjcaenaf6ls7hjps4.jpg">
                            <img alt="泳装party" src="/Public/images/efacujjbeusskxzol45f6lq.jpg" class="last">
                            <img alt="泳装party" src="/Public/images/efacgizfibpckxzol45f6lq.jpg">
                            <img alt="泳装party" src="/Public/images/efacuxs6eeqx4xzol45f6lq.jpg">
                            <img alt="泳装party" src="/Public/images/eussiks6eeqv6ls7hjps4.jpg" class="last">
                        </a>
                    </div>
                </div>
                </div>
            </div>
            <div class="category-right">
                <div class="wonderful">
                    <div class="hd">
                        <h2>精选榜</h2>
                        <div class="more">
                            <a href="#" target="_blank">万千精彩&gt;</a>
                        </div>
                    </div>
                    <ul class="clearfix">
                    <li>
                   		<a class="ofh max" href="#" target="_blank">玩转初春英伦风</a><span class="new">新晋</span>
                	    <span class="num">46</span>
                    </li>
                    <li>
                    <a class="ofh max" href="#/jie/1194513" target="_blank">卖萌T, 萌化你</a><span class="hot">热点</span>
                    <span class="num">51</span>
                    </li>
                    <li>
                    <a class="ofh max" href="#/jie/1194021" target="_blank">三七分，瘦高立现</a><span class="new">新晋</span>
                    <span class="num">45</span>
                    </li>
                    <li>
                    <a class="ofh max" href="#/jie/1193836" target="_blank">黑金小时代</a><span class="new">新晋</span>
                    <span class="num">42</span>
                    </li>
                    <li>
                    <a class="ofh default" href="#/jie/1194564" target="_blank">小翻领甜美外套❤甜美女人节</a>
                    <span class="num">42</span>
                    </li>
                    <li>
                    <a class="ofh default" href="#/jie/1194518" target="_blank">衬衫与开衫的清新搭配</a>
                    <span class="num">45</span>
                    </li>
                    <li>
                    <a class="ofh default" href="#/jie/1194488" target="_blank"> 复古感修身连衣裙！初春必备</a>
                    <span class="num">45</span>
                    </li>
                    <li>
                    <a class="ofh max" href="#/jie/1194468" target="_blank">宝蓝+纯白 打造清爽白富美！</a><span class="hot">热点</span>
                    <span class="num">42</span>
                    </li>
                    <li>
                    <a class="ofh max" href="#/jie/1192488" target="_blank">英伦潮时代之无与伦比</a><span class="new">新晋</span>
                    <span class="num">44</span>
                    </li>
                    <li>
                    <a class="ofh default" href="#/jie/1192094" target="_blank">5分钟，上班不再迟到</a>
                    <span class="num">42</span>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="category-main clearfix">
            <div class="category clearfix ">
            <div class="category-box pt0">
            <div class="hd">
            <h2>
           		 <a href="/Home/Clothes/prolist" target="_blank">衣服</a>
            </h2>
            </div>
            <div class="left">
            
                <div class="pic-l">
                    <a href="/Home/Detail/index/pro_id/<?php echo ($proRows1[0]['pro_id']); ?>" target="_blank">
                        <img alt="短袖T恤" src="/Public/uploads/<?php echo ($proRows1[0]['img250x250']); ?>" height="250" width="250">
                         <span class="title"><?php echo ($proRows1[0]['cat_name']); ?></span>
                    </a>
                </div>
            
                <div class="pic-r">
                    <?php if(is_array($proRows1)): $i = 0; $__LIST__ = array_slice($proRows1,1,11,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="img">
                            <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank">
                                <img alt="<?php echo ($vo["pro_title"]); ?>" src="/Public/uploads/<?php echo ($vo["img120x120"]); ?>" height="120" width="120">
                                <span class="title"><?php echo ($vo["cat_name"]); ?></span>
                            </a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                
            </div>
            <div class="right">
                <div class="tag-info">
                    <div class="tag">
                    <a href="/Home/Clothes/prolist/cat_id/5" target="_blank">上衣</a>
                    </div>
                    <div class="tagss">
                     <?php if(is_array($subCat1)): $i = 0; $__LIST__ = $subCat1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            <div class="tag-info">
            <div class="tag">
           		<a href="/Home/Clothes/prolist/cat_id/6" target="_blank">裤子</a>
            </div>
            <div class="tagss">
                <?php if(is_array($subCat2)): $i = 0; $__LIST__ = $subCat2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            </div>
            <div class="tag-info">
            <div class="tag">
           		 <a href="/Home/Clothes/prolist/cat_id/7" target="_blank">裙子</a>
            </div>
            <div class="tagss">
                <?php if(is_array($subCat3)): $i = 0; $__LIST__ = $subCat3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Clothes/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            </div>
            <div class="tag-info">
            <div class="tag">
           		 <a href="/Home/Clothes/index#tagB" target="_blank">风格</a>
            </div>
            <div class="tagss">
                 <?php if(is_array($subCat13)): $i = 0; $__LIST__ = $subCat13;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Clothes/index/cat_id/1/fg/<?php echo ($vo); ?>#tagB" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            </div>
            </div>
            </div>
            </div>
	         
            <div class="category clearfix ">
                <div class="category-box">
                    <div class="hd">
                        <h2>
                      		  <a href="/Home/shoe/prolist" target="_blank">鞋子</a>
                        </h2>
                    </div>
                <div class="left">
                       <div class="pic-l">
                        <a href="/Home/Detail/index/pro_id/<?php echo ($proRows2[0]['pro_id']); ?>" target="_blank">
                            <img alt="短袖T恤" src="/Public/uploads/<?php echo ($proRows2[0]['img250x250']); ?>" height="250" width="250">
                             <span class="title"><?php echo ($proRows2[0]['cat_name']); ?></span>
                        </a>
                    </div>
                    <div class="pic-r">
                        <?php if(is_array($proRows2)): $i = 0; $__LIST__ = array_slice($proRows2,1,11,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="img">
                                <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank">
                                    <img alt="雪纺衫" src="/Public/uploads/<?php echo ($vo["img120x120"]); ?>" height="120" width="120">
                                    <span class="title"><?php echo ($vo["cat_name"]); ?></span>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="right">
                    <div class="tag-info">
                        <div class="tag">
                     	   <a href="/Home/Shoe/prolist/cat_id/47#tagB" target="_blank">款式</a>
                        </div>
                    <div class="tagss">
                        <?php if(is_array($subCat4)): $i = 0; $__LIST__ = $subCat4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Shoe/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    </div>
                <div class="tag-info">
                    <div class="tag">
                    <a href="/Home/Shoe/prolist/cat_id/48#tagB" target="_blank">元素</a>
                    </div>
                    <div class="tagss">
                         <?php if(is_array($subCat5)): $i = 0; $__LIST__ = $subCat5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Shoe/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="tag-info">
                    <div class="tag">
                      <a href="/Home/Shoe/index#tagB" target="_blank">风格</a>
                    </div>
                <div class="tagss">
                       <?php if(is_array($subCat6)): $i = 0; $__LIST__ = $subCat6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Shoe/index/fg/<?php echo ($vo); ?>#tagB" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                </div>
                <div class="tag-info">
                    <div class="tag">
                 	   <a href="/Home/Shoe/index#tagB" target="_blank">场景</a>
                    </div>
                    <div class="tagss">
                       <?php if(is_array($subCat14)): $i = 0; $__LIST__ = $subCat14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Shoe/index/cj/<?php echo ($vo); ?>#tagB" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                </div>
                </div>
            </div>
	         
            <div class="category clearfix ">
            <div class="category-box">
                <div class="hd">
                    <h2>
                  		  <a href="/Home/Bag/prolist" target="_blank">包包</a>
                    </h2>
                </div>
            <div class="left">
                	<div class="pic-l">
                        <a href="/Home/Detail/index/pro_id/<?php echo ($proRows3[0]['pro_id']); ?>" target="_blank">
                            <img alt="短袖T恤" src="/Public/uploads/<?php echo ($proRows3[0]['img250x250']); ?>" height="250" width="250">
                             <span class="title"><?php echo ($proRows3[0]['cat_name']); ?></span>
                        </a>
                    </div>
                
                    <div class="pic-r">
                        <?php if(is_array($proRows3)): $i = 0; $__LIST__ = array_slice($proRows3,1,11,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="img">
                                <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank">
                                    <img alt="雪纺衫" src="/Public/uploads/<?php echo ($vo["img120x120"]); ?>" height="120" width="120">
                                    <span class="title"><?php echo ($vo["cat_name"]); ?></span>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
            </div>
            <div class="right">
            <div class="tag-info">
                <div class="tag">
                    <a href="/Home/Bag/prolist/cat_id/86#tagB" target="_blank">款式</a>
                </div>
            <div class="tagss">
                		<?php if(is_array($subCat7)): $i = 0; $__LIST__ = $subCat7;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Bag/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            </div>
            <div class="tag-info">
                <div class="tag">
                    <a href="/Home/Bag/prolist/cat_id/88#tagB" target="_blank">流行</a>
                </div>
                    <div class="tagss">
                        <?php if(is_array($subCat8)): $i = 0; $__LIST__ = $subCat8;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Bag/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
            </div>
            <div class="tag-info">
                <div class="tag">
                     <a href="/Home/Bag/index#tagB" target="_blank">材质</a>
                </div>
                    <div class="tagss">
                        <?php if(is_array($subCat9)): $i = 0; $__LIST__ = $subCat9;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Bag/index/cz/<?php echo ($vo); ?>#tagB" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
            </div>
                <div class="tag-info">
                    <div class="tag">
                         <a href="/Home/Bag/index#tagB" target="_blank">风格</a>
                    </div>
                        <div class="tagss">
                            <?php if(is_array($subCat15)): $i = 0; $__LIST__ = $subCat15;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Bag/index/fg/<?php echo ($vo); ?>#tagB" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
	         
            <div class="category clearfix ">
            <div class="category-box">
                <div class="hd">
                    <h2>
                         <a href="/Home/Acc/prolist" target="_blank">配饰</a>
                    </h2>
                </div>
            <div class="left">
                 <div class="pic-l">
                        <a href="/Home/Detail/index/pro_id/<?php echo ($proRows4[0]['pro_id']); ?>" target="_blank">
                            <img alt="短袖T恤" src="/Public/uploads/<?php echo ($proRows4[0]['img250x250']); ?>" height="250" width="250">
                             <span class="title"><?php echo ($proRows4[0]['cat_name']); ?></span>
                        </a>
                    </div>
                
                    <div class="pic-r">
                        <?php if(is_array($proRows4)): $i = 0; $__LIST__ = array_slice($proRows4,1,11,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="img">
                                <a href="/Home/Detail/index/pro_id/<?php echo ($vo["pro_id"]); ?>" target="_blank">
                                    <img alt="雪纺衫" src="/Public/uploads/<?php echo ($vo["img120x120"]); ?>" height="120" width="120">
                                    <span class="title"><?php echo ($vo["cat_name"]); ?></span>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
            </div>
            <div class="right">
            <div class="tag-info">
                <div class="tag">
                     <a href="/Home/Acc/prolist/cat_id/128#tagB" target="_blank">首饰</a>
                </div>
                    <div class="tagss">
                        <?php if(is_array($subCat10)): $i = 0; $__LIST__ = $subCat10;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Acc/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
            </div>
            <div class="tag-info">
                <div class="tag">
                     <a href="/Home/Acc/prolist/cat_id/129#tagB" target="_blank">装扮</a>
                </div>
            <div class="tagss">
                		<?php if(is_array($subCat11)): $i = 0; $__LIST__ = $subCat11;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Acc/prolist/cat_id/<?php echo ($vo["cat_id"]); ?>" target="_blank" <?php if($vo['is_tj'] == 1): ?>class="on"<?php else: endif; ?>><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            </div>
            <div class="tag-info">
            <div class="tag">
            <a href="/Home/Acc/index#tagB" target="_blank">材质</a>
            </div>
                <div class="tagss">
                  	  <?php if(is_array($subCat12)): $i = 0; $__LIST__ = $subCat12;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Acc/index/cz/<?php echo ($vo); ?>#tagB" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
                <div class="tag-info">
                    <div class="tag">
                         <a href="/Home/Acc/index#tagB" target="_blank">风格</a>
                    </div>
                    <div class="tagss">
                        <?php if(is_array($subCat16)): $i = 0; $__LIST__ = $subCat16;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/Home/Acc/index/fg/<?php echo ($vo); ?>#tagB" target="_blank"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            </div>
            </div>
	    
                </div>
        		
        <div class="category-main clearfix">
            <div class="category-left">
                <div class="follow-daren">
                    <div class="hd">
                        <h2>推荐关注达人</h2>
                        <span class="separate">|</span>
                        <a class="em" target="_blank" href="#">申请达人认证</a>
                    </div>
                    <div class="darenGrid">
                        <div class="user">
                            <a href="#" target="_blank">
                            <img class="user-img" src="/Public/images/eevea7rkev7f6jc7eqqsu7q.jpg" alt="absolut梅">
                        </a>
                        <div class="user-info">
                      			  <a rel="usercard" data-id="1820850" href="#" class="user-name" target="_blank">absolut梅<i class="inlineblock i-daren ml5"></i></a>
                    		    <p></p>
                        </div>
                        </div>
                        <div class="user-Grid">
                            <a href="#/u/1820850" target="_blank">
                                <img alt="absolut梅的宝贝" src="/Public/images/eeruaqb7em7uaxzol45f6lq.jpg">
                                <img alt="absolut梅的宝贝" src="/Public/images/eeruaqb7em7x4xzol45f6lq.jpg">
                                <img class="last" alt="absolut梅的宝贝" src="/Public/images/eeruaqb7emtcuxzol45f6lq.jpg">
                                <img alt="absolut梅的宝贝" src="/Public/images/eeruaqb7emtcmxzol45f6lq.jpg">
                                <img alt="absolut梅的宝贝" src="/Public/images/eeruaqb7emtf4xzol45f6lq.jpg">
                                <img class="last" alt="absolut梅的宝贝" src="/Public/images/eeruaqb7emtcixzol45f6lq.jpg">
                            </a>
                        </div>
                    </div>
                    <div class="darenGrid">
                        <div class="user">
                            <a href="#" target="_blank">
                           		 <img class="user-img" src="/Public/images/eevckijkeusv6jc7eqqsu7q.jpg" alt="喵咪_sun">
                            </a>
                        <div class="user-info">
                             <a rel="usercard" data-id="1851855" href="#" class="user-name" target="_blank">喵咪_sun<i class="inlineblock i-daren ml5"></i></a>
                             <p>Follow U heart</p>
                        </div>
                        </div>
                        <div class="user-Grid">
                        <a href="#" target="_blank">
                            <img alt="喵咪_sun的宝贝" src="/Public/images/eeruajbeenpckxzol45f6lq.jpg">
                            <img alt="喵咪_sun的宝贝" src="/Public/images/eeruajbeenpcixzol45f6lq.jpg">
                            <img class="last" alt="喵咪_sun的宝贝" src="/Public/images/eeruajbeenpcgxzol45f6lq.jpg">
                            <img alt="喵咪_sun的宝贝" src="/Public/images/eeruajbeenpeaxzol45f6lq.jpg">
                            <img alt="喵咪_sun的宝贝" src="/Public/images/eeruajbeenpccxzol45f6lq.jpg">
                            <img class="last" alt="喵咪_sun的宝贝" src="/Public/images/eeruajbeenph4xzol45f6lq.jpg">
                        </a>
                        </div>
                    </div>
                    <div class="darenGrid last">
                    <div class="user">
                    <a href="#" target="_blank">
                    <img class="user-img" src="/Public/images/eetcgi36eyvf6jc7eqqsu7q.jpg" alt="享受生活点缀人生">
                    </a>
                    <div class="user-info">
                        <a rel="usercard" data-id="1733078" href="#" class="user-name" target="_blank">享受生活点缀人生<i class="inlineblock i-daren ml5"></i></a>
                        <p></p>
                    </div>
                    </div>
                    <div class="user-Grid">
                        <a href="#" target="_blank">
                            <img alt="享受生活点缀人生的宝贝" src="/Public/images/eeruaizbeyqv4xzol45f6lq.jpg">
                            <img alt="享受生活点缀人生的宝贝" src="/Public/images/eeruaizbeyqsixzol45f6lq.jpg">
                            <img class="last" alt="享受生活点缀人生的宝贝" src="/Public/images/eerscxt6eytccxzol45f6lq.jpg">
                            <img alt="享受生活点缀人生的宝贝" src="/Public/images/eeruaizbeyqsgxzol45f6lq.jpg">
                            <img alt="享受生活点缀人生的宝贝" src="/Public/images/eeruaizbez7d6xzol45f6lq.jpg">
                            <img class="last" alt="享受生活点缀人生的宝贝" src="/Public/images/eeruaizblyvd6xzol45f6lq.jpg">
                        </a>
                    </div>
                    </div>
                    </div>
            </div>
            <div class="category-right">
                <div class="events-pic">
                <div class="hd pb10">
               		 <h2>活动</h2>
                </div>
                <a href="#" target="_bank">
              	  <img src="/Public/images/1433207598688.jpg" alt="画报" height="153" width="210">
                </a>
                <div class="events-news">
                <ul class="clearfix">
                    <li class="ofh">
                        <a href="#" target="_bank">
                         4.21--5.3 主题方向：吃货大集结
                        </a>
                    </li>
                    <li class="ofh">
                        <a href="#" target="_bank">
                         主题：宽松罩衫遮肉！秒变氧气Girl
                        </a>
                    </li>
                    <li class="ofh">
                        <a href="#" target="_bank">
                        搭配-显高显瘦! 燕尾裙摆亮眼优雅
                        </a>
                    </li>
                </ul>
                </div>
                </div>
            </div>
        </div>
                
                <div class="justGuang clearfix">
                    <h3>专注品质导购，每件宝贝都由网购达人、资深小编为你精挑细选</h3>
                    <h4>每日50+精美主题、5000+精选单品、记得常来爱否时尚(IF43.COM)！</h4>
                    <div class="already">
                        <a class="go-faxian" href="/Home/Clothes/prolist/" target="_blank">逛单品&gt;</a>
                        <a class="go-topic" href="/Home/Topic" target="_blank">翻主题&gt;</a>
                    </div>
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