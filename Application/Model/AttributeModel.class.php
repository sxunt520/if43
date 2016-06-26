<?php
//属性模型
namespace Model;
use Think\Model;
class AttributeModel extends Model {
	
	//获取指定类型下的属性并生成表单
	public function getAttrsForm($type_id) {
		//获取该类型下属性
// 		$sql = "SELECT * FROM {$this->table} WHERE type_id = $type_id";
// 		$attrs = $this->db->getAll($sql);
		$attrs=M('attribute')->where("type_id = $type_id")->select();
		$res = "<table width='100%' id='attrTable'>";
		foreach ($attrs as $attr) {
			$res .= "<tr>";
			$res .= "<td width='112'>{$attr['attr_name']}</td>";
			$res .= "<td>";
			$res .= "<input type='hidden' name='attr_id_list[]' value='".$attr['attr_id']."'>";
			switch ($attr['attr_input_type']) {
				case 0: #文本框
					$res .= "<input name='attr_value_list[]' type='text' size='40'>";
					break;
				case 1: #下拉列表
					$res .= "<select name='attr_value_list[]'>";
					$res .= "<option value=''>请选择...</option>";
					$opts = explode(PHP_EOL, $attr['attr_value']);
					foreach ($opts as $opt) {
						$res .= "<option value='$opt'>$opt</option>";
					}
					$res .= "</select>";
					break;
				case 2: #textarea
					$res .= "<textarea name='attr_value_list[]' cols='30' rows='5'></textarea>";
					break;
			}
			$res .= "<input type='hidden' name='attr_price_list[]' value='0'>";
			$res .= "</td>";
			$res .="</tr>";
		}
		$res .= "</table>";
		return $res;
	}
	
	//获取指定类型下的需要修改的属性并生成表单
	public function editAttrsForm($type_id,$pro_id) {
		$attrRows=M('pro_attr')->where("pro_id=$pro_id")->select();//获取某个“精品”下的所有属性
		$attrs=M('attribute')->where("type_id = $type_id")->select();//获取某个“类型”下的所有属性
		$res = "<table width='100%' id='attrTable'>";
		foreach ($attrs as $key=> $attr) {
			$res .= "<tr>";
			$res .= "<td width='112'>{$attr['attr_name']}</td>";
			$res .= "<td>";
			$res .= "<input type='hidden' name='attr_id_list[]' value='".$attr['attr_id']."'>";
			switch ($attr['attr_input_type']) {
				case 0: #文本框
					$res .= "<input name='attr_value_list[]' type='text' size='40' value=".$attrRows[$key]['attr_value'].">";
					break;
				case 1: #下拉列表
					$res .= "<select name='attr_value_list[]'>";
					$res .= "<option value=''>请选择...</option>";
					$opts = explode(PHP_EOL, $attr['attr_value']);
					foreach ($opts as $opt) {
						if($attrRows[$key]['attr_value']==$opt){
							$spance="selected='selected'";//判断是否被选中
						}else{
							$spance='';
						}
						$res .= "<option value='$opt' ".$spance.">$opt</option>";
					}
					$res .= "</select>";
					break;
				case 2: #textarea
					$res .= "<textarea name='attr_value_list[]' cols='30' rows='5'>".$attrRows[$key]['attr_value']."</textarea>";
					break;
			}
			$res .= "<input type='hidden' name='attr_price_list[]' value=".$attrRows[$key]['attr_price'].">";
			$res .= "<input type='hidden' name='pro_attr_id_list[]' value=".$attrRows[$key]['pro_attr_id'].">";
			$res .= "</td>";
			$res .="</tr>";
		}
		$res .= "</table>";
		return $res;
	}

}