<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	
	// 登录首页
	public function login() {
        $this->display();
	}
	
	// ajax登录数据验证过程
	public function ajaxlogin() {
		
		if(IS_POST){
			
			$verify=new \Think\Verify();
			if($verify->check(I('post.captcha','','trim'))){

				$email=I('post.email');
				$password=I('post.password');
				
				$where = array (
						'email' => $email,
						'password' => md5 ( $password )
				);
				$model = D ( 'admin' );
				$r = $model->where ( $where )->find ();
				if (md5 ( $password ) == $r ['password'] && $email == $r ['email']) {
					session ( 'admin', $r );
					$this->ajaxReturn(1);//登录成功返回1
				} else{
					$this->ajaxReturn(2);//邮箱密码错误返回2
				}
	
			}
			else
				$this->ajaxReturn(3);//验证码错误返回3
		}
		
	}
	
	//退出
	public function logout(){
		session('[destroy]');
		$this -> success('退出成功！',U('Login/login'),3);
	}
	
	//制作验证码
	public function verifyImg(){
		//验证码配置
		$config=array(
				'imageH'    =>  30,               // 验证码图片高度
				'imageW'    =>  100,               // 验证码图片宽度
				'fontSize'  =>  14,
				'length'    =>  4,               // 验证码位数
				'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
		);
		$obj=new \Think\Verify($config);    //实例化verify类
		$obj->entry();  //生成验证码
	}
	
}