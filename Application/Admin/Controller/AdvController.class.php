<?php
//广告控制器
namespace Admin\Controller;
class AdvController extends CommonController{
	
	public  function index($type_id){
		
		//获取所有类型
		$types=M('adv_type')->order('type_id ASC')->select();
		$this->assign('types',$types);
		$this->assign('type_id',$type_id);
		
		//获取所有的广告
		$Model=M('adv');
		$pagesize = 10;
		if($type_id!=0){
			$w['type_id']=array('eq',$type_id);
			$total = $Model->where($w)-> count();
			$opage = new \Think\Page($total, $pagesize);
			// 修改分页样式
			$opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
			$opage->setConfig('prev', '上一页');
			$opage->setConfig('first', '首页');
			$opage->setConfig('last',   '尾页');
			$opage->setConfig('next', '下一页');
			$opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
			$spage = $opage->show();
			$list = $Model ->join('if43_adv_type ON if43_adv.type_id=if43_adv_type.type_id')->where("if43_adv.type_id=".$type_id) ->order('advorder desc')->limit($opage->firstRow.','.$opage->listRows)->select();
		}
		else{
			$total = $Model-> count();
			$opage = new \Think\Page($total, $pagesize);
			// 修改分页样式
			$opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
			$opage->setConfig('prev', '上一页');
			$opage->setConfig('first', '首页');
			$opage->setConfig('last',   '尾页');
			$opage->setConfig('next', '下一页');
			$opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
			$spage = $opage->show();
			$list = $Model ->join('if43_adv_type ON if43_adv.type_id=if43_adv_type.type_id')->order('advorder desc,id desc')->limit($opage->firstRow.','.$opage->listRows)->select();
		}
		$this->assign('list',$list);
		$this->assign('spage',$spage);
		$this->display();
		
	}
	
	//添加广告
	public function add($type_id){
		
		if(IS_POST){
			$model=M('Adv');
    		$data=$model->create();
    		
    		if(!empty($_FILES['advimg']['name']))
    		{
    			$config=array(
    					'rootPath'      =>  './Public/uploads/',
    					'maxSize'    =>    3145728,
    					'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
    			);
    			$upload=new \Think\Upload($config);
    			$info=$upload->uploadOne($_FILES['advimg']);
    			if(!$info) {// 上传错误提示错误信息
    				$this->error($upload->getError());
    			}
    				else{// 上传成功 获取上传文件信息
    					$data['advimg']=$info['savepath'].$info['savename'];
    				}
    					
    		}
	    		else{
	    			$this->error('^_^~还未上传广告图');
    		}
    		
    		if($model->add($data)){
    			$this -> success('添加成功！',U("admin/Adv/index/type_id/".$type_id));
    		}
    		else{
    			$this -> error('添加失败！');
    		}
			
		}else{
			//获取所有类型
			$Model=M('Adv_type');
			$types=$Model->order('type_id ASC')->select();
			$row=$Model->find($type_id);
			$this->assign('row',$row);
			$this->assign('types',$types);//所有广告类型
			$this->assign('type_id',$type_id);//当前广告类型
			$this->display();
		}
		
	}
	
	//修改广告
	public function edit($id){
	
		if(IS_POST){
			$model=M('adv');
			$data=$model->create();
			$data['id']=$id;
			//获取跳到的类别id
			$row=$model->find($id);
			$type_id=$row['type_id'];
			
			//判断是否修改图片
			if(!empty($_FILES['advimg']['name']))
			{
				$config=array(
						'rootPath'      =>  './Public/uploads/',
						'maxSize'    =>    3145728,
						'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
				);
				$upload=new \Think\Upload($config);
				$info=$upload->uploadOne($_FILES['advimg']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}
				else{// 上传成功 获取上传文件信息
					$data['advimg']=$info['savepath'].$info['savename'];
				}
			}
			
			if($model->save($data)){
				$this -> success('修改成功！',U("Admin/Adv/index/type_id/".$type_id));
			}else{
				$this -> error('修改失败！');
			}
		}else{
			//当前这条信息
			$row=M('adv')->join('if43_adv_type ON if43_adv.type_id=if43_adv_type.type_id ')->where("if43_adv.id=".$id)->find();
			//获取所有类型
			$types=M('adv_type')->order('type_id ASC')->select();
			$this->assign('row',$row);
			$this->assign('types',$types);
			$this->display();
		}
	
	}	
	
	//删除广告
	public function delete($id){
		//获取跳到的类别id
		$Model=M('adv');
		$row=$Model->find($id);
		$type_id=$row['type_id'];
		if($Model->delete($id)){
			$this -> success('删除成功！',U("Admin/Adv/index/type_id/$type_id"));
		}
		else{
			$this -> error('删除失败！');
		}
			
	}
	
	
	//批删除广告
	public function deleteall(){
		$post = $_POST;
		$ids = implode(',', $post['id']);
		$Model = M('adv');
		$map['id'] = array('in',$ids);
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
	
}