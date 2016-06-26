<?php
//广告类型控制器
namespace Admin\Controller;
class AdvTypeController extends CommonController{
	
	//广告类型列表
	public  function index(){
		
		$list=M('adv_type')->order('type_id ASC')->select();
		$this->assign('list',$list);
		$this->display();
		
	}
	
	//添加广告类型
	public function add(){
		
		if(IS_POST){
			$model=M('adv_type');
    		$data=$model->create();
    		if($model->add($data)){
    			$this -> success('添加成功！',U('AdvType/index'));
    		}
    		else{
    			$this -> error('添加失败！');
    		}
			
		}else{
			$this->display();
		}
		
	}
	
	//修改广告类型
	public function edit($type_id){
	
		if(IS_POST){
			$model=M('adv_type');
			$data=$model->create();
			$data['type_id']=$type_id;
			if($model->save($data)){
				$this -> success('修改成功！',U('AdvType/index'));
			}
			else{
				$this -> error('修改失败！');
			}
		}else{
			$row=M('adv_type')->find($type_id);
			$this->assign("row",$row);
			$this->display();
		}
	
	}	
	
	//删除广告类型
	public function delete($type_id){
		if(M('adv_type')->delete($type_id)){
			$this -> success('删除成功！',U('AdvType/index'));
		}
		else{
			$this -> error('删除失败！');
		}
			
	}
	
}