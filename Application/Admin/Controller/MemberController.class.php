<?php
//会员管理控制器
namespace Admin\Controller;
class MemberController extends CommonController {
   
	//会员列表
    public function index(){
        $user = M('member');
        $pagesize = 5;
        if(!empty($_GET['keywords'])){
            $keywords = $_GET['keywords'];   
            $where = "username like '%$keywords%' AND id!=0";       
            $total = $user ->where($where)-> count(); 
            $opage = new \Think\Page($total, $pagesize);
            $arr['keywords'] = I('get.keywords');
            $opage->parameter = $arr;
            // 修改分页样式
            $opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
            $opage->setConfig('prev', '上一页');
            $opage->setConfig('first', '首页');
            $opage->setConfig('last', '尾页');
            $opage->setConfig('next', '下一页');
            $opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');  
            $spage = $opage->show();
            $admin = $user ->where($where) -> order('id DESC') -> limit($opage->firstRow.','.$opage->listRows)->select();

        }else{
            $total = $user -> count(); 
            $opage = new \Think\Page($total, $pagesize);
            // 修改分页样式
            $opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
            $opage->setConfig('prev', '上一页');
            $opage->setConfig('first', '首页');
            $opage->setConfig('last',   '尾页');
            $opage->setConfig('next', '下一页');
            $opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
            $spage = $opage->show();
            $admin = $user ->where("id!=0")-> order('id DESC') -> limit($opage->firstRow.','.$opage->listRows)->select();
        }
        
        $this->assign('keywords', $keywords);
        $this->assign('u', $admin);
        $this->assign('spage',$spage);
        $this->display();
    }
	
    //添加会员
    public function add(){
    	
    	if(IS_POST){
    		
	    	$arr['phone'] = I('post.phone');
	        $arr['username'] = I('post.username');
	        $arr['password'] = md5(I('post.password'));
	        $arr['email'] = I('post.email');
	        $arr['sex'] = I('post.sex',0);
	        
	        //个人形像靓照
	        if(!empty($_FILES['person_img']['name']))
	        {
	        	$config=array(
	        			'rootPath'      =>  './Public/uploads/',
	        			'maxSize'    =>    3145728,
	        			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
	        	);
	        	$upload=new \Think\Upload($config);
	        	$info=$upload->uploadOne($_FILES['person_img']);
	        	if(!$info) {// 上传错误提示错误信息
	        		$this->error($upload->getError());
	        	}
	        	else{// 上传成功 获取上传文件信息
	        		$arr['person_img']=$info['savepath'].$info['savename'];
	        	}
	        	////////缩略图
	        	$img=new \Think\Image();
	        	$big_img='./Public/uploads/'.$arr['person_img'];
	        	$img->open($big_img);
	        	//img180x180
	        	$img->open($big_img);
	        	$img->thumb(180,180,3);
	        	$small_img='./Public/uploads/'.$info['savepath'].'img180x180_'.$info['savename'];
	        	$img->save($small_img);
	        	$arr['img180x180']=$info['savepath'].'img180x180_'.$info['savename'];
	        }
	        
	        $model = M('member');
	        if ($model -> create($arr)) {
	            if ($newid=$model -> add()) {
// 	            	 $arr['id']=$newid;
// 	                  session('user',$arr);
	                $this -> success('注册成功！',U('Member/index'));
	            }else{
	                $this -> error('注册失败');
	            }   
	        }
    		
    	}else{

    		$this->display();
    		
    	}
    	
    }
    
    //修改会员资料
    public function edit($id){
    	
    	$user = M('member');
    	if(IS_POST){
    		
    		$data=$user->create();
    		$data['id']=$id;
    		//个人形像靓照
    		if(!empty($_FILES['person_img']['name']))
    		{
    			$config=array(
    					'rootPath'      =>  './Public/uploads/',
    					'maxSize'    =>    3145728,
    					'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
    			);
    			$upload=new \Think\Upload($config);
    			$info=$upload->uploadOne($_FILES['person_img']);
    			if(!$info) {// 上传错误提示错误信息
    				$this->error($upload->getError());
    			}
    			else{// 上传成功 获取上传文件信息
    				$data['person_img']=$info['savepath'].$info['savename'];
    			}
    			////////缩略图
    			$img=new \Think\Image();
    			$big_img='./Public/uploads/'.$data['person_img'];
    			$img->open($big_img);
    			//img180x180
    			$img->open($big_img);
    			$img->thumb(180,180,3);
    			$small_img='./Public/uploads/'.$info['savepath'].'img180x180_'.$info['savename'];
    			$img->save($small_img);
    			$data['img180x180']=$info['savepath'].'img180x180_'.$info['savename'];
    		}
    		if($user->save($data)){
    			$this->success('修改会员资料成功!',U('Member/index'));
    		}else{
				$this->error('修改失败!');   			
    		}
    		
    	}else{

		$row=$user->find($id);
		$this->assign('row',$row);
    	$this->display();
    	
    	}
    	
    }
    
    //修改会员密码
    public function editPwd($id){
    	
    	$Model=M('member');
    	if(IS_POST){
    		$data['password']=md5(I('post.password'));
    		$data['id']=$id;
    		if($Model->save($data)){
    			
    			$this->success('修改密码成功!',U('Member/index'));
    			
    		}else{
    			
    			$this->error('修改失败!');
    			
    		}
    		
    	}else{
    		
    		$row=$Model->find($id);
    		$this->assign('row',$row);
    		$this->display();
    		
    	}
    	 
    }
    
    //删除会员
    public function delete($id){
    	
    	if(M('member')->delete($id)){
    		
    		$this->success('删除成功!',U('Member/index'));
    		
    	}else{
    		
    		$this->error('删除成功!');
    		
    	}
    	
    }
   
    //批量处理会员
    public function deleteall(){
        $post = $_POST;
        $ids = implode(',', $post['id']);
        $admin = M('member');
        $map['id'] = array('in',$ids);
        $map1['is_display'] = 0;
        $map2['is_display'] = 1;
        switch ($post['action']) {
            case '删除':
                if ($admin -> where($map)->delete()) {
                    $this -> success('删除成功！');
                }else{
                    $this -> error('删除失败！');
                }
                break;
            
            case '屏蔽':
                if ($admin -> where($map)->save($map1)) {
                    $this -> success('屏蔽成功！');
                }else{
                    $this -> error('屏蔽失败！');
                }
                break;

            case '开启':
                if ($admin -> where($map)->save($map2)) {
                    $this -> success('开启成功！');
                }else{
                    $this -> error('开启失败！');
                }
                break;
        } 
    }
    
}