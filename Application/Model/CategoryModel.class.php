<?php
//精品品分类模型
namespace Model;
use Think\Model;
class CategoryModel extends Model {
	private $res2 = array();
	private $res3 = array();
	
	//获取所有的商品分类
	public function getCats(){
		$cats = M('category')->order('sort_order DESC')->select();
		return $this->tree($cats);
	}

	//定义一个方法，实现递归排序
	public function tree($arr,$pid = 0,$level = 0) {
		static $res = array();
		foreach ($arr as $v) {
			if ($v['parent_id'] == $pid) {
				//说明找到，保存
				$v['level'] = $level; //将level层级数保存到当前分类中
				$res[] = $v;
				//继续查找，变换条件
				$this->tree($arr,$v['cat_id'],$level+1);
			}
		}
		return $res;
	}
	
	//给定一个分类cat_id,找其所有后代分类的cat_id,并且将当前的cat_id追加到数组中
	public function getSubIds($cat_id){
		$this->res2 = array();
		$cats = M('category')->select();
		$cats = $this->subTree($cats,$cat_id); //二维的完整的信息
		//我们只需要cat_id
		$res = array();
		foreach ($cats as $v) {
			$res[] = $v['cat_id'];
		}
		//并且将当前的cat_id追加到数组中
		$res[] = $cat_id;
		return $res;
	}
	
	//定义一个方法，实现子类递归排序
	public function subTree($arr,$pid = 0,$level = 0) {
		foreach ($arr as $v) {
			if ($v['parent_id'] == $pid) {
				//说明找到，保存
				$v['level'] = $level; //将level层级数保存到当前分类中
				$this->res2[] = $v;
				//继续查找，变换条件
				$this->subTree($arr,$v['cat_id'],$level+1);
			}
		}
		return $this->res2;
	}
	
/********************前台分类**************************/	
	//获取分类，并调用childList方法
	public function frontCats(){
		$sql = "SELECT * FROM {$this->table}";
		$cats = M('category')->select();
		return $this->childList($cats);
	}
	
	//获取衣服分类
	public function yfCats(){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		return $this->childList($cats,2);
	}
	
	//获取鞋子分类
	public function shoeCats(){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		return $this->childList($cats,3);
	}
	
	//获取包包子分类
	public function bagCats(){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		return $this->childList($cats,4);
	}
	
	//获取配饰子分类
	public function accCats(){
		$sql = "SELECT * FROM {$this->table}";
		$cats = $this->db->getAll($sql);
		return $this->childList($cats,5);
	}
	
	//递归数组，形成一个嵌套结构的多维数组
	public function childList($arr,$pid = 0){
		$res = array();
		foreach ($arr as $v) {
			if ($v['parent_id'] == $pid) {
				//找到子分类,接着继续找当前分类的后代分类
				// $subCats = $this->childList($arr,$v['cat_id']);
				//将找到的结果作为当前分类的child元素，保存起来
				// $v['child'] = $subCats;
				$v['child'] = $this->childList($arr,$v['cat_id']);
				$res[] = $v;
			}
		}
		return $res;
	}
	
	
	//给定一个分类cat_id,找其所有父级分类的cat_id,并且将当前的cat_id追加到数组中
	public function getParentIds($cat_id){
		$this->res3 = array();
		$cats = M('category')->select();
		$cats = $this->fuTree($cats,$cat_id); //二维的完整的信息
		$res = array();
		foreach ($cats as $v) {
			$res[] = $v['cat_id'];
		}
		return $res;
	}
	
	//定义一个方法，实现父类递归排序
	public function fuTree($arr,$cat_id) {
		foreach ($arr as $v) {
			if ($v['cat_id'] == $cat_id) {
				$this->res3[] = $v;
				$this->fuTree($arr,$v['parent_id'],$level+1);
			}
		}
		return $this->res3;
	}
	

}