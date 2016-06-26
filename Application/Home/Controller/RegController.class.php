<?php 
namespace Home\Controller;
class RegController extends BaseController{
	// 进入注册页面
    function index(){
        $this -> display();
    }
    
    //《使用协议》
    public function agreement(){
    	$this->display('agreement');
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
    //注册验证
    public function reg(){
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
            	 $arr['id']=$newid;
                  session('user',$arr);
                $this -> success('注册成功！',U('Index/index'));
            }else{
                $this -> error('注册失败','index');
            }   
        }
    }

    //ajax进行用户手机号码验证
    public function regajaxphone(){
        $user = M('member');
        $cc = I('post.phone',false);
        $res = $user->where("phone='{$cc}'")->select(); 
        if($res){
         $this->ajaxReturn(true);
        }else{
         $this->ajaxReturn(false);
        }
    }

    //ajax进行用户名验证
    public function regajaxuser(){
        $user = M('member');
        $cc = $_POST['username'];

        $users['username']= $cc;    
        $res = $user->where($users)->find();  

        if($res){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    // 判断验证码
    public function getCode(){
      $config = array(
        'fontSize' => 30,
        'length' => 4,
        'useNoise' => false
      );
      $verify = new \Think\Verify($config);     
      $verify -> entry();
    }
}
