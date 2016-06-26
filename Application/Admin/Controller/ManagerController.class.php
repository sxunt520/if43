<?php
/*
    index()      管理员显示页面
    save_doit()  修改
    deleteall()  判断是屏蔽还是 开启
    add_doit()   添加用户
    search ()    搜索
*/
namespace Admin\Controller;
class ManagerController extends CommonController {
   
    public function index(){
    	//var_dump(session(admin));exit();
        $user = M('admin');
        $pagesize = 5;
        if(!empty($_GET['keywords'])){
            $keywords = $_GET['keywords'];   
            $where = "username like '%$keywords%'";       
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
            $admin = $user ->where($where) -> order('id asc') -> limit($opage->firstRow.','.$opage->listRows)->select();

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
            $admin = $user -> order('id asc') -> limit($opage->firstRow.','.$opage->listRows)->select();
        }
        //遍历管理员权限
        foreach ($admin as &$value) {
            $auth_group = M('auth_group_access');
            $auth_group1 = $auth_group -> where('uid='.$value['id']) -> select();
            $value['groupid'] = $auth_group1[0]['group_id'];
        }
        //判断男女
        foreach($admin as &$v) {
            if($v['sex']==1) {
                $v['sex'] = '男';
            }else{
                $v['sex'] = '女';
            }
        }
         //判断管理员权限
        foreach($admin as &$v) {
            if($v['groupid']==1) {
                $v['groupid'] = '超级管理员';
            }else if($v['groupid']==2){
                $v['groupid'] = '管理员';
            }else if($v['groupid']==3){
                $v['groupid'] = '编辑';
            }
            else if($v['groupid']==4){
            	$v['groupid'] = '打杂';
            }
        }
        //判断状态
        foreach($admin as &$v) {
            if($v['disabled']==0) {
                $v['disabled'] = '已屏蔽';
            }else if($v['disabled']==1){
                $v['disabled'] = '已开启';
            }
        }
        
        $this->assign('keywords', $keywords);
        $this->assign('u', $admin);
        $this->assign('spage',$spage);
        $this->display();
    }

    public function save(){
        $id = I('GET.id',false,int);
        if(empty($id)){
            $this->error('参数错误');
        }
        $user = M('admin')->find($id);
        $this->assign('user',$user);
        $this->display();
    }
    //修改
    public function save_doit(){
        if(IS_POST){
            $id = I('GET.id',false,int);
            $map['id']=$id;
            $post = I('post.');
            $user = M('admin');
            if($user->where($map)->save($post)){
                $this->success('修改成功',U('Manager/index'),3);
            }else{
                $this->error('修改失败');
            }
        }
    }

    public function changepwd(){
        $id = I('GET.id',false,int);

        if(empty($id)){
            $this->error('参数错误');
        }
        $map['id']=$id;
        $user = M('admin')->where($map)->find($id);
        $this->assign('user',$user);
        $this->display();
    }
    //修改密码
     public function savepwd(){
        if(IS_POST){
            $id = I('GET.id',false,int);
            $post = I('post.');
            if (!$post['password'] == $post['repassword']) {
                $this -> error('两次密码不一致！');
            }
            $post['password'] = md5($post['password']);
            unset($post['repassword']);
            $user = M('admin');
            $map['id']=$id;
            if($user->where($map)->save($post)){
                $this->success('修改成功',U('Manager/index'),3);
            }else{
                $this->error('修改失败');
            }
        }
    }
    //
    public function changeauth(){
        $id = I('GET.id',false,int);
        $username = I('GET.username');
        if(empty($id)){
            $this->error('参数错误');
        }
        $map['uid']=$id;
        $user = M('auth_group_access')->where($map)->find();
        $this -> assign('username',$username);
        $this -> assign('id',$id);
        $this->assign('user',$user);
        $this->display();
    }
    //修改权限
    public function saveauth(){
        if(IS_POST){
            $id = I('GET.id',false,int);
            $post = I('post.');
            $user = M('auth_group_access');
            $map['uid']=$id;
            if($user->where($map)->save($post)){
                $this->success('修改成功',U('Manager/index'),3);
            }else{
                $this->error('修改失败1');
            }
        }
    }

    public function add(){
        $this->display();
    }
    //添加的时候判断用户名是否存在
    public function add_doit(){
        $lock1 = false;
        $lock2 = false;
        $post = I('post.');
        $post['lastip'] =$_SERVER['REMOTE_ADDR'];
        $post['lasttime'] = time();
        $groupid = $post['groupid'];
        unset($post['groupid']);
        $user = M('admin');
        $map['username'] = $post['username'];
        if($user -> where($map) -> select()){
            $this -> error('该用户名已存在');
        }
        if($post['password'] == $post['repassword']){
            $post['password'] = md5($post['password']);
            if($user->create($post)){
                if($user->add()){
                    $lock1 = true;
                }else{
                    $this->error('添加管理员失败1');
                }
            }
            $user1 = M('admin');
            $user1 = $user1 -> where($map) -> find();
            $group = M('auth_group_access');
            $data['uid'] = $user1['id'];
            $data['group_id'] = $groupid;
            if ($group -> create($data)) {
               if ($group -> add()) {
                    $lock2 = true;
                }else{
                    $this->error('添加管理员失败2');
                }   
            }else{
                $this->error('添加管理员失败3');
                }   

            if ($lock1 && $lock2) {
                $this->success('添加管理员成功','index');
            }
            
        }else{
            $this->error('两次密码不一致');
        }
    }
    //删除
    public function del(){
        if(IS_GET){
            $lock1 = false;
            $lock2 = false;
            $id = I('get.id',1,'intval');
            if($id=1){
            	$this -> error('不能删除超级管理员哦！');
            }
            if($id<0){
                $this -> error('非法参数');
            }
            $user = M('admin');
            if ($user -> delete($id)) {
                $lock1 = true;
            }else{
                $this->error('删除失败',U('Manager/index'),3);
            }

            $group =M('auth_group_access');
            $map['uid'] = $id;
            if($group->where($map)->delete()){
                $lock2 = true;
            }else{
                $this->error('删除失败',U('Manager/index'),3);
            }

            if($lock1 && $lock2){
                $this->success('删除成功',U('Manager/index'),3);
            }else{
                $this->error('删除失败',U('Manager/index'),3);
            }
        }
    }

    public function search (){
        //1.获取POST的数据，根据数据组装查询的条件，根据条件从数据库中获取数据，返回给页面中遍历。
        if(isset($_POST['username']) && $_POST['username']!=null){
            $where['username'] = array('like',"%{$_POST['username']}%");
        }
        
        $user=M('Admin');
        $u=$user->where($where)->select();
        $this->assign('u',$u);
        $this->display('index');
    }
    //判断是屏蔽还是 开启
    public function deleteall(){
        $post = $_POST;
        $ids = implode(',', $post['id']);
        $admin = M('admin');
        $map['id'] = array('in',$ids);
        $map1['disabled'] = 0;
        $map2['disabled'] = 1;
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