<?php
//主题控制器
namespace Home\Controller;
class TopicController extends BaseController{
	
	//主题首页
    public function index(){

    	$this->display();
		
    }
    
	//主题列表首页
    public function topiclist() {
    	
    	//$this->assign($assign);
    	$this->display();
    	
    }
    
}