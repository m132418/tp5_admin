<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\AdminNav;
class Index extends Base
{
    /**
     * 首页
     */
    public function index(){
        // 分配菜单数据
        $adminNav = new AdminNav;
        $nav_data=$adminNav->getTreeData('level','order_number,id');
//         		dump($nav_data);die();
        $assign=array(
            'data'=>$nav_data
        );
        $this->assign($assign);
       return  $this->fetch();
    }
    /**
     * elements
     */
    public function elements(){
    
        $this->display();
    }
    
    /**
     * welcome
     */
    public function welcome(){
        $this->display();
    }
    
}
