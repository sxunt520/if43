<?php
//评价管理控制器
namespace Admin\Controller;
class CommentController extends CommonController {
   
	//评价列表
    public function index(){
        $Model = M('comment');
        $pagesize = 10;
        if(!empty($_GET['keywords'])){
            $keywords = $_GET['keywords'];   
            $where = "if43_comment.content like '%$keywords%' AND if43_comment.pid=0";       
            $total = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
             ->where($where)-> count(); 
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
            $admin = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
    		->field('if43_comment.id,if43_comment.pro_id,if43_comment.uid,if43_comment.time,if43_comment.content,if43_comment.pid,if43_comment.is_show,if43_member.img180x180,if43_member.username')
            ->where($where) -> order('if43_comment.time DESC') -> limit($opage->firstRow.','.$opage->listRows)->select();

        }else{
            $where = "if43_comment.pid=0";       
            $total = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
             ->where($where)-> count(); 
            $opage = new \Think\Page($total, $pagesize);
            // 修改分页样式
            $opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
            $opage->setConfig('prev', '上一页');
            $opage->setConfig('first', '首页');
            $opage->setConfig('last',   '尾页');
            $opage->setConfig('next', '下一页');
            $opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
            $spage = $opage->show();
            $admin = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
    		->field('if43_comment.id,if43_comment.pro_id,if43_comment.uid,if43_comment.time,if43_comment.content,if43_comment.pid,if43_comment.is_show,if43_member.img180x180,if43_member.username')
            ->where($where)-> order('if43_comment.time DESC') -> limit($opage->firstRow.','.$opage->listRows)->select();
        }
        
        $this->assign('keywords', $keywords);
        $this->assign('u', $admin);
        $this->assign('spage',$spage);
        $this->display();
    }
    
	//查看评价回复列表
    public function reply($id){
        $Model = M('comment');
        $pagesize = 10;
        if(!empty($_GET['keywords'])){
            $keywords = $_GET['keywords'];   
            $where = "if43_comment.content like '%$keywords%' AND if43_comment.pid=$id";       
            $total = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
             ->where($where)-> count(); 
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
            $admin = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
    		->field('if43_comment.id,if43_comment.pro_id,if43_comment.uid,if43_comment.time,if43_comment.content,if43_comment.pid,if43_comment.is_show,if43_member.img180x180,if43_member.username')
            ->where($where) -> order('if43_comment.time DESC') -> limit($opage->firstRow.','.$opage->listRows)->select();

        }else{
            $where = "if43_comment.pid=$id";       
            $total = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
             ->where($where)-> count(); 
            $opage = new \Think\Page($total, $pagesize);
            // 修改分页样式
            $opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
            $opage->setConfig('prev', '上一页');
            $opage->setConfig('first', '首页');
            $opage->setConfig('last',   '尾页');
            $opage->setConfig('next', '下一页');
            $opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
            $spage = $opage->show();
            $admin = $Model->join('if43_member ON if43_comment.uid=if43_member.id')
    		->field('if43_comment.id,if43_comment.pro_id,if43_comment.uid,if43_comment.time,if43_comment.content,if43_comment.pid,if43_comment.is_show,if43_member.img180x180,if43_member.username')
            ->where($where)-> order('if43_comment.time DESC') -> limit($opage->firstRow.','.$opage->listRows)->select();
        }
        
        $this->assign('total', $total);
        $this->assign('keywords', $keywords);
        $this->assign('u', $admin);
        $this->assign('spage',$spage);
        $this->display();
    }
	
    
    //修改评价
    public function edit($id){
    	
    	$Model=M('comment');
    	if(IS_POST){
    		$data['content']=I('post.content');
    		$data['id']=$id;
    		if($Model->save($data)){
    			
    			$this->success('修改评价成功!',U('Comment/index'));
    			
    		}else{
    			
    			$this->error('修改评价失败!');
    			
    		}
    		
    	}else{
    		
    		$row=$Model->find($id);
    		$this->assign('row',$row);
    		$this->display();
    		
    	}
    	 
    }
    
    //修改评论回复
    public function editReply($id,$pid){
    	 
    	$Model=M('comment');
    	if(IS_POST){
    		$data['content']=I('post.content');
    		$data['id']=$id;
    		if($Model->save($data)){
    			 
    			$this->success('修改回复成功!',U('Admin/Comment/reply/id/'.$pid));
    			 
    		}else{
    			 
    			$this->error('修改回复失败!');
    			 
    		}
    
    	}else{
    
    		$row=$Model->find($id);
    		$this->assign('row',$row);
    		$this->display();
    
    	}
    
    }
    
    //删除评价
    public function delete($id){
    	
    	if(M('comment')->delete($id)){
    		
    		$this->success('删除成功!',U('Comment/index'));
    		
    	}else{
    		
    		$this->error('删除成功!');
    		
    	}
    	
    }
    
    //删除评论回复
    public function deleteReply($id,$pid){
    	 
    	if(M('comment')->delete($id)){
    
    		$this->success('删除成功!',U('Admin/Comment/reply/id/'.$pid));
    
    	}else{
    
    		$this->error('删除成功!');
    
    	}
    	 
    }
   
    //批量处理评价
    public function deleteall(){
        $post = $_POST;
        $ids = implode(',', $post['id']);
        $admin = M('comment');
        $map['id'] = array('in',$ids);
        $map1['is_show'] = 1;
        $map2['is_show'] = 0;
        switch ($post['action']) {
            case '删除':
                if ($admin -> where($map)->delete()) {
                    $this -> success('删除成功！');
                }else{
                    $this -> error('删除失败！');
                }
                break;
            
            case '已审核':
                if ($admin -> where($map)->save($map1)) {
                    $this -> success('审核成功！');
                }else{
                    $this -> error('审核失败！');
                }
                break;

            case '未审核':
                if ($admin -> where($map)->save($map2)) {
                    $this -> success('操作成功！');
                }else{
                    $this -> error('操作失败！');
                }
                break;
        } 
    }
    
}