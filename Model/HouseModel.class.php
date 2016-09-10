<?php
namespace Model;
use Think\Model;
class HouseModel extends Model{
	protected $patchValidate = true;
	protected $_validate = array(
		array('bt','require','标题不得为空'),
		array('hx_s','integer','户型-室,必需为整数'),
		array('hx_t','integer','户型-厅,必需为整数'),
		array('hx_c','integer','户型-厨,必需为整数'),
		array('hx_w','integer','户型-卫,必需为整数'),
		array('mj','require','面积不得为空'),
		array('sj','require','售价不得为空'),
		array('wz','require','位置不得为空'),
		array('dh','integer','电话不得为空'),
		array('lxr','require','联系人不得为空'),
	);

}

