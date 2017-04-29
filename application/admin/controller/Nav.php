<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\model\AdminNav ;
/**
 * 后台菜单管理
 */
class Nav extends Base{
	/**
	 * 菜单列表
	 */
	public function index(){
	    
	    $adminNav = new AdminNav;
	    $nav_data=$adminNav->getTreeData('tree','order_number,id');
	    
// 		$data= ('AdminNav')->getTreeData('tree','order_number,id');
		$assign=array(
			'data'=>$nav_data
			);
		$this->assign($assign);
	return 	$this->fetch();
	}

	/**
	 * 添加菜单
	 */
	public function add(){
		$data=input('post.');
		unset($data['id']);
		$m = new AdminNav() ;
		$result=$m->data($data)->save();
		if ($result) {
			$this->success('添加成功',url('Admin/Nav/index'));
		}else{
			$this->error('添加失败');
		}
	}

	/**
	 * 修改菜单
	 */
	public function edit(){
		$data=I('post.');
		$map=array(
			'id'=>$data['id']
			);
		$result=D('AdminNav')->editData($map,$data);
		if ($result) {
			$this->success('修改成功',url('Admin/Nav/index'));
		}else{
			$this->error('修改失败');
		}
	}

	/**
	 * 删除菜单
	 */
	public function delete(){
		$id=I('get.id');
		$map=array(
			'id'=>$id
			);
		$result=D('AdminNav')->deleteData($map);
		if($result){
			$this->success('删除成功',url('Admin/Nav/index'));
		}else{
			$this->error('请先删除子菜单');
		}
	}

	/**
	 * 菜单排序
	 */
	public function order(){
		$data=input('post.');
		$m = new AdminNav ;
		$result=$m->order($data);
		if ($result) {
			$this->success('排序成功',url('Admin/Nav/index'));
		}else{
			$this->error('排序失败');
		}
	}


}
