<?php
//精品属性控制器
namespace Admin\Controller;
use Model\AttributeModel;
class AttributeController extends CommonController{
	
	public  function index($type_id){
		
		//获取所有类型
		$types=M('pro_type')->select();
		$this->assign('types',$types);
		$this->assign('type_id',$type_id);
		//获取所属类型信息
		
		//获取所有的权限
		$attribute=M('attribute');
		$pagesize = 10;
		if($type_id!=0){
			$w['type_id']=array('eq',$type_id);
			$total = $attribute->where($w)-> count();
			$opage = new \Think\Page($total, $pagesize);
			// 修改分页样式
			$opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
			$opage->setConfig('prev', '上一页');
			$opage->setConfig('first', '首页');
			$opage->setConfig('last',   '尾页');
			$opage->setConfig('next', '下一页');
			$opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
			$spage = $opage->show();
			//$list = $attribute ->where("type_id=$type_id") ->order('attr_id desc')->limit($opage->firstRow.','.$opage->listRows)->select();
			$sql="select a.*,b.type_name from if43_attribute as a
			inner join if43_pro_type as b
			on a.type_id = b.type_id
			WHERE a.type_id = $type_id order by attr_id desc limit $opage->firstRow,$opage->listRows";
			$list = $attribute ->query($sql);
		}
		else{
			$total = $attribute-> count();
			$opage = new \Think\Page($total, $pagesize);
			// 修改分页样式
			$opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
			$opage->setConfig('prev', '上一页');
			$opage->setConfig('first', '首页');
			$opage->setConfig('last',   '尾页');
			$opage->setConfig('next', '下一页');
			$opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
			$spage = $opage->show();
			//$list = $attribute -> order('attr_id desc')-> limit($opage->firstRow.','.$opage->listRows)->select();
			$sql="select a.*,b.type_name from if43_attribute as a
			inner join if43_pro_type as b
			on a.type_id = b.type_id
			order by attr_id desc limit $opage->firstRow,$opage->listRows";
			$list = $attribute ->query($sql);
		}
		$this->assign('list',$list);
		$this->assign('spage',$spage);
		$this->display();
		
	}
	
	//添加属性
	public function add($type_id){
		
		if(IS_POST){
			$model=M('attribute');
    		$data=$model->create();
    		if($model->add($data)){
    			$this -> success('添加成功！',U("Admin/Attribute/index/type_id/$type_id"));
    		}
    		else{
    			$this -> error('添加失败！');
    		}
			
		}else{
			//获取所有类型
			$types=M('pro_type')->select();
			$this->assign('types',$types);
			$this->assign('type_id',$type_id);
			$this->display();
		}
		
	}
	
	//修改属性
	public function edit($attr_id){
	
		if(IS_POST){
			$model=M('attribute');
			$data=$model->create();
			$data['attr_id']=$attr_id;
			//获取跳到的类别id
			$row=M('attribute')->find($attr_id);
			$type_id=$row['type_id'];
			if($model->save($data)){
				$this -> success('修改成功！',U("Admin/Attribute/index/type_id/$type_id"));
			}
			else{
				$this -> error('修改失败！');
			}
		}else{
			//当前这条信息
			$row=M('attribute')->find($attr_id);
			$this->assign("row",$row);
			//获取所有类型
			$types=M('pro_type')->select();
			$this->assign('types',$types);
			$this->display();
		}
	
	}	
	
	//删除属性
	public function delete($attr_id){
		//获取跳到的类别id
		$row=M('attribute')->find($attr_id);
		$type_id=$row['type_id'];
		if(M('attribute')->delete($attr_id)){
			$this -> success('删除成功！',U("Admin/Attribute/index/type_id/$type_id"));
		}
		else{
			$this -> error('删除失败！');
		}
			
	}
	
	
	//批删除属性
	public function deleteall(){
		$post = $_POST;
		$ids = implode(',', $post['attr_id']);
		$Model = M('attribute');
		$map['attr_id'] = array('in',$ids);
		switch ($post['action']) {
			case '删除':
				if ($Model -> where($map)->delete()) {
					$this -> success('删除成功！');
				}else{
					$this -> error('删除失败！');
				}
				break;
	
		}
	}
	
	//Ajax获取指定类型下的属性
	public function getAttrs(){
		//获取type_id
		$type_id = $_GET['type_id'];
		if(!empty($type_id)){
			//调用模型，获得属性并构成表单
			$attrModel = new AttributeModel();
			$attrs = $attrModel->getAttrsForm($type_id);
			echo $attrs;
		}else{
			echo '请先选择精品类型！^_^';
		}
		
	}
	
	//Ajax获取指定类型下需要修改的属性
	public function editAttrs(){
		
		$type_id = $_GET['type_id'];
		$pro_id = $_GET['pro_id'];
		if(!empty($type_id)){
			//调用模型，获得属性并构成表单
			$attrModel = new AttributeModel();
			$attrs = $attrModel->editAttrsForm($type_id,$pro_id);
			echo $attrs;
		}else{
			echo '请先选择精品类型！^_^';
		}
	
	}
	
}