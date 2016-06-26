<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($row["pro_title"]); ?>-如果时尚！爱否时尚-</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="如果时尚！爱否时尚,<?php echo ($row["pro_name"]); ?>">
<meta name="description" content="<?php echo ($row["pro_desc"]); ?>">
<link href="/Public/images/base.css" rel="stylesheet" type="text/css">
<link href="/Public/images/global.css" rel="stylesheet" type="text/css">
<link href="/Public/css/detail_new.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/Public/css/trends2015.css">
<!--[if lt IE 9]>
    <script src="/Public/js/html5shiv.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/index.js"></script>
<link href="/Public/css/lanrenzhijia.css" rel="stylesheet" type="text/css" />
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

<div id="product" style="width:1200px; margin:0 auto;">		
			 	<div style="width:480px; height:auto; overflow:hidden; float:left; background:#fff">
                
        <div class="lanrenzhijia">
        <!-- 大图begin -->
        <div id="preview" class="spec-preview"> 
        <span class="jqzoom"><img jqimg="/Public/uploads/<?php echo ($galaryRows[0]['img_url']); ?>" src="/Public/uploads/<?php echo ($galaryRows[0]['thumb_url']); ?>" width="480" /></span> 
        </div>
        <!-- 大图end -->
        <!-- 缩略图begin -->
        <div class="spec-scroll"> <a class="prev">&lt;</a> <a class="next">&gt;</a>
        <div class="items">
    <ul>
    	<?php if(is_array($galaryRows)): $i = 0; $__LIST__ = $galaryRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img bimg="/Public/uploads/<?php echo ($vo["img_url"]); ?>" src="/Public/uploads/<?php echo ($vo["thumb_url"]); ?>" title="<?php echo ($vo["img_desc"]); ?>" alt="<?php echo ($vo["img_desc"]); ?>" onmousemove="preview(this);"></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
        </div>
  
        </div>
        <!-- 缩略图end -->
        <script src="/Public/js/jquery.jqzoom.js"></script>
        <script src="/Public/js/lanrenzhijia.js"></script>
        </div>
                       </div>
			<!--gallery end-->	
		    <div class="gallery-text" style="position:relative;">
                <div class="clearfix tar">
               		 <a rel="nofollow" class="J_JiuCuo" href="javascript:;">价格有误？</a>
                </div>
                    <div class="buy-box mb10">
                        <div class="clearfix" id="J_BuyBox1">
                        <div class="buy-meta">
                        <span class="price">¥</span>
                        <span class="price-limit bigfs">
                             <?php echo ($row["pro_price"]); ?>
                        </span>
                        </div>
                            <div class="price-box">
                                 <div class="rebate"><span class="bigfs">↓</span><?php echo ($row["price_trend"]); ?>%</div>
                            </div>
                        </div>
                    </div>
                    <!--buy-box end-->
                    <h2 class="clearfix"><?php echo ($row["pro_title"]); ?></h2>
                    <div class="gallery-info">
                        <p><?php echo ($row["pro_desc"]); ?></p>
                    </div>
                        <div class="button_go clearfix">
                       		 <a class="buy-btn" href="<?php echo ($row["buy_url"]); ?>" target="_blank">去购买</a>
                		</div>
                
                <div class="comment-list">

                    <div class="comment-publish clearfix">
                        <div class="pub-box clearfix">
                            <div class="fl">
                            <?php if($_SESSION['user']== null): ?><img src="/Public/img/avatar-50.png" alt="匿名" width="40">
                            <?php else: ?>
                            <img src="/Public/uploads/<?php echo ($_SESSION['user']['img180x180']); ?>" alt="<?php echo ($_SESSION['user']['username']); ?>" width="40"><?php endif; ?>
                            </div>
                            <div class="cmt-doc">
                                <div class="fm">
                                    <textarea class="cmt-txa" name="content" id="commContent" placeholder="亲，觉得这个怎样？"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="J_CmtHiddenForm">
                            <div class="submit-row" style="position:relative;">
                                <input class="pub" id="commSub" value="发布" type="button">
                            </div>
                        </div>
                    </div>

                    <div class="comment">
                        <div id="J_ShowResult">
                        <!--第二个以上的div加class hideDiv-->
                        	
                            <?php if(is_array($commentRows)): $k = 0; $__LIST__ = $commentRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="cmt clearfix <?php if($k > 3 ): ?>hideDiv<?php else: endif; ?>">
                                <div class="user-pic">
                                    <a href="#">
                                       <?php if($vo["img180x180"] == null): ?><img src="/Public/img/avatar-50.png" alt="匿名" width="40">
                                        <?php else: ?>
                                        <img src="/Public/uploads/<?php echo ($vo["img180x180"]); ?>" alt="<?php echo ($vo["username"]); ?>"><?php endif; ?>
                                    </a>
                                </div>
                                <div class="cmt-doc">
                                <div class="cmt-info clearfix">
                                <a class="fl" href="#" title="ltffvk" target="_blank"><?php echo ($vo["username"]); ?></a>
                                <span class="fl gc"></span>
                                <span class="fr gc">
                                </span>
                                <span class="fr gc mr5 "><?php echo (date("Y/m/d h:m",$vo["time"])); ?></span>
                                </div>
                                <p class="cmt-content clearfix"><span><?php echo ($vo["content"]); ?></span>
                                <a class="J_CmtReplyBtn btn hf">回复<em class="J_ReplyCount" data-count="0"></em></a>
                                </p>
                                
                                <div class="cmt-reply J_CmtReply hf2" style="display:none">
                                    <textarea class="b-textarea J_ReplyTxt atsug" placeholder="回复内容!" id="content_<?php echo ($vo["id"]); ?>"></textarea>
                                    <p class="reply-info clearfix"><a class="sbl-btn J_ReplySubmit" data-type="list" id="hf_<?php echo ($vo["id"]); ?>" href="javascript:void(0);" onClick="hfInfo(<?php echo ($vo["id"]); ?>)">回复</a></p>
                                    <ul class="reply-list J_ReplyList">
                                        <?php if(is_array($hfRows)): $i = 0; $__LIST__ = $hfRows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo['id'] == $vo2['pid']): ?><li>
                                                    <img src="/Public/uploads/<?php echo ($vo2["img180x180"]); ?>" alt="<?php echo ($vo2["username"]); ?>" width="30">
                                                 	<strong><?php echo ($vo2["username"]); ?>回复:</strong>
                                                    <p><?php echo ($vo2["content"]); ?></p>
                                                 </li>
                                            <?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>
                                
                                </div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                          	
                            </div>
                                 <div class="cmt-more mt15 gengduo"><span id="J_Pagination">展开评论(<?php echo ($commentNums); ?>)</span></div>
                                 <div class="cmt-more mt15 showqi" style="display:none"><span id="J_Pagination" class="on">关闭评论(<?php echo ($commentNums); ?>)</span></div>
                                <!--J_ShowResult end-->
                    </div>
                    <!--comment end-->
                </div>
                <!-- JiaThis Button BEGIN -->
                <div class="fx">
                    <div id="ckepop">
                        <span class="jiathis_txt">分享到：</span>
                        <a class="jiathis_button_weixin">微信</a>
                        <a class="jiathis_button_qzone">QQ空间</a>
                        <a class="jiathis_button_tsina">新浪微博</a>
                        <a class="jiathis_button_renren">人人网</a> 
                        <a href="http://www.jiathis.com/share"  class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
                        <a class="jiathis_counter_style"></a>
                    </div> 
                   <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>
                </div>
                <!-- JiaThis Button END -->
			</div>
			<!--gallery-text end-->
					</div>
    <div style=" clear:both;"></div>
    <div class="xgtj">
        <h2>相关宝贝推荐</h2>
    </div>
    <div class="goods-wall s1024 clearfix" id="J_GoodsWall" style="width:1200px; margin:0 auto; margin-bottom:20px;">
<!--first 18 goods begin-->
<div class="section clearfix">

        <div class="goods big" data-pid="13227272">
            <div class="goods-pic"><a class="pic-link" href="/Home/Detail/index/pro_id/<?php echo ($moreRows[0]['pro_id']); ?>" title="<?php echo ($moreRows[0]['pro_title']); ?>" target="_blank"><img src="/Public/uploads/<?php echo ($bigPic['thumb_url']); ?>" height="460" width="460"></a></div>
            <div class="goods-title ofh"><?php echo ($moreRows[0]['pro_title']); ?></div>
            <div class="goods-stat clearfix">
            <div class="fl"><span class="yc">¥<?php echo ($moreRows[0]['pro_price']); ?></span></div>
            <a class="small-like-icon fr" href="javascript:;"></a>
        </div>
        <p class="goods-des"><?php echo ($moreRows[0]['pro_price']); ?></p>
        <div class="comment"><?php echo ($moreRows[0]['pro_desc']); ?></div>
        </div>
        
        	<?php if(is_array($moreRows)): $i = 0; $__LIST__ = array_slice($moreRows,1,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="goods small" data-pid="13227312">
                    <div class="goods-pic">
                        <a class="pic-link" href="/Home/Detail/index/pro_id/<?php echo ($vo['pro_id']); ?>" title="<?php echo ($vo['pro_title']); ?>" target="_blank"><img src="/Public/uploads/<?php echo ($vo['img250x250']); ?>" alt="<?php echo ($vo['pro_title']); ?>" width="210" height="210"></a>
                    </div>
                    <div class="goods-title ofh"><?php echo ($vo['pro_title']); ?></div>
                    <div class="goods-stat clearfix">
                        <div class="fl"><span class="yc">¥<?php echo ($vo['pro_price']); ?></span></div>
                        <a class="small-like-icon fr" href="javascript:;"></a>
                    </div>
                    <div class="comment"><?php echo ($vo['desc']); ?></div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </div>
            </div>
            </div>
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
<script>
$('#commSub').on("click",function(){
	
	$(this).val("评论中");
	var content=$('#commContent').val();
	var uid="<?php if($_SESSION['user']== null): else: echo ($_SESSION['user']['id']); endif; ?>";
	var username="<?php if($_SESSION['user']== null): ?>匿名<?php else: echo ($_SESSION['user']['username']); endif; ?>";
	var pro_id="<?php echo ($row["pro_id"]); ?>";
//	console.log(content);
//	console.log(uid);
//	console.log(username);
//	console.log(pro_id);
	var url="/Home/Detail/comment";
	$.post(url,{content:content,uid:uid,username:username,pro_id:pro_id},function(msg){
				console.log(msg);
				if(msg){
					$('#J_ShowResult').prepend(msg);
					$('#commSub').val("评论");
				}else{
				}	
			});
	
});
		
function hfInfo(id){
	
	$('#hf_'+id).html("<span>回复中</span>");
	
	var id=id;
	var content=$('#content_'+id).val();
	var uid="<?php if($_SESSION['user']== null): else: echo ($_SESSION['user']['id']); endif; ?>";
	var username="<?php if($_SESSION['user']== null): ?>匿名<?php else: echo ($_SESSION['user']['username']); endif; ?>";
	var pro_id="<?php echo ($row["pro_id"]); ?>";
	
	var url="/Home/Detail/hfAjax";
	$.post(url,{id:id,content:content,uid:uid,username:username,pro_id:pro_id},function(msg){
				//console.log(msg);
				if(msg){
					
					$('#content_'+id).siblings('.J_ReplyList').prepend(msg);
					$('#hf_'+id).html("回复");
					
				}else{
				}	
			});
	
	}
</script>
</body>
</html>