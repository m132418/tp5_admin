<?php
namespace app\admin\controller;
use think\Controller ;
use think\Auth;
class Base extends Controller
{
    function _initialize() {
        parent::_initialize();
        $auth=new Auth();
//         $rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
        $rule_name=request()->module().'/'.request()->controller().'/'.request()->action();
        
//        p (session('user.id') );die();

        
        $result=$auth->check($rule_name,session('user.id'));
        
        if(!$result){
            $this->error('您没有权限访问');
        }
    }
}
