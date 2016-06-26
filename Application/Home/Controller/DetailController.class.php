<?php
namespace Home\Controller;
class DetailController extends BaseController {
	
    public function index($pro_id){
    	
    	//单条记录
    	$detailModel=M('pro');
    	$row=$detailModel->find($pro_id);
    	//画册
    	$galaryModel=M('galary');
    	$galaryRows=$galaryModel->where("pro_id=".$pro_id)->select();
    	$this->assign('row',$row);
    	//其它相同类别的推荐
    	$categoryModel = new \Model\CategoryModel();
    	$subIds = $categoryModel->getParentIds($row['cat_id']);//获取所有父类
    	$more=end($subIds);
    	$subIds = $categoryModel->getSubIds($more);//获取子类
    	$subIds=implode(',', $subIds);
    	$moreRows=$detailModel->where("cat_id in ($subIds) AND is_onsale=1 AND is_examine=1 AND is_best=1  AND is_hot=1")->order('pro_order DESC,pro_id DESC')->limit(7)->select();
    	//单独去画册取推荐的第一张大图
    	$bigPic=$galaryModel->where("pro_id=".$moreRows[0]['pro_id'])->find();
    	//评论info
    	$comModel=M('comment');
    	$commentRows=$comModel->join('if43_member ON if43_comment.uid=if43_member.id')
    	->field('if43_comment.id,if43_comment.time,if43_comment.content,if43_comment.pid,if43_member.img180x180,if43_member.username')
    	->where("if43_comment.pro_id={$pro_id} AND pid=0 AND is_show=1")->order('if43_comment.time DESC')->select();
    	//回复info
    	$hfRows=$comModel->join('if43_member ON if43_comment.uid=if43_member.id')
    	->field('if43_comment.id,if43_comment.time,if43_comment.content,if43_comment.pid,if43_member.img180x180,if43_member.username')
    	->where("if43_comment.pro_id={$pro_id} AND pid>0 AND is_show=1")->order('if43_comment.time DESC')->select();
    	//评论共有多少条
    	$commentNums=$comModel->join('if43_member ON if43_comment.uid=if43_member.id')
    	->field('if43_comment.id,if43_comment.time,if43_comment.content,if43_comment.pid,if43_member.img180x180,if43_member.username')
    	->where("if43_comment.pro_id={$pro_id} AND pid=0 AND is_show=1")->order('if43_comment.time DESC')->count();
    	
    	$this->assign('galaryRows',$galaryRows);
    	$this->assign('moreRows',$moreRows);
    	$this->assign('bigPic',$bigPic);
    	$this->assign('more',$more);//当前最大类别id
    	$this->assign('commentRows',$commentRows);
    	$this->assign('hfRows',$hfRows);
    	$this->assign('commentNums',$commentNums);
    	$this->display();
		
    }
    	
        //Ajax评论
	    public function comment(){

	    	$data=I('post.');
	    	$data['time']=time();
	    	
	    	$Model=M('comment');
	    	if($newid=$Model->add($data)){
				
	    		$userInfo=M('member')->find($data['uid']);
	    		
	    		$str.='<div class="cmt clearfix">';
	    		$str.='<div class="user-pic">';
	    		$str.='<img src="/Public/uploads/'.$userInfo['img180x180'].'" alt="'.$userInfo['username'].'">';
	    		$str.='</div>';
	    		$str.='<div class="cmt-doc">';
	    		$str.='<div class="cmt-info clearfix">';
	    		$str.='<a class="fl" href="#" title="ltffvk" target="_blank">'.$userInfo['username'].'</a>';
	    		$str.='<span class="fl gc"></span>';
	    		$str.='<span class="fr gc">';
	    		$str.='</span>';
	    		$str.='<span class="fr gc mr5 ">'.date('Y-m-d H:i',$data['time']).'</span>';
	    		$str.='</div>';
	    		$str.='<p class="cmt-content clearfix"><span>'.$data['content'].'</span>';
	    		$str.='<a class="J_CmtReplyBtn btn hf">回复<em class="J_ReplyCount" data-count="0"></em></a>';
	    		$str.='</p>';
// 	    		$str.='<div class="cmt-reply J_CmtReply hf2" style="display:none">';
// 	    		$str.='<textarea class="b-textarea J_ReplyTxt atsug" placeholder="回复内容!" id="content_'.$newid.'"></textarea>';
// 	    		$str.='<p class="reply-info clearfix"><a class="sbl-btn J_ReplySubmit" data-type="list" id="hf_'.$newid.'" href="javascript:void(0);" onClick="hfInfo('.$newid.')">回复</a></p>';
// 	    		$str.='<ul class="reply-list J_ReplyList"></ul>';
// 	    		$str.='</div>';
	    		$str.='</div>';
	    		$str.='</div>';
	    		
	    		$this->ajaxReturn($str);
	    		
	    	}
	    	else{
	    		$this->ajaxReturn(false);
	    	}

// 	    	$data=serialize($data);
// 	    	$this->ajaxReturn($data);
	    	
	    }
    
    //回复Ajax
    public function hfAjax(){
    	
    	$data['pid']=I('post.id');
    	$data['uid']=I('post.uid');
    	$data['username']=I('post.username');
    	$data['content']=I('post.content');
    	$data['pro_id']=I('post.pro_id');
    	$data['time']=time();
    	
    	$Model=M('comment');
    	if($Model->add($data)){
    		
    		$userInfo=M('member')->find($data['uid']);
    		$str.="<li>";
    		$str.="<img src='/Public/uploads/".$userInfo['img180x180']."' alt='".$data['username']."' width='30'>";
    		$str.='<strong>'.$data['username'].'回复:</strong>';
    		$str.='<p>'.$data['content'].'</p>';
    		$str.="</li>";
    		
    		$this->ajaxReturn($str);
    	}
    	else{
    		$this->ajaxReturn(false);
    	}
    	
//     	$data=serialize($data);
//     	$this->ajaxReturn($data);
    	
    }
    
}