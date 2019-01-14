<?php
namespace Eachdemo\CityLinkage;

use Eachdemo\CityLinkage\Data;

class CityLinkage{

	/**
	 * 获取城市列表
	 * @param  integer $p_id  父级ID
	 * @param  string  $filed 城市查询字段
	 * @return Array          城市数组列表
	 */
	public static function getData($p_id=0,$filed='id,name,parent_id'){
		$data = new Data();
		return $data->getData($p_id,$filed);
	}

	/**
	 * 查询一条数据
	 */
	public static function getOne($id){
		$data = new Data();
		return $data->getOne($id);
	}

	/**
	 * 更新一条数据
	 * @param  [type] $id 更新id
	 * @return [type]     更新的数据内容
	 */
	public static function updOne($id,$param=[]){
		$data = new Data();
		return $data->updOne($id,$param);
	}

	/**
	 * 添加一条数据
	 */
	public static function addOne($param){
		$data = new Data();
		return $data->addOne($param);
	}

	/**
	 * 数据回收处理
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function recycleOne($id){
		$data = new Data();
		return $data->recycleOne($id);
	}

	/**
	 * 获取所有回收站数据
	 */
	public static function getRecycle(){
		$data = new Data();
		return $data->getRecycle();
	}

	/**
	 * 删除回收站一条数据
	 */
	public static function dltRecycleOne($id){
		$data = new Data();
		return $data->dltRecycleOne($id);
	}

	/**
	 * 获取数据键值对数组
	 */
	public static function getKeyName($p_id=0){
		$data = new Data();
		return $data->getKeyName($p_id);
	}

}
?>