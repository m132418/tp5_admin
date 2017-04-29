<?php
namespace app\admin\controller;
use think\Controller ;
use think\Db;
class Test2 extends Controller
{
    protected $beforeActionList = [
        'first',
        'second' =>  ['except'=>'hello'],
        'three'  =>  ['only'=>'hello,data'],
    ];
    protected function first()
    {
        echo 'first<br/>';
    }
    protected function second()
    {
        echo 'second<br/>';
    }
    protected function three()
    {
        echo 'three<br/>';
    }
    public function hello()
    {
//         return 'hello';
        echo p("Shanghai");
    }
    public function data()
    {
        return 'data';
    } 
}
