<?php
namespace Eachdemo\CityLinkage;

use Illuminate\Support\Facades\DB;

class Data{


	/**
	 * 获取全国省份
	 */
	public function getData($p_id,$filed){
		$filed = explode(',',$filed);
		$provinces = DB::table('city_linkage')->select($filed)->where('parent_id','=',$p_id)->get();
		$rlt = [];
		foreach ($provinces as $k => $v) {
			$rlt[$v->id] = (array)$v;
		}
		return $rlt;
	}

	/**
	 * 查询一条数据
	 */
	public function getOne($id){
		return (array)DB::table('city_linkage')->where('id','=',$id)->first();
	}

	/**
	 * 更新数据
	 */
	public function updOne($id,$param){
		$keys = ['name','parent_id','pinyin','initial','initials','suffix','code','order'];
		foreach ($param as $k => $v) {
			if(!in_array($k,$keys)) return $k;
		}
		return DB::table('city_linkage')->where('id','=',$id)->update($param);
	}

	public function addOne($param){
		$keys = ['name','parent_id','pinyin','initial','initials','suffix'];
		foreach ($keys as $k => $v) {
			if(!isset($param[$v])) return $v;
		}
		if(!isset($param['code'])) $param['code'] = '';
		if(!isset($param['order'])) $param['order'] = 100;
		return DB::table('city_linkage')->insert($param);
	}

	/**
	 * 查询一条数据
	 */
	public function recycleOne($id){
		$one = (array)DB::table('city_linkage')->where('id','=',$id)->first();
		if(empty($one)) return 'error';
		return DB::table('city_linkage')->where('id','=',$id)->update(['parent_id'=>($one['parent_id']*-1)]);
	}

	/**
	 * 查询一条数据
	 */
	public function getRecycle(){
		$list = DB::table('city_linkage')->where('parent_id','<',0)->get();
		$recycle = [];
		foreach ($list as $key => $value) {
			$value->parent_id = $value->parent_id*-1;
			$recycle[$key] = (array)$value;
		}
		return $recycle;
	}

	/**
	 * 查询一条数据
	 */
	public function dltRecycleOne($id){
		$one = DB::table('city_linkage')->where('id','=',$id)->first();
		if(empty($one) || $one->parent_id >= 0) return 'error';
		return DB::table('city_linkage')->where('id','=',$id)->delete();
	}
	

	/**
	 * 获取数据键值对数组
	 */
	public function getKeyName(){
		$list = DB::table('city_linkage')->select(['id','name'])->where('parent_id','>=',0)->get()->toArray();
		return array_column($list,'name','id');
	}

	
}
?>