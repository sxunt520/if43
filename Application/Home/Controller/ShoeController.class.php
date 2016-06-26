<?php
//鞋子控制器
namespace Home\Controller;
class ShoeController extends BaseController {
	
//鞋子首页
    public function index(){

    	//广告
		$advModel=M('adv');
		$assign['focus']=$advModel->where('type_id=10 and is_show=1')->order('advorder DESC')->limit(3)->select();//鞋子首页_广告幻灯三张
		$assign['newPic']=$advModel->where('type_id=11 and is_show=1')->order('advorder DESC')->limit(1)->find();//鞋子首页_幻灯右侧一张
		
		/**************分类**********/
		$catModel=M('category');
		$attrModel=M('attribute');
		$categoryModel = new \Model\CategoryModel();
		
		//当前类相关操作
		//$cat_id = isset ( $_GET ['cat_id'] ) ? $_GET ['cat_id'] : 1;
		$cat_id = I('get.cat_id',2);//如果cat_id不存在~返回鞋子的cat_id=2
		$assign['nowCatName']=$catModel->find($cat_id);//当前类的相关信息
		$assign['cat_id']=$cat_id;//装入显示数组数组中
		$subIds = $categoryModel->getSubIds($cat_id);//获当前类的所有子类
		$subIds=implode(',', $subIds);
		
		//鞋子推荐
		$subIds2 = $categoryModel->getSubIds(2);//获取鞋子子类
		$subIds2=implode(',', $subIds2);
		$assign['tj1']=$catModel->where("cat_id in ($subIds2) AND is_tj=1 AND is_show=1")->order('sort_order desc')->limit(16)->select();
		
		/****子分类调用****/
		//鞋子————款式、元素、潮流风格、适用场景
		$assign['subCat1']=$catModel->where("parent_id=47 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$assign['subCat2']=$catModel->where("parent_id=48 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$attr_value=$attrModel->where("attr_id=19")->find();
		$assign['subCat3']=explode(PHP_EOL, $attr_value['attr_value']);
		$attr_value=$attrModel->where("attr_id=4")->find();
		$assign['subCat4']=explode(PHP_EOL, $attr_value['attr_value']);
		/**************分类**********/
		
		/**********精品调用*********/
		$proModel=M('pro');
		//幻灯片下面5个推荐
		$assign['proRows1']=$proModel->join('if43_category ON if43_pro.cat_id=if43_category.cat_id')
		->where("if43_pro.cat_id in ($subIds2) AND is_onsale=1 AND is_examine=1 AND is_best=1  AND is_hot=1")->order('pro_order DESC,pro_id DESC')->limit(5)->select();
		//今日上新
		$assign['proRows2']=$proModel->join('if43_category ON if43_pro.cat_id=if43_category.cat_id')
		->where("if43_pro.cat_id in ($subIds2) AND is_onsale=1 AND is_examine=1 AND is_new=1")->order('pro_order DESC,pro_id DESC')->limit(10)->select();
		//小编精选鞋子推荐
		$assign['proRows3']=$proModel->join('if43_category ON if43_pro.cat_id=if43_category.cat_id')
		->where("if43_pro.cat_id in ($subIds2) AND is_onsale=1 AND is_examine=1 AND is_best=1")->order('pro_order DESC,pro_id DESC')->limit(5)->select();
		/**********精品调用*********/ 
		
		//***********显示精品列表**********//
		//排序$topwhere条件生成
		//$top = isset ( $_GET ['top'] ) ? $_GET ['top'] : 'all';
		$top = I('get.top','all');
		$assign['top']=$top;
		if($top=='hot'){
			$topwhere="AND if43_pro.is_hot=1";
		}elseif ($top=='new'){
			$topwhere="AND if43_pro.is_new=1";
		}else{
			$topwhere='';
		}
		
		//风格$fgwhere条件生成
		$fg = I('get.fg','all');
		$assign['fg']=$fg;
		if($fg!='all'){
			$fgwhere="AND if43_pro_attr.attr_value='{$fg}'";
		}else{
			$fgwhere='';
		}
		
		//流行元素$fashionwhere条件生成
		$fashion = I('get.fashion','all');
		$assign['fashion']=$fashion;
		if($fashion!='all'){
			$fashionwhere="AND if43_pro_attr.attr_value='{$fashion}'";
		}else{
			$fashionwhere='';
		}
		
		//适用场景$cj条件生成
		$cj = I('get.cj','all');
		$assign['cj']=$cj;
		if($cj!='all'){
			$cjwhere="AND if43_pro_attr.attr_value='{$cj}'";
		}else{
			$cjwhere='';
		}
		
		//排序$priceTop条件生成
		//$priceTop = !empty( $_GET ['priceTop'] ) ? $_GET ['priceTop'] : 'all';
		//$minPrice = !empty( $_GET ['minPrice'] ) ? $_GET ['minPrice'] : '';
		//$maxPrice = !empty( $_GET ['maxPrice'] ) ? $_GET ['maxPrice'] : '';
		$priceTop = I('get.priceTop','all');
		$minPrice = I('get.minPrice','');
		$maxPrice = I('get.maxPrice','');
		$assign['priceTop']=$priceTop;
		$assign['minPrice']=$minPrice;
		$assign['maxPrice']=$maxPrice;
		if($priceTop=='100'){
			$priceTopsql="AND if43_pro.pro_price<100";
		}elseif ($priceTop=='200'){
			$priceTopsql="AND if43_pro.pro_price<200";
		}elseif ($priceTop=='300'){
			$priceTopsql="AND if43_pro.pro_price<300";
		}elseif ($priceTop=='300x'){
			$priceTopsql="AND if43_pro.pro_price>300";
		}elseif($minPrice!='' && $maxPrice!=''){
			$priceTopsql="AND if43_pro.pro_price>$minPrice AND if43_pro.pro_price<$maxPrice";
		}
		else{
			$priceTopsql='';
		}
		//排序筛选
		if($priceTop!=''){
			$order='if43_pro.pro_price desc,if43_pro.pro_order desc,if43_pro.pro_id desc';
		}elseif($priceTop=='all' && $top=='new'){
			$order='if43_pro.add_time desc,if43_pro.pro_order desc,if43_pro.pro_id desc';
		}
		else{
			$order='if43_pro.pro_order desc,if43_pro.pro_id desc';
		}
		$proModel=M('pro');
		$pagesize = 15;
		$total = $proModel->join('if43_pro_attr ON if43_pro.pro_id=if43_pro_attr.pro_id')->group('if43_pro.pro_id')->where("if43_pro.cat_id in ($subIds) AND is_onsale=1 AND is_examine=1 $topwhere $fgwhere $fashionwhere $cjwhere $priceTopsql")->count();
		$opage = new \Think\Page($total, $pagesize);
		$opage->setConfig('header', '<p>共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页</p>');
		$opage->setConfig('prev', '上一页');
		$opage->setConfig('first', '首页');
		$opage->setConfig('last',   '尾页');
		$opage->setConfig('next', '下一页');
		$opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
		$assign['spage'] = $opage->show();
		$assign['proList'] = $proModel->join('if43_pro_attr ON if43_pro.pro_id=if43_pro_attr.pro_id')->group('if43_pro.pro_id')->where("if43_pro.cat_id in ($subIds) AND is_onsale=1 AND is_examine=1 $topwhere $fgwhere $fashionwhere $cjwhere $priceTopsql") -> order($order) -> limit($opage->firstRow.','.$opage->listRows)->select();
		/***********精品列表*************/
		/*****评价调用*****/
		$commentModel = M('comment');
		$assign['commentRows']=$commentModel->join('if43_member ON if43_comment.uid=if43_member.id')
		->field('if43_comment.pro_id,if43_comment.content,if43_member.img180x180,if43_member.username')
		->where('if43_comment.pid=0 AND if43_comment.is_show=1')->select();
		/*****评价调用*****/
		
		//var_dump($assign['proList']);exit;
		$this->assign($assign);
		$this->display();
		
    }
    
    //鞋子列表首页
    public function prolist() {
    	
    	//广告
    	$advModel=M('adv');
    	$assign['newPic']=$advModel->where('type_id=12 and is_show=1')->order('advorder DESC')->limit(1)->find();//鞋子列表页_精选主题推荐1张
    	$assign['catBg']=$advModel->where('type_id=13 and is_show=1')->order('advorder DESC')->limit(1)->find();//鞋子列表页_分类背景1张
    	
    	/**************分类**********/
    	$catModel=M('category');
    	$attrModel=M('attribute');
    	$categoryModel = new \Model\CategoryModel();
    	
    	//当前类相关操作
		$cat_id = I('get.cat_id',2);//如果cat_id不存在~返回鞋子的cat_id=2
    	$assign['nowCatName']=$catModel->find($cat_id);//当前类的相关信息
    	$assign['cat_id']=$cat_id;//装入显示数组数组中
    	$subIds = $categoryModel->getSubIds($cat_id);//获当前类的所有子类
    	$subIds=implode(',', $subIds);
    	
    	//鞋子推荐
    	$subIds2 = $categoryModel->getSubIds(2);//获取子类
    	$subIds2=implode(',', $subIds2);
    	$assign['tj1']=$catModel->where("cat_id in ($subIds2) AND is_tj=1 AND is_show=1")->order('sort_order desc')->limit(8)->select();
    	
    	/****子分类调用****/
    	//鞋子————款式、元素、潮流风格、适用场景
		$assign['subCat1']=$catModel->where("parent_id=47 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(14)->select();
		$assign['subCat2']=$catModel->where("parent_id=48 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(7)->select();
		$attr_value=$attrModel->where("attr_id=19")->find();
		$assign['subCat3']=explode(PHP_EOL, $attr_value['attr_value']);
		$attr_value=$attrModel->where("attr_id=4")->find();
		$assign['subCat4']=explode(PHP_EOL, $attr_value['attr_value']);
    	/**************分类**********/
    	
    	//***********显示精品列表**********//
		//排序$topwhere条件生成
		//$top = isset ( $_GET ['top'] ) ? $_GET ['top'] : 'all';
		$top = I('get.top','all');
		$assign['top']=$top;
		if($top=='hot'){
			$topwhere="AND if43_pro.is_hot=1";
		}elseif ($top=='new'){
			$topwhere="AND if43_pro.is_new=1";
		}else{
			$topwhere='';
		}
		
		//风格$fgwhere条件生成
		$fg = I('get.fg','all');
		$assign['fg']=$fg;
		if($fg!='all'){
			$fgwhere="AND if43_pro_attr.attr_value='{$fg}'";
		}else{
			$fgwhere='';
		}
		
		$priceTop = I('get.priceTop','all');
		$minPrice = I('get.minPrice','');
		$maxPrice = I('get.maxPrice','');
		$assign['priceTop']=$priceTop;
		$assign['minPrice']=$minPrice;
		$assign['maxPrice']=$maxPrice;
		if($priceTop=='100'){
			$priceTopsql="AND if43_pro.pro_price<100";
		}elseif ($priceTop=='200'){
			$priceTopsql="AND if43_pro.pro_price<200";
		}elseif ($priceTop=='300'){
			$priceTopsql="AND if43_pro.pro_price<300";
		}elseif ($priceTop=='300x'){
			$priceTopsql="AND if43_pro.pro_price>300";
		}elseif($minPrice!='' && $maxPrice!=''){
			$priceTopsql="AND if43_pro.pro_price>$minPrice AND if43_pro.pro_price<$maxPrice";
		}
		else{
			$priceTopsql='';
		}
		//排序筛选
		if($priceTop!=''){
			$order='if43_pro.pro_price desc,if43_pro.pro_order desc,if43_pro.pro_id desc';
		}elseif($priceTop=='all' && $top=='new'){
			$order='if43_pro.add_time desc,if43_pro.pro_order desc,if43_pro.pro_id desc';
		}
		else{
			$order='if43_pro.pro_order desc,if43_pro.pro_id desc';
		}
		$proModel=M('pro');
		$pagesize = 15;
		$total = $proModel->join('if43_pro_attr ON if43_pro.pro_id=if43_pro_attr.pro_id')->group('if43_pro.pro_id')->where("if43_pro.cat_id in ($subIds) AND is_onsale=1 AND is_examine=1 $topwhere $fgwhere $priceTopsql")->count();
		$opage = new \Think\Page($total, $pagesize);
		$opage->setConfig('header', '<p>共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页</p>');
		$opage->setConfig('prev', '上一页');
		$opage->setConfig('first', '首页');
		$opage->setConfig('last',   '尾页');
		$opage->setConfig('next', '下一页');
		$opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
		$assign['spage'] = $opage->show();
		$assign['proList'] = $proModel->join('if43_pro_attr ON if43_pro.pro_id=if43_pro_attr.pro_id')->group('if43_pro.pro_id')->where("if43_pro.cat_id in ($subIds) AND is_onsale=1 AND is_examine=1 $topwhere $fgwhere $priceTopsql") -> order($order) -> limit($opage->firstRow.','.$opage->listRows)->select();
		/***********精品列表*************/
		/*****评价调用*****/
		$commentModel = M('comment');
		$assign['commentRows']=$commentModel->join('if43_member ON if43_comment.uid=if43_member.id')
		->field('if43_comment.pro_id,if43_comment.content,if43_member.img180x180,if43_member.username')
		->where('if43_comment.pid=0 AND if43_comment.is_show=1')->select();
		/*****评价调用*****/
    	
    	$this->assign($assign);
    	$this->display();
    	
    }
    
}