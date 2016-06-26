<?php
//分类控制器
namespace Admin\Controller;
use Model\CategoryModel;
class CategoryController extends CommonController{
	
	public  function index(){
		
		//获取所有的排序好的分类
		$categoryModel = new CategoryModel(); 
		$cats = $categoryModel->getCats();
		$this->assign("cats",$cats);
		$this->display();
		
	}
	
	//添加分类
	public function add(){
		
		if(IS_POST){
			
			$model=M('category');
    		$data=$model->create();
    		if($model->add($data)){
    			$this -> success('添加成功！',U('Category/index'));
    		}
    		else{
    			$this -> error('添加失败！');
    		}
			
		}else{
			//获取所有的排序好的分类
			$categoryModel = new CategoryModel();
			$cats = $categoryModel->getCats();
			$this->assign("cats",$cats);
			$this->display();
		}
		
	}
	
	//修改分类
	public function edit($cat_id){
	
		if(IS_POST){
			$model=M('category');
			$data=$model->create();
			$data['cat_id']=$cat_id;
			if($model->save($data)){
				$this -> success('修改成功！',U('Category/index'));
			}
			else{
				$this -> error('修改失败！');
			}
				
		}else{
			//获取所有的排序好的分类
			$categoryModel = new CategoryModel();
			$cats = $categoryModel->getCats();
			//获取单条数据
			$row=M('category')->find($cat_id);
			//获取不能修改的类别
			$subIds = $categoryModel->getSubIds($cat_id);
			
			//ajax选择类别
// 			$catgoods = M('category');
// 			$type = $catgoods -> where("parent_id=0") -> select();
// 			$this ->assign('data' , $type);
			
			$this->assign("cats",$cats);
			$this->assign("row",$row);
			$this->assign("subIds",$subIds);
			$this->display();
		}
	
	}	
	
	//删除分类
	public function delete($cat_id){
		if(M('category')->delete($cat_id)){
			$this -> success('删除成功！',U('category/index'));
		}
		else{
			$this -> error('删除失败！');
		}
			
	}
	
	//ajax商品类别查询
	public function sel(){
		$pid = $_GET['id'];
		$data = M('category');
		$list = $data -> where('parent_id='.$pid) -> select();
		for($i = 0;$i<count($list); $i++){
			$string .= "<option value='".$list[$i]['cat_id']."'>".$list[$i]['cat_name']."</option>";
		}
		echo $string;
	}
	
	//批量更新分类排序
	public function updateAll(){
		
		if ($_POST['action']=='更新排序'){
			$cat_ids=I("post.cat_ids");
			$sort_orders=I("post.sort_orders");
			$model=M("category");
			foreach ($cat_ids as $key =>$value){
				$data['sort_order'] = $sort_orders["$key"];
				$data['cat_id'] = $value;
				$model->save($data);
			}
			$this -> success('更新完毕！');
		}
		else{
				
			$this -> error('更新失败');
				
		}
		
	}
	
}