<?php
//精品类型控制器
namespace Admin\Controller;
class TypeController extends CommonController{
	
	public  function index(){
		$list=M('pro_type')->select();
		$this->assign('list',$list);
		$this->display();
		
	}
	
	//添加分类
	public function add(){
		
		if(IS_POST){
			$model=M('pro_type');
    		$data=$model->create();
    		if($model->add($data)){
    			$this -> success('添加成功！',U('Type/index'));
    		}
    		else{
    			$this -> error('添加失败！');
    		}
			
		}else{
			$this->display();
		}
		
	}
	
	//修改分类
	public function edit($type_id){
	
		if(IS_POST){
			$model=M('pro_type');
			$data=$model->create();
			$data['type_id']=$type_id;
			if($model->save($data)){
				$this -> success('修改成功！',U('Type/index'));
			}
			else{
				$this -> error('修改失败！');
			}
		}else{
			$row=M('pro_type')->find($type_id);
			$this->assign("row",$row);
			$this->display();
		}
	
	}	
	
	//删除分类
	public function delete($type_id){
		if(M('pro_type')->delete($type_id)){
			$this -> success('删除成功！',U('Type/index'));
		}
		else{
			$this -> error('删除失败！');
		}
			
	}
	
}