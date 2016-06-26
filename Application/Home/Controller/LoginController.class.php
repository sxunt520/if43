<?php
namespace Home\Controller;
class LoginController extends BaseController {
	// 进入前台登录页面
    public function index(){
        $this ->display();
    }
    // 验证码判断
    function check_verify($code, $id = ''){    
        $verify = new \Think\Verify();    
       if ($verify->check($code, $id)) {
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
       }
    }
    //登录验证
    public function login(){
    	
    	$verify = new \Think\Verify ();
    	if ($verify->check ( I ( 'post.code', '', 'trim' ) )) {
    	
    		$username = I('post.username');
    		$password = I('post.password');
    		$where = array(
    				'username' => $username,
    				'password' => md5($password),
    		);
    		$model = M('member');
    		$r = $model -> where($where) -> find();
    		if($r){
    			if($r['is_display']==0){
    			
    				$this->error('由于非法操作！你的账号已经被屏蔽！');
    				 
    			}else{
	    			session('user',$r);
	    			$this -> success('登录成功！',U('Index/index'));
    			}
    		}else{
    			$this -> error('帐号密码错误','index');
    		}
    		
    	}
    	else
    		$this->error ( '验证码错误,登陆失败!');
      
    }

    //退出
    public function logout(){
        session('user',null);
        $this -> success('退出成功！',U('Index/index'));
    }
    
	//找回密码
	public function find(){
		$this->display();
	}
    
    // 进入前台找回密码页面
   	public function tofindpwd(){
   		
   		$verify = new \Think\Verify ();
		if ($verify->check ( I ( 'post.code', '', 'trim' ) )) {
			
			$username = I ( 'username' );
			$phone = I ( 'phone' );
			$model = M ( 'member' );
			$info = $model->where ( "phone='{$phone}' AND username='{$username}'" )->find ();
			if ($info) {
				$_SESSION ['findinfo'] = $info;
				$this->success ( '请重设密码！', 'update' );
			} else {
				$this->error ( '用户信息错误!请确定在填写!' );
			}
   		
   		}
   		else
   			$this->error ( '验证码错误,操作失败!');
   		
    }

    // 判断验证码
    public function getCode(){
      $config = array(
        'imageH'    =>  36,               // 验证码图片高度
        'imageW'    =>  90,               // 验证码图片宽度
        'fontSize'  =>  14,
      	'length'    =>  4,               // 验证码位数
      	'fontttf'   =>  '4.ttf',         // 验证码字体，不设置随机获取
      );
      $verify = new \Think\Verify($config);     
      $verify -> entry();
    } 
    
    // 更新密码到数据库
    public function doupdate(){
    	
    	$verify = new \Think\Verify ();
    	if ($verify->check ( I ( 'post.code', '', 'trim' ) )) {

    	    $pwd = md5 ( I ( 'post.pwd' ) );
			$repwd = md5 ( I ( 'post.repwd' ) );
			$id = I ( 'post.id' );
			if ($pwd == $repwd) {
				$user = M ( 'member' );
				$user->where ( 'id=' . $id )->setField ( 'password', $pwd );
				$username = $user->where ( 'id=' . $id )->find ();
				$_SESSION ['user'] = $username;
				$this->success ( '密码重设成功', U ( 'Index/index' ) );
			} else {
				$this->error ( "两次密码输入不一样！" );
			}
    		 
    	}
    	else
    		$this->error ( '验证码错误,操作失败!');
      
    }

    // 修改密码页面
    public function update(){
      $this ->display();
    }
}