<?php
namespace Admin\Controller;
class AuthController extends CommonController {
    // 进入权限组列表页
    public function index(){
        $auth_group = M('auth_group');
        $data = $auth_group ->order('id asc')->select();
        $this -> assign('list',$data);
        $this -> display();
    }
    
    //添加权限角色
    public function addRole(){
    		
    	if(IS_POST){
    		$model=M('auth_group');
    		$data=$model->create();
    		$data['rules'] = implode(',', $data['rules']);
    		if($model->add($data)){
    			$this -> success('添加成功！',U('Auth/index'));
    		}
    		else{
    			$this -> error('添加失败！');
    		}
    		 
    	}
    	else{
    		//获取所有的权限
    		$auth_rule=M('auth_rule');
    		$ruleAll=$auth_rule->select();
    		$this->assign('ruleAll',$ruleAll);
    		$this->display();
    	}
    }

    //修改权限角色 
    public function modauth(){
        $id = I('GET.id',false,int);
        $auth_group = M('auth_group');
        $map['id'] = $id;
        $data = $auth_group ->where($map) ->find();
        $rules=explode(',', $data['rules']);
        
        //获取所有的权限
        $auth_rule=M('auth_rule');
        $ruleAll=$auth_rule->select();
        	
        $this -> assign('data',$data);
        $this -> assign('rules',$rules);
        $this -> assign('ruleAll',$ruleAll);
        $this -> assign('id',$id);
        $this -> display();
    }

    // 更新权限角色到数据库
    public function saveauth(){
        $get = I('get.id');
        $post=I('post.');
        $post['rules'] = implode(',', $post['rules']);
        $auth_group = M('auth_group');
        $map['id'] = $get;
        if($auth_group -> create($post)){

            if ($auth_group -> where($map) -> save($post)) {
                $this -> success('修改成功！',U('index'));
            }else{
                $this -> error('修改失败！');
            }   
        }else{
            $this -> error('修改失败！');
        }
    }

    // 进入修改组权限页
    public function mod(){
        $auth_group = M('auth_group');
        $data = $auth_group ->select();
        $this -> assign('auth_group',$data);
        $this -> display();
    }
    
    //权限列表页
    public function authList(){
        //获取所有的权限
        $auth_rule=M('auth_rule');
        $pagesize = 15;
        $total = $auth_rule -> count();
        $opage = new \Think\Page($total, $pagesize);
        // 修改分页样式
        $opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
        $opage->setConfig('prev', '上一页');
        $opage->setConfig('first', '首页');
        $opage->setConfig('last',   '尾页');
        $opage->setConfig('next', '下一页');
        $opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
        $spage = $opage->show();
        $ruleAll = $auth_rule -> order('name asc') -> limit($opage->firstRow.','.$opage->listRows)->select();
        $this -> assign('spage',$spage);
        $this -> assign('ruleAll',$ruleAll);
        $this -> display();
    }
    
    //添加权限
    public function add(){
    	
    	if(IS_POST){
    		$model=M('auth_rule');
    		$data=$model->create();
    		if($model->add($data)){
    			$this -> success('添加成功！',U('Auth/authList'));
    		}
    		else{
    			$this -> error('添加失败！');
    		}
    		
    	}
    	else{
    	$this->display();
    	}
    }
    
    //修改权限
    public function authEdit($id){
    	if(IS_POST){
    		$model=M('auth_rule');
    		$data=$model->create();
    		$data['id']=$id;
    		if($model->save($data)){
    			$this -> success('修改成功！',U('Auth/authList'));
    		}
    		else{
    			$this -> error('修改失败！');
    		}
    
    	}
    	else{
    		$model=M('auth_rule');
    		$row=$model->find($id);
    		$this->assign('row',$row);
    		$this->display();
    	}
    }
    
    //删除权限
    public function delete($id){

    		if(M('auth_rule')->delete($id)){
    			$this -> success('删除成功！',U('Auth/authList'));
    		}
    		else{
    			$this -> error('删除失败！');
    		}
		
  	}
    
  	//删除角色权限
  	public function deleteRole($id){
  		
  		if(M('auth_group')->delete($id)){
  			$this -> success('删除成功！',U('Auth/index'));
  		}
  		else{
  			$this -> error('删除失败！');
  		}
  		 
  	}
  	
}