<?php
namespace Home\Controller;
class IndexController extends BaseController {
	
    public function index(){

    	//广告
		$advModel=M('adv');
		$assign['banner']=$advModel->where('type_id=1 and is_show=1')->order('advorder DESC')->limit(4)->select();//首页顶部Banner广告四张
		$assign['focus']=$advModel->where('type_id=2 and is_show=1')->order('advorder DESC')->limit(3)->select();//首页广告幻灯三张
		$assign['newPic']=$advModel->where('type_id=4 and is_show=1')->order('advorder DESC')->limit(1)->find();//首页今日新品广告一张
		$assign['catBanner']=$advModel->where('type_id=5 and is_show=1')->order('advorder DESC')->limit(4)->select();//首页左侧分类导航4张
		
		/**************分类**********/
		$catModel=M('category');
		$attrModel=M('attribute');
		$categoryModel = new \Model\CategoryModel();
		//衣服推荐
		$subIds = $categoryModel->getSubIds(1);//获取衣服子类
		$subIds=implode(',', $subIds);
		$assign['tj1']=$catModel->where("cat_id in ($subIds) AND is_tj=1 AND is_show=1")->order('sort_order desc')->limit(8)->select();
		//鞋子推荐
		$subIds2 = $categoryModel->getSubIds(2);//获取鞋子 子类
		$subIds2=implode(',', $subIds2);
		$assign['tj2']=$catModel->where("cat_id in ($subIds2) AND is_tj=1 AND is_show=1")->order('sort_order desc')->limit(8)->select();
		//包包推荐
		$subIds3 = $categoryModel->getSubIds(3);//获取包包子类
		$subIds3=implode(',', $subIds3);
		$assign['tj3']=$catModel->where("cat_id in ($subIds3) AND is_tj=1 AND is_show=1")->order('sort_order desc')->limit(8)->select();
		//配饰推荐
		$subIds4 = $categoryModel->getSubIds(4);//获取配饰子类
		$subIds4=implode(',', $subIds4);
		$assign['tj4']=$catModel->where("cat_id in ($subIds4) AND is_tj=1 AND is_show=1")->order('sort_order desc')->limit(10)->select();
		/****子分类调用****/
		//衣服————上衣TOPS分类、裤子TROUSERS、裙子DRESSES分类、潮流风格
		$assign['subCat1']=$catModel->where("parent_id=5 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$assign['subCat2']=$catModel->where("parent_id=6 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$assign['subCat3']=$catModel->where("parent_id=7 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$attr_value=$attrModel->where("attr_id=2")->find();
		$assign['subCat13']=explode(PHP_EOL, $attr_value['attr_value']);
		
		//鞋子————款式STYLE 、元素ELEMENT、潮流风格FASHION分类、适用场景
		$assign['subCat4']=$catModel->where("parent_id=47 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$assign['subCat5']=$catModel->where("parent_id=48 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(13)->select();
		$attr_value=$attrModel->where("attr_id=19")->find();
		$assign['subCat6']=explode(PHP_EOL, $attr_value['attr_value']);
		$attr_value=$attrModel->where("attr_id=4")->find();
		$assign['subCat14']=explode(PHP_EOL, $attr_value['attr_value']);
		
		//包包————款式STYLE 、流行TREND、材质MATERIAL、潮流风格
		$assign['subCat7']=$catModel->where("parent_id=86 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(13)->select();
		$assign['subCat8']=$catModel->where("parent_id=88 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$attr_value=$attrModel->where("attr_id=9")->find();
		$assign['subCat9']=explode(PHP_EOL, $attr_value['attr_value']);
		$attr_value=$attrModel->where("attr_id=8")->find();
		$assign['subCat15']=explode(PHP_EOL, $attr_value['attr_value']);
		
		//包包————首饰JEWELRY、装扮DRESS UP、材质MATERIAL、潮流风格
		$assign['subCat10']=$catModel->where("parent_id=128 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(13)->select();
		$assign['subCat11']=$catModel->where("parent_id=129 AND is_show=1")->order('sort_order desc,cat_id ASC')->limit(12)->select();
		$attr_value=$attrModel->where("attr_id=13")->find();
		$assign['subCat12']=explode(PHP_EOL, $attr_value['attr_value']);
		$attr_value=$attrModel->where("attr_id=12")->find();
		$assign['subCat16']=explode(PHP_EOL, $attr_value['attr_value']);
		
		/**************分类**********/
		/**********精品调用*********/
		$proModel=M('pro');
		//衣服
		$assign['proRows1']=$proModel->join('if43_category ON if43_pro.cat_id=if43_category.cat_id')
		->where("if43_pro.cat_id in ($subIds) AND is_onsale=1 AND is_examine=1")->order('pro_order DESC,pro_id DESC')->limit(11)->select();
		//鞋子
		$assign['proRows2']=$proModel->join('if43_category ON if43_pro.cat_id=if43_category.cat_id')
		->where("if43_pro.cat_id in ($subIds2) AND is_onsale=1 AND is_examine=1")->order('pro_order DESC,pro_id DESC')->limit(11)->select();
		//包包
		$assign['proRows3']=$proModel->join('if43_category ON if43_pro.cat_id=if43_category.cat_id')
		->where("if43_pro.cat_id in ($subIds3) AND is_onsale=1 AND is_examine=1")->order('pro_order DESC,pro_id DESC')->limit(11)->select();
		//配饰
		$assign['proRows4']=$proModel->join('if43_category ON if43_pro.cat_id=if43_category.cat_id')
		->where("if43_pro.cat_id in ($subIds4) AND is_onsale=1 AND is_examine=1")->order('pro_order DESC,pro_id DESC')->limit(11)->select();
		/**********精品调用*********/ 
		
		$this->assign($assign);
		$this->display();
		
    }
    
}