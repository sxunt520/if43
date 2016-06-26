<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
	
	//任何继承该类的类都会自动执行的方法
	protected function _initialize(){
		
		$this->_topPro();
		
	}
	
	//头部公共推荐精品
	private function _topPro(){
		
		$categoryModel = new \Model\CategoryModel();
		$proModel=M('pro');
		//All
		$topPro0=$proModel->where("is_onsale=1 AND is_examine=1 AND is_best=1  AND is_hot=1 AND is_new=1")->order('add_time DESC')->limit(4)->select();
		//衣服
		$subIds = $categoryModel->getSubIds(1);//获取衣服子类
		$subIds=implode(',', $subIds);
		$topPro1=$proModel->where("cat_id in ($subIds) AND is_onsale=1 AND is_examine=1 AND is_best=1  AND is_hot=1")->order('pro_order DESC,pro_id DESC')->limit(4)->select();
		//鞋子
		$subIds2 = $categoryModel->getSubIds(2);//获取鞋子 子类
		$subIds2=implode(',', $subIds2);
		$topPro2=$proModel->where("cat_id in ($subIds2) AND is_onsale=1 AND is_examine=1 AND is_best=1  AND is_hot=1")->order('pro_order DESC,pro_id DESC')->limit(4)->select();
		//包包
		$subIds3 = $categoryModel->getSubIds(3);//获取包包子类
		$subIds3=implode(',', $subIds3);
		$topPro3=$proModel->where("cat_id in ($subIds3) AND is_onsale=1 AND is_examine=1 AND is_best=1  AND is_hot=1")->order('pro_order DESC,pro_id DESC')->limit(4)->select();
		//配饰
		$subIds4 = $categoryModel->getSubIds(4);//获取配饰子类
		$subIds4=implode(',', $subIds4);
		$topPro4=$proModel->where("cat_id in ($subIds4) AND is_onsale=1 AND is_examine=1 AND is_best=1  AND is_hot=1")->order('pro_order DESC,pro_id DESC')->limit(4)->select();
		$this->assign('topPro0',$topPro0);
		$this->assign('topPro1',$topPro1);
		$this->assign('topPro2',$topPro2);
		$this->assign('topPro3',$topPro3);
		$this->assign('topPro4',$topPro4);
		
	}
	
}