<?php
//精品控制器
namespace Admin\Controller;
use Model\CategoryModel;
class ProController extends CommonController{
	
	//精品列表页
	public  function index(){
		
		$Model = M('pro');
		$pagesize = 12;
		//ajax选择类别
		$catgoods = M('category');
		$type = $catgoods->where ( "parent_id=0" )->select ();
		$this->assign ( 'data', $type );
		$map['cid'] = isset ( $_GET ['cid'] ) ? $_GET ['cid'] : '';
		$map['second'] = isset ( $_GET ['second'] ) ? $_GET ['second'] : '';
		$map['first'] = isset ( $_GET ['first'] ) ? $_GET ['first'] : '';
		//根据cid、second、first 获取cat_id 的$whereSql语句
				if($map['cid']!=''){
					$cat_id=$map['cid'];
					$whereSql=" and `cat_id`=$cat_id";
				}else{
					if($map['second']!=''){
						$categoryModel = new CategoryModel();
						$subIds = $categoryModel->getSubIds($map['second']);//获取子类
						$subIds=implode(',', $subIds);
						$whereSql=" and `cat_id` in ($subIds)";
					}else{
						if($map['first']!=''){
							$categoryModel = new CategoryModel();
							$subIds = $categoryModel->getSubIds($map['first']);//获取子类
							$subIds=implode(',', $subIds);
							$whereSql=" and `cat_id` in ($subIds)";
						}else{
								$whereSql='';
						}
					}
				}
		//获取推荐、上架的where的语句		
		$intro_type=isset($_GET['intro_type']) ? $_GET['intro_type'] : '';
		$map['intro_type']=$intro_type;//装入map数组中
		if($intro_type=='all_type'){
			$whereSql.=" and `is_examine`=1";
			$whereSql.=" and `is_best`=1";
			$whereSql.=" and `is_new`=1";
			$whereSql.=" and `is_hot`=1";
		}else{
			$whereSql.=$intro_type == '' ? '' : " and `$intro_type`=1";
		}
		$is_on_sale=isset($_GET['is_on_sale']) ? $_GET['is_on_sale'] : '';
		$map['is_on_sale']=$is_on_sale;//装入map数组中
		$whereSql.=$is_on_sale == '' ? '' : " and `is_onsale`=$is_on_sale";
				
		//获取搜索筛选where条件
		$keywords = isset ( $_GET ['keywords'] ) ? $_GET ['keywords'] : '';
		$map['keywords']=$keywords;//装入map数组中
		$whereSql.= $keywords != '' ? " and `pro_name` like '%$keywords%'" : '';
		$whereSql=substr($whereSql,4);//切掉多余的 and
		//echo $whereSql;
		$total = $Model->where($whereSql) -> count();
		//echo '<br />'.$total.'条<br />';
		$opage = new \Think\Page($total, $pagesize);
		//var_dump($opage->parameter);
		// 修改分页样式
		$opage->setConfig('header', '共%TOTAL_ROW%条，共%TOTAL_PAGE%页 当前第%NOW_PAGE%页');
		$opage->setConfig('prev', '上一页');
		$opage->setConfig('first', '首页');
		$opage->setConfig('last',   '尾页');
		$opage->setConfig('next', '下一页');
		$opage->setConfig('theme','%HEADER% %FIRST% %UP_PAGE%  %LINK_PAGE%  %DOWN_PAGE% %END%');
		$spage = $opage->show();
		$proList = $Model ->where($whereSql)-> order('pro_order desc,pro_id desc') -> limit($opage->firstRow.','.$opage->listRows)->select();

		$this->assign('map',$map);
		$this->assign('spage',$spage);
		$this->assign('proList',$proList);
		$this->display();
		
	}
	
	//精品添加
	public function add(){
		
		if(IS_POST){
			
			$proModel=M('pro');
			$data=$proModel->create();
			$data['add_time']=time($data['add_time']);
			$data['pro_content']=$_POST['pro_content'];
			//根据cid、second、first 获取cat_id
			if(!empty($_POST['cid'])){
			
				$data['cat_id']=$_POST['cid'];
			
			}else{
				if(!empty($_POST['second'])){
					$data['cat_id']=$_POST['second'];
				}else{
					if(!empty($_POST['first'])){
						$data['cat_id']=$_POST['first'];
					}else{
							$this->error('请选择分类!');
					}
				}
			}
		
	    //********************************************pro_img原图、及缩略图上传*****************************************//
		$config=array(
				'rootPath'      =>  './Public/uploads/',
				'maxSize'    =>    3145728,
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
		);
		$upload=new \Think\Upload($config);
		if(!empty($_FILES['pro_img']['name']))
		{
			$info=$upload->uploadOne($_FILES['pro_img']);
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());}
			else{// 上传成功 获取上传文件信息
				$data['pro_img']=$info['savepath'].$info['savename'];
			}
			
			////////缩略图
			$img=new \Think\Image();
			$big_img='./Public/uploads/'.$data['pro_img'];
			$img->open($big_img);
			//img250x250
			$img->open($big_img);
			$img->thumb(250,250,3);
			$small_img='./Public/uploads/'.$info['savepath'].'img250x250_'.$info['savename'];
			$img->save($small_img);
			$data['img250x250']=$info['savepath'].'img250x250_'.$info['savename'];
			//img120x120
			$img->open($big_img);
			$img->thumb(120,120,3); 
			$small_img='./Public/uploads/'.$info['savepath'].'img120x120_'.$info['savename'];
			$img->save($small_img);
			$data['img120x120']=$info['savepath'].'img120x120_'.$info['savename'];
			//img45x45
			$img->open($big_img);
			$img->thumb(45,45,3);
			$small_img='./Public/uploads/'.$info['savepath'].'img45x45_'.$info['savename'];
			$img->save($small_img);
			$data['img45x45']=$info['savepath'].'img45x45_'.$info['savename'];
			//img220x284
			$img->open($big_img);
			$img->thumb(220,284,3);
			$small_img='./Public/uploads/'.$info['savepath'].'img220x284_'.$info['savename'];
			$img->save($small_img);
			$data['img220x284']=$info['savepath'].'img220x284_'.$info['savename'];
		}
		else{
			$this->error('^_^~请上传缩略图!');
		}
		//********************************************pro_img原图、及缩略图上传*****************************************//
		//********************************************img_new原图、及缩略图上传*****************************************//
		if(!empty($_FILES['img_new']['name']))
		{
			$info=$upload->uploadOne($_FILES['img_new']);
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());
			}
			else{// 上传成功 获取上传文件信息
				$data['img_new']=$info['savepath'].$info['savename'];
			}
			////////缩略图
			$img=new \Think\Image();
			$big_img='./Public/uploads/'.$data['img_new'];
			//衣服分类下的所有分类cat_id,根据这个选择生成大小不同的缩略图
			$categoryModel = new CategoryModel();
			$subIds = $categoryModel->getSubIds(1);//这里传入衣服的cat_id
				if(in_array($data['cat_id'], $subIds)){
					//193*426(衣服)
					$img->open($big_img);
					$img->thumb(193,426,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img_new_'.$info['savename'];
					$img->save($small_img);
					$data['img_new']=$info['savepath'].'img_new_'.$info['savename'];
				}
				else{
					//230*240(其它)
					$img->open($big_img);
					$img->thumb(230,240,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img_new_'.$info['savename'];
					$img->save($small_img);
					$data['img_new']=$info['savepath'].'img_new_'.$info['savename'];
				}
		}
// 		else{
// 			$this->error('^_^~请上传"今日上新图"!');
// 		}
		//********************************************img_new原图、及缩略图上传*****************************************//
		
			$pro_id=$proModel->add($data);//添加到精品表，这里的$r是插入成功返回的插入pro_id
			if($pro_id){
				
				/**************galary表_画册插入**************/
					if(!empty($_FILES['img_url']['name'][0]))//如果有画册图片插入
					{
						$img_desc=I('post.img_desc');
						$img_url=$upload->multiUp($_FILES['img_url']);
						$galaryModel=M('galary');
						//遍历单条添加到画册
						foreach ($img_desc as $key=>$value){
							$list['img_desc']=$img_desc[$key];
							$list['img_url']=$img_url[$key]['savepath'].$img_url[$key]['savename'];
							$list['pro_id']=$pro_id;
							//单个缩略图处理
							$img=new \Think\Image();
							$big_img='./Public/uploads/'.$list['img_url'];
							//img600x600
							$img->open($big_img);
							$img->thumb(600,600,3);
							$small_img='./Public/uploads/'.$img_url[$key]['savepath'].'thumb_url_'.$img_url[$key]['savename'];
							$img->save($small_img);
							$list['thumb_url']=$img_url[$key]['savepath'].'thumb_url_'.$img_url[$key]['savename'];
							//单条添加到画册
							$galaryModel->add($list);
						}
					
					}else{//如果没有画册图片插入,就以缩略图插入,和其它的相关信息插入画册数据库
						
						$list['img_desc']=I('post.pro_name');
						$list['img_url']=$data['pro_img'];
						$list['pro_id']=$pro_id;
						$list['thumb_url']=$data['img120x120'];
						$galaryModel=M('galary');
						$galaryModel->add($list);
						
					}
				/***************画册插入**************/
				/************pro_attr表_精品属性插入********/
					$attr_ids = I('post.attr_id_list');
					$attr_values = I('post.attr_value_list');
					$attr_prices = I('post.attr_price_list');
					//批量属性插入
					$attrModel=M('pro_attr');
					foreach ($attr_ids as $k => $v) {
						$list['pro_id'] = $pro_id;
						$list['attr_id'] = $v;
						$list['attr_value'] = $attr_values[$k] ;
						$list['attr_price'] = $attr_prices[$k] ;
						$attrModel->add($list);
					}
				/************精品属性插入********/
			$this->success('添加成功!',U('Pro/index',1));
				
			}else{
				$this->error('添加失败!');
			}	
			
		}else{
			//ajax选择类别
			$catgoods = M('category');
			$type = $catgoods -> where("parent_id=0") -> select();
			$this ->assign('data' , $type);
			//获取所有类型
			$types=M('pro_type')->select();
			$this->assign('types',$types);
			$this->display();
		}
		
	}
	
	//ajax商品类别查询
	public function sel(){
		$pid = $_GET['id'];
		$data = M('category');
		$list = $data -> where('parent_id='.$pid) -> select();
		for($i = 0;$i<count($list); $i++){
			$string .= "<option value='".$list[$i]['cat_id']."'>".$list[$i]['cat_name']."</option>";
		}
		echo $string;
	}
	
	//ajax自动加载二、三轮相关类别
	public function sel2(){
		$first = $_GET['first'];
		$second = $_GET['second'];
		$cid = $_GET['cid'];
		$data = M('category');
		
		$list = $data -> where('parent_id='.$first) -> select();
		$string.='<select style="height:30px;" id="c" name="second">';
		$string.='<option value="">二级分类</option>';
		for($i = 0;$i<count($list); $i++){
			$space1 = $second == $list [$i] ['cat_id'] ? "selected='selected'" : '';
			$string .= "<option ".$space1." value='".$list[$i]['cat_id']."'>".$list[$i]['cat_name']."</option>";
		}
		$string.='</select>';
		
		$string.='<select style="height:30px;" name="cid" id="d">';
		$list2 = $data -> where('parent_id='.$second) -> select();
		$string.='<option value="">三级分类</option>';
		for($i = 0;$i<count($list2); $i++){
			$space2 = $cid == $list2[$i]['cat_id'] ? "selected='selected'" : '';
			$string .= "<option ".$space2." value='".$list2[$i]['cat_id']."'>".$list2[$i]['cat_name']."</option>";
		}
		$string.='</select>';
		
		echo $string;
	}
	
	//精品修改
	public function edit($pro_id){
		
		if(IS_POST){
			
			$proModel=M('pro');
			$data=$proModel->create();
			$data['add_time']=time($data['add_time']);
			$data['pro_content']=$_POST['pro_content'];
			$data['is_new'] = isset($_POST['is_new']) ? $_POST['is_new'] : 0;
			$data['is_examine'] = isset($_POST['is_examine']) ? $_POST['is_examine'] : 0;
			$data['is_best'] = isset($_POST['is_best']) ? $_POST['is_best'] : 0;
			$data['is_hot'] = isset($_POST['is_hot']) ? $_POST['is_hot'] : 0;
			$data['is_onsale'] = isset($_POST['is_onsale']) ? $_POST['is_onsale'] : 0;
			//根据cid、second、first 获取cat_id
			if(!empty($_POST['cid'])){
					
				$data['cat_id']=$_POST['cid'];
					
			}else{
				if(!empty($_POST['second'])){
					$data['cat_id']=$_POST['second'];
				}else{
					if(!empty($_POST['first'])){
						$data['cat_id']=$_POST['first'];
					}else{
						$this->error('请选择分类!');
					}
				}
			}
			
			//********************************************pro_img原图、及缩略图上传*****************************************//
			$config=array(
					'rootPath'      =>  './Public/uploads/',
					'maxSize'    =>    3145728,
					'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
			);
			$upload=new \Think\Upload($config);
			if(!empty($_FILES['pro_img']['name']))
			{
				$info=$upload->uploadOne($_FILES['pro_img']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());}
					else{// 上传成功 获取上传文件信息
						$data['pro_img']=$info['savepath'].$info['savename'];
					}
						
					////////缩略图
					$img=new \Think\Image();
					$big_img='./Public/uploads/'.$data['pro_img'];
					$img->open($big_img);
					//img250x250
					$img->open($big_img);
					$img->thumb(250,250,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img250x250_'.$info['savename'];
					$img->save($small_img);
					$data['img250x250']=$info['savepath'].'img250x250_'.$info['savename'];
					//img120x120
					$img->open($big_img);
					$img->thumb(120,120,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img120x120_'.$info['savename'];
					$img->save($small_img);
					$data['img120x120']=$info['savepath'].'img120x120_'.$info['savename'];
					//img45x45
					$img->open($big_img);
					$img->thumb(45,45,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img45x45_'.$info['savename'];
					$img->save($small_img);
					$data['img45x45']=$info['savepath'].'img45x45_'.$info['savename'];
					//img220x284
					$img->open($big_img);
					$img->thumb(220,284,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img220x284_'.$info['savename'];
					$img->save($small_img);
					$data['img220x284']=$info['savepath'].'img220x284_'.$info['savename'];
			}
// 			else{
// 				$this->error('^_^~请上传缩略图!');
// 			}
			//********************************************pro_img原图、及缩略图上传*****************************************//
			//********************************************img_new原图、及缩略图上传*****************************************//
			if(!empty($_FILES['img_new']['name']))
			{
				$info=$upload->uploadOne($_FILES['img_new']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}
				else{// 上传成功 获取上传文件信息
					$data['img_new']=$info['savepath'].$info['savename'];
				}
				////////缩略图
				$img=new \Think\Image();
				$big_img='./Public/uploads/'.$data['img_new'];
				//衣服分类下的所有分类cat_id,根据这个选择生成大小不同的缩略图
				$categoryModel = new CategoryModel();
				$subIds = $categoryModel->getSubIds(1);//这里传入衣服的cat_id
				if(in_array($data['cat_id'], $subIds)){
					//193*426(衣服)
					$img->open($big_img);
					$img->thumb(193,426,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img_new_'.$info['savename'];
					$img->save($small_img);
					$data['img_new']=$info['savepath'].'img_new_'.$info['savename'];
				}
				else{
					//230*240(其它)
					$img->open($big_img);
					$img->thumb(230,240,3);
					$small_img='./Public/uploads/'.$info['savepath'].'img_new_'.$info['savename'];
					$img->save($small_img);
					$data['img_new']=$info['savepath'].'img_new_'.$info['savename'];
				}
			}
// 			else{
// 				$this->error('^_^~请上传"今日上新图"!');
// 			}
			//********************************************img_new原图、及缩略图上传*****************************************//
			$data['pro_id']=$pro_id;//更新的当前精品ID
			$r=$proModel->save($data);//更新到精品表
			if($r){
			
				/**************galary表_画册插入**************/
				if(!empty($_FILES['img_url']['name'][0]))//如果有画册图片插入
				{
					$img_desc=I('post.img_desc');
					$img_url=$upload->multiUp($_FILES['img_url']);
					$galaryModel=M('galary');
					//遍历单条添加到画册
					foreach ($img_desc as $key=>$value){
						$list['img_desc']=$img_desc[$key];
						$list['img_url']=$img_url[$key]['savepath'].$img_url[$key]['savename'];
						$list['pro_id']=$pro_id;
						//单个缩略图处理
						$img=new \Think\Image();
						$big_img='./Public/uploads/'.$list['img_url'];
						//img600x600
						$img->open($big_img);
						$img->thumb(600,600,3);
						$small_img='./Public/uploads/'.$img_url[$key]['savepath'].'thumb_url_'.$img_url[$key]['savename'];
						$img->save($small_img);
						$list['thumb_url']=$img_url[$key]['savepath'].'thumb_url_'.$img_url[$key]['savename'];
						//单条添加到画册
						$galaryModel->add($list);
					}
						
				}
// 				else{//如果没有画册图片插入,就以缩略图插入,和其它的相关信息插入画册数据库
			
// 					$list['img_desc']=I('post.pro_name');
// 					$list['img_url']=$data['pro_img'];
// 					$list['pro_id']=$pro_id;
// 					$list['thumb_url']=$data['img120x120'];
// 					$galaryModel=M('galary');
// 					$galaryModel->add($list);
			
// 				}
				/***************画册插入**************/
				
				//批量更新画册图片文字
				$galary=$_POST['galary'];
				$galaryModel=M('galary');
				foreach ($galary as $key=>$value){
					$galaryData['img_id']=$key;
					$galaryData['img_desc']=$value;
					$galaryModel->save($galaryData);
				}
				
				/************pro_attr表_精品属性更新********/
				$attr_ids = I('post.attr_id_list');
				$attr_values = I('post.attr_value_list');
				$attr_prices = I('post.attr_price_list');
				$pro_attr_id = I('post.pro_attr_id_list');
				//批量属性更新
				$attrModel=M('pro_attr');
				foreach ($attr_ids as $k => $v) {
					$list['pro_id'] = $pro_id;
					$list['attr_id'] = $v;
					$list['attr_value'] = $attr_values[$k] ;
					$list['attr_price'] = $attr_prices[$k] ;
					$list['pro_attr_id']= $pro_attr_id[$k] ;
					$attrModel->save($list);
				}
				/************精品属性更新********/
				$this->success('更新成功!',U('Pro/index',1));
			
			}else{
				$this->error('更新失败!');
			}
			
		}else{
			
			//获取所有类型
			$types=M('pro_type')->select();
			$this->assign('types',$types);
			//三联表查询单条数据
			$Model=M('pro');
			$row=$Model
			->join('if43_pro_attr ON if43_pro.pro_id = if43_pro_attr.pro_id')
			->join('if43_galary ON if43_pro.pro_id = if43_galary.pro_id')
			->where("if43_pro.pro_id=$pro_id")->find();
			//获取分类的三个联级分类值
			$ModelCat=M('category');
			$cat_id['cid']=$row['cat_id'];
			$second=$ModelCat->field('parent_id')->find($cat_id['cid']);
			$cat_id['second']=$second['parent_id'];
			$first=$ModelCat->field('parent_id')->find($cat_id['second']);
			$cat_id['first']=$first['parent_id'];
			//三个联动类别组选择
			$catgoods = M('category');
			$type = $catgoods -> where("parent_id=0") -> select();
			$this ->assign('data' , $type);
			$type2 = $catgoods -> where("parent_id=".$cat_id['first']) -> select();
			$this ->assign('data2' , $type2);
			$type3 = $catgoods -> where("parent_id=".$cat_id['second']) -> select();
			$this ->assign('data3' , $type3);
			//画册组图片
			$galary=M('galary')->where("pro_id=".$pro_id)->select();
			$this->assign('galary',$galary);
			$this->assign('cat_id',$cat_id);
			$this->assign('row',$row);
			$this->display();
			
		}
		
	}
	
	//删除精品
	public function delete($pro_id){

		if (! empty ( $pro_id )) {
			
			$deletePro = M ( 'pro' )->delete ( $pro_id );
			$deleteAttr=M('pro_attr')->where("pro_id=".$pro_id)->delete();
			$deleteGalary=M('galary')->where("pro_id=".$pro_id)->delete();
			
			if ($deletePro && $deleteAttr && $deleteGalary) {
				$this->success ( '删除成功!', U ( 'Pro/index' ) );
			} else {
				$this->error ( '删除失败!' );
			}
			
		} else {
			$this->error ( '未指定删除图片！请重新操作!' );
		}
		
	}
	
	//删除画册图片
	public function deleteImg($img_id){
		
		if(!empty($img_id)){
			
			if(M('galary')->delete($img_id)){
				echo "<div class='deleteInfo'>已删除img_id为".$img_id."</div>";
			}else{
				echo "删除失败";
			}
			
		}else{
			echo '未指定删除图片!错误操作!';
		}
		
	}
	
	//精品批量操作
	public function deleteall(){
		if(!empty($_POST['pro_id'])){
			$post = $_POST;
			$ids = implode(',', $post['pro_id']);
			$model = M('pro');
			$map['pro_id'] = array('in',$ids);
			//审核
			$is_examine1['is_examine'] = 1;
			$is_examine0['is_examine'] = 0;
			//精品
			$is_best1['is_best'] = 1;
			$is_best0['is_best'] = 0;
			//新品
			$is_new1['is_new'] = 1;
			$is_new0['is_new'] = 0;
			//Hot
			$is_hot1['is_hot'] = 1;
			$is_hot0['is_hot'] = 0;
			//上架、下架
			$is_onsale1['is_onsale'] = 1;
			$is_onsale0['is_onsale'] = 0;
		
		switch ($post['action']) {
				
			case '删除':
				
				$deletePro = $model->where($map)->delete ();
				$deleteAttr=M('pro_attr')->where($map)->delete();
				$deleteGalary=M('galary')->where($map)->delete();
				
				if ($deletePro && $deleteAttr && $deleteGalary) {
					$this -> success('批量删除成功！');
				}else{
					$this -> error('批量删除失败！');
				}
				break;
	
			case '审核':
				if ($model -> where($map)->save($is_examine1)) {
					$this -> success('批量审核成功！');
				}else{
					$this -> error('批量审核失败！');
				}
				break;
	
			case '取消审核':
				if ($model -> where($map)->save($is_examine0)) {
					$this -> success('批量取消审核成功！');
				}else{
					$this -> error('批量取消审核失败！');
				}
				break;
				
			case '精品':
				if ($model -> where($map)->save($is_best1)) {
					$this -> success('批量精品成功！');
				}else{
					$this -> error('批量精品失败！');
				}
				break;
			
			case '取消精品':
				if ($model -> where($map)->save($is_best0)) {
					$this -> success('批量取消精品成功！');
				}else{
					$this -> error('批量取消精品失败！');
				}
				break;
			case '新品':
				if ($model -> where($map)->save($is_new1)) {
					$this -> success('批量新品成功！');
				}else{
					$this -> error('批量新品失败！');
				}
				break;
					
			case '取消新品':
				if ($model -> where($map)->save($is_new0)) {
					$this -> success('批量取消新品成功！');
				}else{
					$this -> error('批量取消新品失败！');
				}
				break;
			case 'Hot':
				if ($model -> where($map)->save($is_hot1)) {
					$this -> success('批量Hot成功！');
				}else{
					$this -> error('批量Hot失败！');
				}
				break;
					
			case '取消Hot':
				if ($model -> where($map)->save($is_hot0)) {
					$this -> success('批量取消Hot成功！');
				}else{
					$this -> error('批量取消Hot失败！');
				}
				break;
			case '上架':
				if ($model -> where($map)->save($is_onsale1)) {
					$this -> success('批量上架成功！');
				}else{
					$this -> error('批量上架失败！');
				}
				break;
					
			case '下架':
				if ($model -> where($map)->save($is_onsale0)) {
					$this -> success('批量下架成功！');
				}else{
					$this -> error('批量下架失败！');
				}
				break;
				
			default:$this -> error('批量失败!');
			}
			
		}
		elseif ($_POST['action']=='更新排序'){
			$pro_ids=I("post.pro_ids");
			$pro_orders=I("post.pro_orders");
			//var_dump($pro_ids);
			//var_dump($pro_orders);
			$model=M("pro");
			foreach ($pro_ids as $key =>$value){
				$data['pro_order'] = $pro_orders["$key"];
				$model->where("pro_id=$value")->save($data);
			}
			$this -> success('更新完毕！');
		}
		else{
			
			$this -> error('未批量选择!请选择在操作');
			
		}
		
	}
	
}