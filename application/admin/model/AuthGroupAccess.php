<?php
namespace app\admin\model;
use app\admin\model\BaseModel;
use think\Db;
/**
 * 权限规则model
 */
class AuthGroupAccess extends BaseModel{

	/**
	 * 根据group_id获取全部用户id
	 * @param  int $group_id 用户组id
	 * @return array         用户数组
	 */
	public function getUidsByGroupId($group_id){
		$user_ids=$this
			->where(array('group_id'=>$group_id))
			->getField('uid',true);
		return $user_ids;
	}

	/**
	 * 获取管理员权限列表
	 */
	
	public function getAllData(){
	    $query_sql = 
	    'SELECT'.
	        '	bjyadmin_users.id,'.
	        '	bjyadmin_users.username,'.
	        '	bjyadmin_users.email,'.
	        '	bjyadmin_auth_group_access.group_id,'.
	        '	bjyadmin_auth_group.title'.
	        ' FROM'.
	        '	bjyadmin_users'.
	        ' RIGHT JOIN bjyadmin_auth_group_access ON bjyadmin_auth_group_access.uid = bjyadmin_users.id'.
	        ' LEFT JOIN bjyadmin_auth_group ON bjyadmin_auth_group_access.group_id = bjyadmin_auth_group.id '
	    ;
	
	  $data =  Db::query($query_sql);
// 	  p($data) ;
	  $user_data = [] ;
	  foreach ($data as $key => $value) {
	      
	      if (array_key_exists($value['id'],$user_data))
	      {
	          
	      }
	      else
	      {
	          $user_data[$value['id']]['group']= [] ;
	        
	      }
	      $user_data[$value['id']] = array_merge(['usename'=>$value['username']] , $user_data[$value['id']] );
	      
	      $user_data[$value['id']]['group'] = array_merge( [$value['group_id']=>$value['title'] ],$user_data[$value['id']]['group'] ) ;
	      
	  }
// 	  p($user_data) ;	  
	  return $user_data ;

	}


}
